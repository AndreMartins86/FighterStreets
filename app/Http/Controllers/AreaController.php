<?php

namespace App\Http\Controllers;

use App\Models\Campeonato;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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

    public function confirmarInscricao($id): View
    {
        $campeonato = Campeonato::find($id);

        return view('area.confirm_inscricao', compact('campeonato'));
    }

    public function atletaConfirmado($id): RedirectResponse
    {
        DB::table('atleta_campeonato')->insert([
            'atleta_id' => auth()->user()->id,
            'campeonato_id' => $id,
            'dataDaInscricao' => now()
        ]);

        session()->flash('msg', 'Inscrição Confirmada');

        return redirect()->route('atleta.area');        
    }
}
