<?php

namespace App\Http\Controllers;

use App\Models\Atleta;
use App\Models\Campeonato;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;


class AreaController extends Controller
{
    public function atletaArea(): View
    {
        // TODO
        // buscar os dados do usuário logado
        if (auth()->user()) {

            $campeonatos = Campeonato::whereHas('atletas', function (Builder $query) {
                $query->where('id', auth()->user()->id);
            })
            ->where('status', 1)
            ->selectRaw('id, titulo, data')
            ->paginate(15);

            //dd($campeonatos);

            return view('area.area_restrita', compact('campeonatos'));
        }

        //////////////////////////////////ARRUMAR
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
        $inscrito = false;
        $campeonato = Campeonato::find($id);

        $checagem = DB::table('atleta_campeonato')
        ->where('atleta_id', auth()->user()->id)
        ->where('campeonato_id', $id)
        ->count();

        if ($checagem > 0) {
            $inscrito = true;
        }

        return view('area.confirm_inscricao', compact('campeonato', 'inscrito'));
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

    public function atletaCertificado(string $campeonat, string $atlet): View
    {
        //TODO
        //checagens
        $campeonato = Campeonato::find($campeonat);
        $atleta = Atleta::find($atlet);

        return view('area.certificado_participacao', compact('campeonato', 'atleta'));
        
    }


}
