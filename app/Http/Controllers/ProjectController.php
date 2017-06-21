<?php

namespace App\Http\Controllers;

use App\Project;
use App\Client;
use Auth;
use Session;

use Illuminate\Http\Request;

class ProjectController extends Controller
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
        // Inject projects into the index view
        // $project_list = Project::orderBy('client_id', 'title')->where('client_id', );
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::get();
        $project_list = Project::orderBy('client_id', 'title');
        $projects = Project::orderBy('client_id', 'title');
        return view('projects.create', compact('projects', 'project_list', 'clients'));
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
            'title'     => 'required|max:100',
            'client_id' => 'required'
        ]);

        $client_id = $request['client_id'];
        $title = $request['title'];
        $projected_cost = $request['projected_cost'];
        $planned_hours = $request['planned_hours'];
        $deadline_date = $request['deadline_date'];
        $hourly_rate = $request['hourly_rate'];

        $project = Project::create([
            'client_id'      => $client_id,
            'title'          => $title,
            'projected_cost' => $projected_cost,
            'planned_hours'  => $planned_hours,
            'deadline_date'  => $deadline_date,
            'hourly_rate'    => $hourly_rate,
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
        $project = Project::findOrFail($id);
        $project_list = Project::get();
        return view('projects.show', compact('project', 'project_list'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = Client::get();
        $project_list = Project::orderBy('client_id', 'title');
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project', 'project_list', 'clients'));
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
        // Validating title and body field
        $this->validate($request, [
            'title'     => 'required|max:100',
            'client_id' => 'required'
        ]);

        $project = Project::findOrFail($id);

        $project->client_id      = $request['client_id'];
        $project->title          = $request['title'];
        $project->projected_cost = $request['projected_cost'];
        $project->planned_hours  = $request['planned_hours'];
        $project->deadline_date  = $request['deadline_date'];
        $project->hourly_rate    = $request['hourly_rate'];

        $project->save();

        // Display a successful message upon save
        return redirect()->route('home')->with('flash_message', $project->title.' successfully added to Client List.');
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
