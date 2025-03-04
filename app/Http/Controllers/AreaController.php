<?php

namespace App\Http\Controllers;

use App\Mail\InscricaoRealizada;
use App\Models\Atleta;
use App\Models\Campeonato;
use App\Models\Resultado;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

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

            return view('area.area_restrita', compact('campeonatos'));
        }
        
        return view('erro');
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

        $atleta = Atleta::find(auth()->user()->id);
        $campeonato = Campeonato::find($id);

        //Mail::to($request->user())->send(new OrderShipped($order));

        Mail::to("teste.email@gmail.com")->send(new InscricaoRealizada($atleta, $campeonato));

        session()->flash('msg', 'Inscrição Confirmada');

        return redirect()->route('atleta.area');
    }

    public function atletaCertificado(string $camp): View
    {
        //TODO
        //checagens
        // U+00BA
        $campeonato = Campeonato::find($camp);
        $atleta = Atleta::find(auth()->user()->id);
        $res = Resultado::posicaoAtleta($campeonato, $atleta);

        if ($res) {
            return view('area.certificado_vitoria', compact('campeonato', 'atleta', 'res'));            
        }

        return view('area.certificado_participacao', compact('campeonato', 'atleta'));        
    }

    public function exportarPDF(string $camp)
    {
        $campeonato = Campeonato::find($camp);
        $atleta = Atleta::find(auth()->user()->id);
        $res = Resultado::posicaoAtleta($campeonato, $atleta);

        if ($res) {
            $pdf = PDF::loadView('area.vitoria_impresso', compact('campeonato', 'atleta', 'res'));
        } else {
            $pdf = PDF::loadView('area.participacao_impresso', compact('campeonato', 'atleta', 'res'));
        }

        return $pdf->download('certificado.pdf');

    }


}
