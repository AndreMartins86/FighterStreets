<?php

namespace App\Http\Controllers;

use App\Http\Requests\TorneioRequest;
use App\Models\Campeonato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PainelTorneioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $campeonatos = Campeonato::where('status', 1)
        ->orderBy('data')
        ->paginate(10);

        return view('painel.painel_torneio', compact('campeonatos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $estados = DB::table('estados')->get();
        $tipos = DB::table('tipos')->get();

        return view('painel.cadastrar_torneio', compact('estados', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TorneioRequest $req)
    {
        //dd($req->arquivo);
        $campeonatoDados = $req->validated();

        $campeonato = new Campeonato();
        $campeonato->fill($campeonatoDados);

        $caminhoPasta = public_path('uploads/');
        $imagem_parts = explode(";base64,", $req->arquivo);           
        $imagem_base64 = base64_decode($imagem_parts[1]); 
        $nomeImagem = uniqid() . '.png'; 
        $caminhoCompletoImagem = $caminhoPasta.$nomeImagem;
        $caminhoImagem = "/uploads/".$nomeImagem;
 
        file_put_contents($caminhoCompletoImagem, $imagem_base64);

        $campeonato->imagem = $caminhoImagem;
        $campeonato->fase_id = 1;
        $campeonato->status = 1;

        unset($campeonato['arquivo']);

        $campeonato->save();

        session()->flash('msg', 'Campeonato Cadastrado');

        return response()->json(['success'=>'Cadastrado', 'url' => route('painel-torneios.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function filtrarTorneio(Request $req): View
    {
        $status = $req->status == 1 ? 1 : 0;

        $inicial = $req->de == null ? '1996-01-01' : $req->de;

        $final = $req->ate == null ? now() : $req->ate;

        $campeonatos = Campeonato::where('titulo', 'LIKE', '%'.$req->name.'%')        
        ->where('status', $status)
        ->whereBetween('created_at', [$inicial, $final])
        ->get();

        return view('painel.painel', compact('campeonatos'));        
    }
}
