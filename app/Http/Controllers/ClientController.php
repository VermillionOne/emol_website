<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use App\Project;
use Auth;
use Session;

class ClientController extends Controller
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
        $project_list = Project::orderby('title')->paginate(15);
        $clients = Client::orderby('id')->paginate(15); // Display 15 Clients at a time
        return view('clients.index', compact('clients', 'project_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project_list = Project::orderby('title')->paginate(15);

        return view('clients.create', compact('clients', 'project_list'));
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
            'title'   => 'required|max:100',
            ]);

        $title = $request['title'];
        $address = $request['address'];
        $address_2 = $request['address_2'];
        $city = $request['city'];
        $state = $request['state'];
        $zipcode = $request['zipcode'];
        $phone = $request['phone'];
        $email = $request['email'];
        $handle = $request['handle'];

        $client = Client::create([
            'title' => $title,
            'address' => $address,
            'address_2' => $address_2,
            'city' => $city,
            'state' => $state,
            'zipcode' => $zipcode,
            'phone' => $phone,
            'email' => $email,
            'handle' => $handle,
        ]);

        $client->users()->attach(Auth::user()->id);

        //Display a successful message upon save
        return redirect()->route('home')->with('flash_message', $client->title.' successfully added to Client List.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id); //Find Client of id = $id
        return view ('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $project_list = Project::get();
        return view('clients.edit', compact('client', 'project_list'));
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
            'title'   => 'required|max:100',
            ]);

        $client = Client::findOrFail($id);

        $client->title = $request['title'];
        $client->address = $request['address'];
        $client->address_2 = $request['address_2'];
        $client->city = $request['city'];
        $client->state = $request['state'];
        $client->zipcode = $request['zipcode'];
        $client->phone = $request['phone'];
        $client->email = $request['email'];
        $client->handle = $request['handle'];

        $client->save();

        // Display a successful message upon save
        return redirect()->route('home')->with('flash_message', $client->title.' successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('clients.index')->with('flash_message', 'Client -> '.$client->title.' successfully deleted');
    }
}
