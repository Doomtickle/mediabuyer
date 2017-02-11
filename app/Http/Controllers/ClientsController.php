<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientList = Client::all();

        return view('clients.list', compact('clientList'));
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

        $this->validate($request, [
            'name' => 'required | unique:clients',
            'clientIndustry' => 'required'
        ]);

        Client::create(['name' => $request->name, 'clientIndustry' => $request->clientIndustry]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param $clientName
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($clientName)
    {
        $clientInfo = Client::fromName($clientName);

        return view('clients.show', compact('clientInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $name
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit($name)
    {
        $clientInfo = Client::fromName($name);

        return view('clients.edit', compact('clientInfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Client $client
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Client $client)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $client->update(['name' => $request->name]);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Client $client
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('home');
    }
}
