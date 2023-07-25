<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use App\Models\Facture;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;

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
        $data = [
            'Nom' => $client->name,
            'Email' => $client->email,
            'Téléphone' => $client->telephone,
            'Adresse' => $client->adresse
        ];
        $url = route('client.show', ['client' => $client]);
        // dd($url);
        // Convertir le tableau en JSON pour l'encodage dans le code QR
        $jsonData = json_encode($data);

        // Générer le code QR
        $qrCode = QrCode::size(300)->generate($url);
        return view('client.detail', compact('client', 'qrCode'));
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
    public function nbrKilos(Request $request, Client $client){
        // dd('enter');
        // dd('old: '.$client->nbr_kilos);
        $client->nbr_kilos += $request->nbr_kilos;
        // dd('new: '.$client->nbr_kilos);
        $client->update();

        session()->flash('success', 'les kilos ont ete ajoutés !');
        return redirect()->route('client.show', compact('client'));
    }
    public function commande(Request $request, Client $client){
        // dd('enter');
        // dd('old: '.$client->nbr_kilos);
        $user = Auth::user();
        $commande = new Commande();
        $commande->kilos = $request->kilos;

        $montant = $commande->kilos * 200;
        $user->argent_recu += $montant;

        $client->nbr_kilos -= $commande->kilos;
        $commande->prix_total = $montant;
        $commande->date_retour = $request->date_retour;
        $commande->payed = true;
        $commande->client_id = $client->id;
        $commande->user_id = $user->id;
        // dd($user);
        // dd($commande, $client);
        $commande->save();
        $facture = new Facture();
        $facture->commande_id = $commande->id;
        $facture->save();

        $user->update();
        $client->update();

        session()->flash('success', 'la commande a été enrégistrée avec succès!');
        return redirect()->route('client.show', compact('client'));
    }






    public function generateQRCode(){
        $data = 'Hello, this is a QR Code!'; // Le contenu que vous souhaitez encoder dans le code QR

        // Génération du code QR
        $qrCode = QrCode::size(300)->generate($data);

        return view('qrcode', compact('qrCode'));
    }
}
