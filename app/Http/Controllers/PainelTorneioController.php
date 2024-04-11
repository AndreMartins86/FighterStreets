<?php

namespace App\Http\Controllers;

use App\Http\Requests\TorneioRequest;
use App\Models\Campeonato;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
    public function store(Request $req): JsonResponse
    {        
        $validador = Validator::make($req->all(), $this->regras());
        
        if ($validador->fails()) {

          return response()->json(['errors' => $validador->errors()]);

        }
        
        $campeonatoDados = $validador->safe()->except(['extension']);        

        $campeonato = new Campeonato();
        $campeonato->fill($campeonatoDados);        
        $imagem_partes = explode(";base64,", $req->arquivo);
        $imagem_base64 = base64_decode($imagem_partes[1]);
        $nomeImagem = uniqid() . '.png';
        $caminhoImagem = '/uploads/' . $nomeImagem;

        //Storage::put($nomeImagem, $imagem_base64);        
        Storage::disk('public')->put($nomeImagem, $imagem_base64);

        $campeonato->imagem = $caminhoImagem;
        $campeonato->fase_id = 1;
        $campeonato->status = 1;

        unset($campeonato['arquivo']);

        $campeonato->save();

        session()->flash('msg', 'Campeonato Cadastrado');

        return response()->json(['success'=>'Cadastrado', 'link' => route('painel-torneios.index')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $camp = Campeonato::find($id);

        return view('painel.mostrar_torneio', compact('camp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $estados = DB::table('estados')->get();
        $tipos = DB::table('tipos')->get();
        
        $camp = Campeonato::find($id);

        return view('painel.editar_torneio', compact('camp', 'estados','tipos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, String $id): JsonResponse
    {
        

        return response()->json(['success'=>'Atualizado', 'link' => route('painel-torneios.index')]);
        
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

    private function regras(): Array
    {
        return [
            'titulo' => 'required|min:3|max:100',
            'arquivo' => 'required',
            'cidade' => 'required|min:3|max:100',
            'data' => 'required|date',
            'tipo_id' => 'required|integer|numeric',
            'ginasio' => 'required|min:3|max:150',
            'sobre' => 'required|min:3|max:150',
            'informacoes' => 'required|min:3|max:150',
            'estado_id' => 'required|integer|numeric'   
        ];
        
    }

   
}
