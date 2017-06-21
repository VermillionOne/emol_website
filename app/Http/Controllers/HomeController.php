<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Client;
use App\User;
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
        $user = User::findOrFail(Auth::user()->id);

        $clients = $user->clients;
        return view('home', compact('project_list','clients'));
    }
}
