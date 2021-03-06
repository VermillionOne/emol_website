<?php

namespace App\Http\Controllers;

use App\Time;
use App\Project;
use Auth;
use Session;

use Illuminate\Http\Request;

class TimeController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project_list = Project::orderby('title');
        $times = Time::orderby('task_id', 'title');
        return view('tasks.index', compact('tasks', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Times class does not currently have dedicated views
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validating title and body field
        $this->validate($request, [
            'time_title' => 'required|max:255',
            'task_id' => 'required',
            'time_span' => 'required',
        ]);

        $title   = $request['time_title'];
        $task_id = $request['task_id'];
        $user_id = Auth::user()->id;
        $time_span = $request['time_span'];
        $value_per_hour = $request['value_per_hour'];

        $time = Time::create([
            'title' => $title,
            'task_id' => $task_id,
            'time_span' => $time_span,
            'user_id' => $user_id,
            'value_per_hour' => $value_per_hour
        ]);

        //Display a successful message upon save
        return redirect()->back()->with('flash_message', $time->title.' successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Times class does not currently have dedicated views
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Times class does not currently have dedicated views
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required|max:100',
            'time_span'=>'required',
        ]);

        $time = Time::findOrFail($id);
        $time->title = $request->input('title');
        $time->units_in_stock = $request->input('units_in_stock');
        $time->save();

        return redirect()->route('tasks.index',
            $time->id)->with('flash_message',
            'Time, '. $time->title.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $time = Time::findOrFail($id);
        $time->delete();

        return redirect()->route('tasks.index')
            ->with('flash_message',
             'Time successfully deleted');
    }
}
