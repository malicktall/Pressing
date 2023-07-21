<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::where('deleted', false)->get();
        return view('client.list', compact('clients'));
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
        // dd($request->all());
        try {
            $client = new Client($request->all());
            // dd($client);
            $client->save();
        session()->flash('success', 'le client a été ajouté !');
    } catch (\Throwable $th) {
            session()->flash('error', 'ERREUR : ');
            //throw $th;
        }

        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('client.detail', compact('client'));
    }
    public function showProduit(Client $client)
    {
        return view('client.detail_commande', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
            // dd($request->all());
            try {
                // dd($client);
                $data = $request->all();
                $client->update($data);
                session()->flash('success', 'le client a été modifié !');
            } catch (\Throwable $th) {
                    session()->flash('error', 'ERREUR : ');
                }

                return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        // dd($client);
        $client->deleted = true;
        $client->update();
        return redirect()->route('client.index');

    }
    public function corbeilleClient(){

        $clients = Client::where('deleted', true)->get();
        return view('client.corbeille',compact('clients'));
    }
    public function restaurer(Client $client){
        // dd('enter');
        $client->deleted = false;
        $client->update();

        session()->flash('success', 'le client a été restaurée !');
        return redirect()->route('corbeille.client');
    }
}
