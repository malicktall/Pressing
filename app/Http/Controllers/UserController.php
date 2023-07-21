<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendNewRestPassword;
use App\Mail\SendNewSuccessUpdatedPassword;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function profile (User $user){

        return view('user.profile', compact('user'));
    }

    public function settings (User $user){

        return view('user.settings', compact('user'));
    }

    public function add (Request $request){

        dd($request->all());
    }

    public function changePassword(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'current_password' => 'required',
        //     'new_password' => 'required|string|min:8|confirmed',
        // ]);

        $user = Auth::user();

        if (Hash::check($request->oldPassword, $user->password)) {
            // dd('password matching');
            if($request->password1 == $request->password2){
                // dd('Password identique');
                if ($request->password1 == $user->password){
                    // dd('identique');
                    return redirect()->back()->with('error', 'Vous avez deja utiliser ce password .');
                }else{
                    $user->password = Hash::make($request->password1);
                    $user->save();
                    Mail::to($user)->send(new SendNewSuccessUpdatedPassword($user));

                    return redirect()->back()->with('success', 'Mot de passe modifié avec succès.');
                }
            }else{
                // dd('error');
                return redirect()->back()->with('error', 'Les mots de passe ne sont pas identiques .');
            }
        } else {
            // dd('error password');
            return redirect()->back()->with('error', 'Le mot de passe actuel est incorrect.');
        }
        }

    public function ChangePasswordForm(){
        return view('user.change_password');
    }

    public function update(Request $request, User $user){
        // dd($request->all());
        $data = $request->all();
        // dd($user);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->save();
        // dd($user);
        return redirect()->back()->with('success', 'Vos informations ont été modifié.');

    }

    public function updatePhotoProfil(Request $request, User $user){

        $data = $request->all();
        // dd($data, $user);

        if ($request->file('photo')) {

            // $fileName = time().$request->file('photo')->getClientOriginalName();
            // $path = $request->file('photo')->storeAs('images', $fileName, 'public');
            // $data["photo"] = '/storage/'.$path;

            // dd('dans le if :'.$data['photo']);

            $file = $request->file('photo');
            $fileName = time() . $file->getClientOriginalName();
            $filePath = public_path('storage/images/' . $fileName);

            // Redimensionner l'image avec Intervention Image
            $image = Image::make($file);
            $image->fit(120, 120); // Redimensionner l'image en 120x120 pixels
            $image->save($filePath);
            // dd($image);
            $data['photo'] = 'storage/images/' . $fileName;
        }
        // // $data["nom"] = 'malick';
        // // dd($data);
        $user->photo = $data["photo"];

        $user->update();
        // dd($user);
        // Mail::to($user)->send(new SendNewRestPassword());

        session()->flash('success', 'Photo Profil modifié !');
        return redirect()->back();
    }

    public function forgotPassword (){

        return view('user.forgot_password');
    }
    public function verifyEmail (Request $request){
        $email = $request->email;
        $expirationTime = Carbon::now()->addMinutes(5);
        // dd($expirationTime);
        $users = User::all();
        // dd($users);
        foreach ($users as $user) {
            if ($user->email == $email){
                // dd($user);
                $user->reset_token = Str::random(64);
                $user->expiration_time = $expirationTime;
                $user->save();
                Mail::to($user)->send(new SendNewRestPassword($user));
                session()->flash('success', 'Message envoie a voir boite mail!');

            }
        }
        return view('auth.login');
    }

    public function updatePassword ($email){
        $user = User::where('email', $email)->first();
        $expirationTime = $user->expiration_time;
        // dd($expirationTime);
        if (Carbon::now()->gt($expirationTime)) {
            return view('mail.time_out_mail');
        }else{
            return view('user.updatePassword', compact('email'));
        }
    }

    public function updatedPassword(Request $request){
        $email = $request->email;
        $users = User::all();
        // dd($users);

        if($request->password == $request->password2){
            // dd('Password identique');

            foreach ($users as $user) {
                if ($user->email == $email){
                    $user->password = Hash::make($request->password);
                    $user->save();
                    // dd("user trouver");
                    Mail::to($user)->send(new SendNewSuccessUpdatedPassword($user));

                    return redirect()->route('login')->with('success', 'Mot de passe modifié avec succès.');
                }
            }
            return redirect()->route('login')->with('error', 'Pas d\'utilisateur.');


        }else{
            // dd('error');
            return redirect()->back()->with('error', 'Les mots de passe ne sont pas identiques .');
        }
    }
}
