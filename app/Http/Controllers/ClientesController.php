<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Http\Resources\ClienteCollection;
use App\Models\Cliente;
use App\Models\User;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = new ClienteCollection(Cliente::with('user')->paginate(5));

        return view('clientes.index', ['data'=>$clientes]);
    }

    public function create()
    {
        $users = User::all();
        return view('clientes.create', compact('users'));

    }

    public function store(ClienteRequest $request)
    {
        Cliente::create($request->all());

        return redirect('clientes');

    }

    public function edit(Cliente $cliente)
    {
        $user = User::find($cliente->user_id);
        $users = User::all();
        return view('clientes.edit', compact('cliente','user','users'));

    }

    public function update(Cliente $cliente, ClienteRequest $request)
    {
        unset($request['_token']);
        unset($request['_method']);

        $cliente->update($request->all());

        $user = User::find($cliente->user_id);

        return view('clientes.show', compact('cliente','user'));
    }

    public function show(Cliente $cliente)
    {
        $user = User::find($cliente->user_id);

        return view('clientes.show', compact('cliente','user'));

    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect('clientes');

    }
}
