<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View {
        return view('Compte.Login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'mail_pers' => 'required|email',
            'mdp_pers' => 'required',
            'typeCompte' => 'required'
        ]);
        $test = DB::table('personne')->where('mail_pers', '=', $request->get('mail_pers'));
        dd($test);
        if (auth()->attempt($request->only('mail_pers', 'mdp_pers'))) {
            if (in_array('1', explode(' ', auth()->user()->role)) && $request->get('typeCompte') == 'client') {
                return redirect()->route('myClientAccount');
            } else if (in_array('2', explode(' ', auth()->user()->role)) && $request->get('typeCompte') == 'proprietaire') {
                return redirect()->route('myProprietaireAccount');
            } else if (auth()->user()->role == '3') {
                return redirect()->route('myAdminAccount');
            }
            return redirect()->back()->withErrors("Les identifiants sont incorrectes");
        }
    }
    public function logout() {
        auth()->logout();

        return redirect()->route('login');
    }
}
