<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Commande;
use App\Models\Client;

class CommandeComponent extends Component
{
    public function render()
    {
        $clients = Client::where('deleted', false)->get();
        $commandes = Commande::where('deleted', false)->get();
        return view('livewire.commande-component', compact('commandes', 'clients'));
    }

    public function store(Request $request)
    {

        $commande = $request->all();

        Commande::create($commande);
        session()->flash('success', ' commande a été ajouté !');

        // return redirect()->route('commande.index');
    }
    public function destroy( $commande_id)
    {
        $commande = Commande::find($commande_id);
        // dd($commande);
        // $commande->deleteOrFail();
        $commande->deleted = true;
        $commande->update();
        session()->flash('success', 'le commande a été supprimé !');
        $this->redirect('/commande');
    }
}
