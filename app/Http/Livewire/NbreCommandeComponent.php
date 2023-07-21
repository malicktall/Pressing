<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Commande;

class NbreCommandeComponent extends Component
{
    public Commande $commande;
    public $clients = [];
    public function render()
    {
        return view('livewire.nbre-commande-component');
    }
}
