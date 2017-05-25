<?php

namespace App\Http\Controllers;

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
        // Times class does not currently have dedicated views
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
            'title' => 'required|max:255',
            'handle' => 'required|max:255',
            'task_id' => 'required',
            'user_id' => 'required',
            'time_span' => 'required',
            ]);

        $title = $request['title'];

        $time = Time::create($request->only('title', 'task_id', 'user_id', 'value_per_hour', 'handle'));

        //Display a successful message upon save
        return redirect()->route('tasks.index')
            ->with('flash_message', $time->title.' successfully added.');
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
