<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller
{
    public function atletaLogin(): View
    {
        return view('area.login');
    }

    public function atletaArea(): View
    {
        // TODO
        // buscar os dados do usuário logado

        return view('area.area_restrita');
    }

    public function atletaLogar(Request $req): RedirectResponse
    {
        $credenciais = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::guard('webatletas')->attempt($credenciais))
        {
            $req->session()->regenerate();            

            return redirect()->intended('/area');        
        }

        return back()->withErrors([
            'email' => 'Email inválido.'
        ])->onlyInput('email');        
    }

    public function atletaLogout(Request $req): RedirectResponse
    {
        Auth::guard('webatletas')->logout();

        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('/');
    }
}
