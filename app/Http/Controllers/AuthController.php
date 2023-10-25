<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View {
        return view('Compte.Login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'typeCompte' => 'required'
        ]);
        dd($request->only('email', 'password'));
        if (auth()->attempt($request->only('email', 'password'))) {

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
