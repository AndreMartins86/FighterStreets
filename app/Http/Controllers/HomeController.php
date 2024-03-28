<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Campeonato;
use Database\Factories\CampeonatoFactory;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index (): View
    { 
        $campeonatos = Campeonato::where('status', '1')
        ->latest('data')
        ->take(4)
        ->get();

        return view('home', compact('campeonatos'));        
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
}
