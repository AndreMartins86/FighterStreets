<?php

namespace App\Http\Controllers;

use App\Http\Requests\AtletaRequest;
use App\Models\Atleta;
use App\Models\Chave;
use App\Models\Campeonato;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
//use App\Http\Controllers\PainelTorneioController;


class HomeController extends Controller
{
    public function index (): View
    { 
        $campeonatos = Campeonato::where('status', '1')
        ->latest('data')
        ->take(4)
        ->get();

        if (DB::table('destaques')->count() < 1) {
            
            $destaques = false;

            return view('home', compact('campeonatos', 'destaques'));
        }

        $destaques = DB::table('campeonatos')
            ->join('destaques','campeonatos.id', '=', 'destaques.campeonato_id')
            ->join('estados','campeonatos.estado_id', '=', 'estados.id')
            ->join('fases','campeonatos.fase_id', '=', 'fases.id')
            ->join('tipos','campeonatos.tipo_id', '=', 'tipos.id')
            ->selectRaw('destaques.posicao, campeonatos.id as "id", titulo, imagem, fases.fase, tipos.tipo, DATE_FORMAT(campeonatos.data, "%d/%m/%Y") as "data", cidade, estados.sigla')
            ->get();

        return view('home', compact('campeonatos', 'destaques'));
    }

    public function detalhes (Campeonato $campeonato, string $slug): View
    {
        $campeonato = Campeonato::find($campeonato->id);

        return view('detalhes', compact('campeonato'));
    }

    public function torneios (): View
    {
        $campeonatos = Campeonato::where('status', '1')
        ->latest('data')
        ->take(8)
        ->get();

        $estados = DB::table('estados')->get();

        $tipos = DB::table('tipos')->get();

        return view('torneios', compact('campeonatos', 'estados', 'tipos'));
       
    }

    public function busca (Request $req): View
    {    
        $titulo = $req->titulo;
        $tipo = $req->tipo;
        $estado = $req->estado;
        $cidade = $req->cidade;

        $estados = DB::table('estados')->get();

        $tipos = DB::table('tipos')->get();

        $busca = true;

      if ($req->tipo == 'Tipo') {

        $campeonatos = Campeonato::where('status', '1')
        ->where('titulo', 'LIKE', '%'.$titulo.'%')
        ->where('cidade', 'LIKE', '%'.$cidade.'%')
        ->where('estado_id',$estado)
        ->paginate(8);  

      } else {
          $campeonatos = Campeonato::where('status', '1')
          ->where('titulo', 'LIKE', '%'.$titulo.'%')
          ->where('cidade', 'LIKE', '%'.$cidade.'%')
          ->where('estado_id',$estado)
          ->where('tipo_id',$tipo)
          ->paginate(8);        
      }
        return view('torneios', compact('campeonatos', 'estados', 'tipos', 'busca'));

    }

    public function atletaCadastro(AtletaRequest $req): RedirectResponse
    {
        $validado = $req->validated();
        $validado['password'] = Hash::make($req->password);
        $validado['created_at'] = now();
        $validado = Arr::except($validado, ['captcha']);

        $atleta = Atleta::create($validado);

        //dd($atleta);

        //Auth::login($atleta);
        Auth::guard('webatletas')->login($atleta);

        $req->session()->regenerate();

        session()->flash('msg', 'Atleta Cadastrado');

        return redirect()->route('atleta.area');        
        
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img('flat')]);
    }

    public function chavesListagem($id): View
    {
        $campeonato = Campeonato::find($id);

        return view('chaves_listagem', compact('campeonato'));
    }

    public function chavesDetalhes($id, $sexo, $peso, $faixa): View
    {
        $campeonato = Campeonato::find($id);                
        $chaves = Chave::buscarChavesDetalhes($id, $sexo, $peso, $faixa);
        $contadorChaves = Chave::contadorChaves($campeonato, $sexo, $peso, $faixa);
        $fases = PainelTorneioController::contarFases($chaves);
        

        return view('chaves_detalhes', compact('campeonato', 'chaves', 'fases', 'contadorChaves'));
    }
}
