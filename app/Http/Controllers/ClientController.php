<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
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
        $clients = Client::orderby('id')->paginate(15); // Display 15 Clients at a time
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
            'title'          => 'required|max:100',
            'handle'         => 'required',
            ]);

        $title = $request['title'];
        $handle = $request['handle'];

        $client = Client::create($request->only('title','handle'));

        //Display a successful message upon save
        return redirect()->route('client.index')->with('flash_message', $client->title.' successfully added to Client List.');
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
        return view('clients.edit', compact('client'));
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
            'handle'=>'required',
        ]);

        $client = Client::findOrFail($id);
        $client->title = $request->input('title');
        $client->units_in_stock = $request->input('units_in_stock');
        $client->save();

        return redirect()->route('clients.show',
            $client->id)->with('flash_message',
            'Client -> '.$client->title.' updated');
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
