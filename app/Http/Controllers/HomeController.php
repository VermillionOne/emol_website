<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Client;
use Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderby('title')->paginate(15);
        $project_list = Project::orderby('title');
        return view('home', compact('project_list','clients'));
    }
}
