<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendNewRestPassword;
use App\Mail\SendNewSuccessUpdatedPassword;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class PersonnelController extends Controller
{
    public function index () {
        $personnels = User::where('deleted', false)->get();
        return view('personnel.list', compact('personnels'));
    }

    public function show (User $personnel) {

        return view( 'personnel.detail', compact('personnel'));
    }

    public function corbeillePersonnel (){
        $personnels = User::where('deleted', true)->get();
        return view('personnel.corbeille',compact('personnels'));
    }

    public function showCommande(User $personnel)
    {
        return view('personnel.detail_commande', compact('personnel'));
    }

    public function store(Request $request){
        // dd($request->all());
        try {
            $personnel = new User();
            $personnel->name = $request->name;
            $personnel->email = $request->email;
            $personnel->telephone = $request->telephone;
            $personnel->role = $request->role;
            $personnel->password = Hash::make($request->role);
            // dd($personnel);
            $personnel->save();
            session()->flash('success', 'Un '.$personnel->role .'  a été ajouté !');
            } catch (\Throwable $th) {
                session()->flash('error', 'ERREUR : '.$th);
                //throw $th;
            }

        return redirect()->route('personnel.index');
    }

    public function update(Request $request, User $personnel){
        // dd($request->all());
        try {
            $personnel->name = $request->name;
            $personnel->email = $request->email;
            $personnel->telephone = $request->telephone;
            $personnel->role = $request->role;
            // dd($personnel);
            $personnel->update();
            session()->flash('success', 'le '.$personnel->role .' a été modifié !');
            } catch (\Throwable $th) {
                session()->flash('error', 'ERREUR : '.$th);
                //throw $th;
            }

        return redirect()->route('personnel.index');
    }

    public function destroy(User $personnel)
    {
        // dd($client);
        $personnel->deleted = true;
        $personnel->update();
        session()->flash('success', 'le '.$personnel->role .' a été supprimé !');
        return redirect()->route('personnel.index');

    }
    public function restaurer(User $personnel){
        // dd('enter');
        $personnel->deleted = false;
        $personnel->update();

        session()->flash('success', 'le '.$personnel->role .' a été restaurée !');
        return redirect()->route('corbeille.personnel');
    }
}
