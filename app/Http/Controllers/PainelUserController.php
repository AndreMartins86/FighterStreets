<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class PainelUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $usuarios =  User::paginate(10);
        
        return view('painel.painel', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('painel.cadastrar_usuario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $req): RedirectResponse
    {
        //User::create($req->validated());

        $usuario = $req->validated();        
        $usuario['password'] = Hash::make($req->password);
        $usuario['created_at'] = now();        
        
        User::create($usuario);

        session()->flash('msg', 'Usuário Cadastrado');   

        return redirect()->route('painel-usuarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $user = User::find($id);

        return view('painel.mostrar', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $user = User::find($id);

        return view('painel.editar_usuario', compact('user'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $req, User $painel_usuario): RedirectResponse
    {
        $atualizado = $req->validated();        

        $painel_usuario->fill($atualizado);        
        $painel_usuario->password = Hash::make($atualizado['password']);
        $painel_usuario->updated_at = now();

        $painel_usuario->save();

        session()->flash('msg', 'Usuário atualizado');

        return redirect()->route('painel-usuarios.index');      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $usuario = User::find($id);

        $usuario->delete();

        session()->flash('msg', 'Usuário apagado');

        return redirect()->route('painel-usuarios.index');
        
    }

    public function filtrar(Request $req): View
    {
        $status = $req->status == 1 ? 1 : 0;

        $inicial = $req->de == null ? '1996-01-01' : $req->de;

        $final = $req->ate == null ? now() : $req->ate;

        $usuarios = User::where('name', 'LIKE', '%'.$req->name.'%')        
        ->where('status', $status)
        ->whereBetween('created_at', [$inicial, $final])
        ->get();

        return view('painel.painel', compact('usuarios'));        
    }
}
