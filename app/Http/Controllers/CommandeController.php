<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Carbon\Carbon;
use App\Models\Produit;
use App\Models\Facture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commandes = Commande::where('deleted', false)->get();

        // dd($commandes);
        return view('commande.list',compact('commandes'));
    }
    public function corbeille()
    {

        $commandes = Commande::where('deleted', true)->get();

        return view('commande.corbeille',compact('commandes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dateDebutSemaine = Carbon::now()->startOfWeek();
        $dateFinSemaine = Carbon::now()->endOfWeek();

        $produits = Produit::where(function ($query) use ($dateDebutSemaine, $dateFinSemaine) {
            $query->where('deleted', false)
                  ->orWhere(function ($query) use ($dateDebutSemaine, $dateFinSemaine) {
                      $query->where('deleted', true)
                            ->whereBetween('updated_at', [$dateDebutSemaine, $dateFinSemaine]);
                  });
        })->orderBy('like', 'desc')->get();
        return view('commande.create',compact('produits'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $commande = new Commande();
        $commande->user_id = Auth::user()->id;
        $commande->client_id = $request->client_id;
        $commande->kilos = $request->kilos;
        $commande->prix_total = $request->prix;
        $commande->date_retour = $request->date_retour;
        if ($request->payed){
            $commande->payed = true;
        }else{
            $request->payed = false;

        }
        $commande->save();
        $facture = new Facture();
        $facture->commande_id = $commande->id;
        $facture->save();

        return redirect()->route('commande.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        return view('commande.detail', compact('commande'));
    }
    public function showProduit(Commande $commande)
    {
        return view('commande.detail_produit', compact('commande'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commande $commande)
    {
        // if ($request->payed ) {
        //     $commande->payed = true;
        // }else{
        //     $commande->payed = false;

        // }
        $commande->client_id = $request->client_id;
        $commande->kilos = $request->kilos;
        $commande->prix_total = $request->prix;
        $commande->date_retour = $request->date_retour;
        $commande->update();
        return redirect()->route('commande.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande){
        // dd('enter');
        $commande->deleted = true;
        $commande->update();

        session()->flash('success', 'la commande a été supprimée !');
        return redirect()->route('commande.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function delivered( Commande $commande){
        $commande->status = 'livrer';
        $commande->update();
        return redirect()->route('commande.index');
        // dd($commande->status);
    }
    public function payed( Commande $commande){
        $commande->payed = true;
        $commande->update();
        return redirect()->route('commande.index');
        // dd($commande->status);
    }

    public function vente (){
        $produits = Commande::where('payed', true)->get();
        // dd($produits);
        return view('vente.list', compact('produits'));
    }

    public function restaurer(Commande $commande){
        // dd('enter');
        $commande->deleted = false;
        $commande->update();

        session()->flash('success', 'le commande a été restaurée !');
        return redirect()->route('corbeille.commande');
    }

    public function corbeilleCommande(){

        $commandes = Commande::where('deleted', true)->get();
        return view('commande.corbeille',compact('commandes'));
    }

}
