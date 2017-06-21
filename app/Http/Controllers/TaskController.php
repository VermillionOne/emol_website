<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use Auth;
use Session;

use Illuminate\Http\Request;

class TaskController extends Controller
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
        $tasks = Task::orderby('project_id', 'title');
        return view('tasks.index', compact('tasks', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validating title and body field
        $this->validate($request, [
            'project_id' => 'required|max:100',
            'title'      => 'required|max:100',
        ]);

        $project_id = $request['project_id'];
        $title      = $request['title'];
        $due_date   = $request['due_date'];

        $project = Project::create([
            'client_id' => $client_id,
            'title'     => $title,
            'due_date'  => $due_date
        ]);

        $project->users()->attach(Auth::user()->id);

        // Display a successful message upon save
        return redirect()->route('home')->with('flash_message', $project->title.' successfully added to Client List.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
