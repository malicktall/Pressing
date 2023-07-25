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


class PersonnelController extends Controller
{
    public function index () {
        $personnels = User::all();
        return view()
    }
}
