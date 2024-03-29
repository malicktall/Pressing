<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\ProduitComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware('auth')->group(function () {


    Route::get('/producter', function () {
        return view('produit/index');
    });
    Route::get('/commande/cart', function () {
        return view('produit/cart');
    })->name('cart');


    // Produit
    Route::get('/produit', [ProduitController::class, 'index'])->name('produit.index');
    // Route::get('/corbeille', [ProduitController::class, 'corbeille'])->name('produit.corbeille');
    Route::get('/corbeille/cl', [ClientController::class, 'corbeilleClient'])->name('corbeille.client');
    Route::get('/corbeille/pr', [PersonnelController::class, 'corbeillePersonnel'])->name('corbeille.personnel');
    Route::get('/corbeille/order', [CommandeController::class, 'corbeilleCommande'])->name('corbeille.commande');
    Route::post('/produit/{produit}', [ProduitController::class, 'update'])->name('produit.update');
    Route::post('/produit/r/{produit}', [ProduitController::class, 'restaurer'])->name('produit.restorer');
    Route::get('/produit/create', [ProduitController::class, 'create'])->name('produit.create');
    Route::post('/produit', [ProduitController::class, 'store'])->name('produit.store');
    Route::post('/commande/create', [ProduitController::class, 'addToCart'])->name('addToCart');
    Route::get('/produit/{produit}', [ProduitController::class, 'show'])->name('produit.show');
    Route::get('/produit/like/{produit}', [ProduitController::class, 'like'])->name('produit.like');
    Route::get('/produit/unlike/{produit}', [ProduitController::class, 'unlike'])->name('produit.unlike');
    Route::get('/produit/{produit}/edit', [ProduitController::class, 'edit'])->name('produit.edit');
    Route::delete('/produit/{produit}', [ProduitController::class, 'destroy'])->name('produit.destroy');

    Route::post('/commande/update/{commande}', [CommandeController::class, 'update'])->name('commande.update');
    Route::post('/commande/{commande}', [CommandeController::class, 'delivered'])->name('commande.delivered');
    Route::post('/commande/p/{commande}', [CommandeController::class, 'payed'])->name('commande.payed');
    Route::get('/commande', [CommandeController::class, 'index'])->name('commande.index');
    Route::get('/vente', [CommandeController::class, 'vente'])->name('commande.vendu');
    Route::get('/commande/create', [CommandeController::class, 'create'])->name('commande.create');
    Route::post('/commande', [CommandeController::class, 'store'])->name('commande.store');
    Route::get('/commande/{commande}', [CommandeController::class, 'show'])->name('commande.show');
    Route::get('/commande/prod/{commande}', [CommandeController::class, 'showProduit'])->name('commande.showProduit');
    Route::get('/commande/{commande}/edit', [CommandeController::class, 'edit'])->name('commande.edit');
    Route::delete('/commande/{commande}', [CommandeController::class, 'destroy'])->name('commande.destroy');
    Route::post('/commande/c/{commande}', [CommandeController::class, 'restaurer'])->name('commande.restorer');


    Route::delete('/cart/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::delete('/cart/{produit_id}', [CartController::class, 'destroyProduit'])->name('cart.destroy_produit');


    Route::get('/facture', [FactureController::class, 'index'])->name('facture.index');
    Route::get('/facture/{commande_id}', [FactureController::class, 'show'])->name('facture.show');
    Route::get('/facture/print/{facture}', [FactureController::class, 'facture_print'])->name('facture.facture_print');




    Route::get('/homeGerant', [DashboardController::class, 'homeGerant'])->name('homeGerant');
    // Route::get('/', function () {
        //     return view('welcome');
        // });
        Route::middleware('admin')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('home');
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('home.dashboard');
            Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

            Route::post('/personnel/{personnel}', [PersonnelController::class, 'update'])->name('personnel.update');
            Route::get('/personnel', [PersonnelController::class, 'index'])->name('personnel.index');
            Route::post('/personnel', [PersonnelController::class, 'store'])->name('personnel.store');
            Route::get('/personnel/{personnel}', [PersonnelController::class, 'show'])->name('personnel.show');
            Route::get('/personnel/prod/{personnel}', [PersonnelController::class, 'showCommande'])->name('personnel.showProduit');
            Route::delete('/personnel/{personnel}', [PersonnelController::class, 'destroy'])->name('personnel.destroy');
            Route::post('/personnel/c/{personnel}', [PersonnelController::class, 'restaurer'])->name('personnel.restorer');
            Route::post('/personnel/nbrKilos/{personnel}', [PersonnelController::class, 'nbrKilos'])->name('personnel.nbrKilos');
            Route::post('/personnel/commande/{personnel}', [PersonnelController::class, 'commande'])->name('personnel.commande');


        });
    Route::post('/client/{client}', [ClientController::class, 'update'])->name('client.update');
    Route::get('/client', [ClientController::class, 'index'])->name('client.index');
    Route::post('/client', [ClientController::class, 'store'])->name('client.store');
    Route::get('/client/{client}', [ClientController::class, 'show'])->name('client.show');
    Route::get('/client/prod/{client}', [ClientController::class, 'showProduit'])->name('client.showProduit');
    Route::delete('/client/{client}', [ClientController::class, 'destroy'])->name('client.destroy');
    Route::post('/client/c/{client}', [ClientController::class, 'restaurer'])->name('client.restorer');
    Route::post('/client/nbrKilos/{client}', [ClientController::class, 'nbrKilos'])->name('client.nbrKilos');
    Route::post('/client/commande/{client}', [ClientController::class, 'commande'])->name('client.commande');


    Route::get('/user/profile/{user}', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/user/settings/{user}', [UserController::class, 'settings'])->name('user.settings');
    Route::post('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::post('/user/updadeProfile/{user}', [UserController::class, 'updatePhotoProfil'])->name('user.updatePhotoProfil');
    Route::post('/change_password', [UserController::class, 'changePassword'])->name('user.passwordupdate');


});

Route::get('/forgotPassword', [UserController::class, 'forgotPassword'])->name('user.forgotPassword');
Route::get('/updatePassword/{email}', [UserController::class, 'updatePassword'])->name('user.updatePassword');
Route::post('/updatedPassword', [UserController::class, 'updatedPassword'])->name('user.updatedPassword');
Route::post('/verifyEmail', [UserController::class, 'verifyEmail'])->name('user.verifyEmail');

Auth::routes();

