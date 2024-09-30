<?php

namespace App\Http\Controllers;

//use App\Http\Requests\TorneioRequest;
use App\Models\Campeonato;
use App\Models\Chave;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
//use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;




class PainelTorneioController extends Controller
{
    use ChavesTrait{ ChavesTrait::chaveInicial as chaveInicial; }

    public function painelLogin(): View
    {
        return view('painel.painel_login');
    }

    public function painelLogar(Request $req): RedirectResponse
    {
        $credenciais = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credenciais)) 
        {
            $req->session()->regenerate();

            return redirect()->intended('/painel-torneios');
        }

        return back()->withErrors([
            'email' => 'Email inválido'
        ])->onlyInput('email');        
    }

    public function painelLogout(Request $req): RedirectResponse
    {
        Auth::logout();

        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('/painel-login');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //SELECT destaques.posicao, campeonatos.id, titulo, DATE_FORMAT(campeonatos.data, "%d/%m/%Y") as "data", cidade, estados.sigla FROM campeonatos
        //INNER JOIN destaques on campeonatos.id = destaques.campeonato_id
        //INNER JOIN estados on campeonatos.estado_id = estados.id;
        $campeonatos = Campeonato::where('status', 1)
        ->orderBy('data')
        ->paginate(10);        

        if (DB::table('destaques')->count() < 1) {
            $destaques = false;

            return view('painel.painel_torneio', compact('campeonatos', 'destaques'));
        }

        $destaques = $this->destaques();

        return view('painel.painel_torneio', compact('campeonatos', 'destaques'));
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
    public function edit(string $id): View
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
        //dd($req->titulo);
        $validador = Validator::make($req->all(), $this->regras());       
        
        if ($validador->fails()) {

          return response()->json(['errors' => $validador->errors()]);

        }
        
        $campeonatoDados = $validador->safe()->except(['extension']);        

        $campeonato = Campeonato::find($id);

        $deletarArq = substr($campeonato->imagem, 9);
        Storage::disk('public')->delete($deletarArq);

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

        session()->flash('msg', 'Campeonato Atualizado');

        return response()->json(['success'=>'Atualizado', 'link' => route('painel-torneios.index')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $campeonato = Campeonato::find($id);

        $deletarArq = substr($campeonato->imagem, 9);
        Storage::disk('public')->delete($deletarArq);
        
        $campeonato->delete();
        session()->flash('msg', 'Campeonato Deletado');

        return redirect()->route('painel-torneios.index');

    }

    public function filtrarTorneio(Request $req): View
    {
        $status = $req->status == 1 ? 1 : 0;
        $inicial = $req->de == null ? '1996-01-01' : $req->de;
        $final = $req->ate == null ? now() : $req->ate;

        $campeonatos = Campeonato::where('titulo', 'LIKE', '%'.$req->titulo.'%')        
        ->where('status', $status)
        ->whereBetween('created_at', [$inicial, $final])
        ->paginate();

        if (DB::table('destaques')->count() < 1) {
            $destaques = false;

            return view('painel.painel_torneio', compact('campeonatos', 'destaques'));
        }

        $destaques = $this->destaques();

        return view('painel.painel_torneio', compact('campeonatos', 'destaques'));
    }

    public function salvarDestaques(Request $req)
    {
        $tam = count($req->all());
        $vetor = array_values($req->all());  

        DB::table('destaques')->truncate();

        for ($i=0;$i<$tam; $i++) {
            $pos = $i + 1;
            DB::table('destaques')->insert([
                'posicao' => $pos,
                'campeonato_id' => intval($vetor[$i]),
                'created_at' => now(),
                'updated_at' => now()
            ]);            
        }

        return response()->json(['success'=>'Destaque salvo']);
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

    private function destaques(): Collection
    {
        //$destaques = DB::table('campeonatos')
        $destaques = Campeonato::join('destaques','campeonatos.id', '=', 'destaques.campeonato_id')
        ->join('estados','campeonatos.estado_id', '=', 'estados.id')
        ->selectRaw('destaques.posicao, campeonatos.id, titulo, DATE_FORMAT(campeonatos.data, "%d/%m/%Y") as "data", cidade, estados.sigla')
        ->get();

        return $destaques;
    }

    public function chaves($id): View
    {        
        $campeonato = Campeonato::find($id);

        return view('painel.painel_chave_detalhes', compact('campeonato'));        
    }

    public function criarChaves($id)
    {
        $this->chaveInicial($id);

        $campeonato = Campeonato::find($id);

        return view('painel.painel_chave_detalhes', compact('campeonato'));
    }
   
}
