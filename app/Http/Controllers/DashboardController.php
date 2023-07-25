<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
// use App\Models\Produit;
use Carbon\Carbon;
class DashboardController extends Controller
{

    public function index (){

        $dateUnMoisAvant = Carbon::now()->subMonth();
        $dateDebutSemaine = Carbon::now()->startOfWeek();
        $dateAujourdhui = Carbon::now();
        $dateDebutSemainePrecedente = Carbon::now()->startOfWeek()->subWeek();
        $dateFinSemainePrecedente = Carbon::now()->startOfWeek()->subDay();
        $pourcentageRedressement = null;
        $pourcentageCroissance = null;
        $pourcentageRedressementCommande = null;
        $pourcentageCroissanceCommande = null;


        $vente_totals =   Commande::where('payed', true)->sum('prix_total');
        $ventes_last_month = Commande::where('payed', true)
            ->where('created_at', '>=', $dateUnMoisAvant)
            ->sum('prix_total');
        $ventes_last_week = Commande::where('payed', true)
            ->whereBetween('created_at', [$dateDebutSemaine, $dateAujourdhui])
            ->sum('prix_total');

        $ventesSemainePrecedente = Commande::where('payed', true)
            ->whereBetween('created_at', [$dateDebutSemainePrecedente, $dateFinSemainePrecedente])
            ->sum('prix_total');

        $differenceVentes = $ventes_last_week - $ventesSemainePrecedente;

        if ($differenceVentes>=0) {
            if ($ventesSemainePrecedente > 0) {
                $pourcentageCroissance = (($ventes_last_week - $ventesSemainePrecedente) / $ventesSemainePrecedente) * 100;
            } else {
                $pourcentageCroissance = 0;
            }
        } else {
            if ($ventesSemainePrecedente > 0) {
                $pourcentageRedressement = ($differenceVentes / $ventesSemainePrecedente) * 100;
            }
            // $pourcentageRedressement = 3;
        }


        $commande_totals =   Commande::where('payed', false)->sum('prix_total');

        $commandes_last_week = Commande::where('payed', false)
            ->whereBetween('created_at', [$dateDebutSemaine, $dateAujourdhui])
            ->sum('prix_total');

        $commandesSemainePrecedente = Commande::where('payed', false)
            ->whereBetween('created_at', [$dateDebutSemainePrecedente, $dateFinSemainePrecedente])
            ->sum('prix_total');

        $differencecommandes = $commandes_last_week - $commandesSemainePrecedente;

        if ($differencecommandes>=0) {
            if ($commandesSemainePrecedente > 0) {
                $pourcentageCroissanceCommande = (($commandes_last_week - $commandesSemainePrecedente) / $commandesSemainePrecedente) * 100;
            } else {
                $pourcentageCroissanceCommande = 0;
            }
        } else {
            if ($commandesSemainePrecedente > 0) {
                $pourcentageRedressementCommande = ($differencecommandes / $commandesSemainePrecedente) * 100;
            }
            // $pourcentageRedressement = 3;
        }


        $commandes_lastest = Commande::latest()->take(5)->get();

        // $produitMoreOrders= Produit::orderBy('nbr_commande', 'desc')
        // ->take(5)
        // ->get();

        $nbr_commandes = Commande::all()->count();
        $commande_non_acquite = Commande::where('payed', false)->count();
        // $nbr_produits = Produit::all()->count();

        // $produitMoreOrdersMonthly = Produit::orderBy('nbr_commande', 'desc')
        // ->where('created_at', '>=', $dateUnMoisAvant)
        // ->get();

        // $produitMoreOrdersDaily = Produit::orderBy('nbr_commande', 'desc')
        // ->where('created_at', '>=', $dateUnMoisAvant)
        // ->get();


        // dd($produitMoreOrdersMonthly);







        // dd($vente_totals);
        return view('home.dashboard', compact(
            'vente_totals',
            'ventes_last_month',
            'ventes_last_week',
            'pourcentageCroissance',
            'pourcentageRedressement',
            'commande_totals',
            'pourcentageCroissanceCommande',
            'pourcentageRedressementCommande',
            'commandes_lastest',
            // 'produitMoreOrders',
            'nbr_commandes',
            // 'nbr_produits',
            'commande_non_acquite',


        ));


    }

    public function homeGerant (){
        $commandes = Commande::all();
        return view('commande.list', compact('commandes'));
    }
}
