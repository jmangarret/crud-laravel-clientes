@extends('app')
@section('content')
<div class="mt-8 overflow-hidden shadow sm:rounded-lg">
    <div class="p-12">
        <table class="table" width="100%">
            <tbody>
                <tr>
                    <th>Nombre</th>
                    <td>{{ $cliente->nombre }} {{ $cliente->apellidos }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $cliente->email }}</td>
                </tr>
                <tr>
                    <th>Telefono</th>
                    <td>{{ $cliente->telefono }}</td>
                </tr>
                <tr>
                    <th>Direccion</th>
                    <td>{{ $cliente->direccion }}</td>
                </tr>
                <tr>
                    <th>Usuario</th>
                    <td> {{$user->name}} </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="{{url('/clientes')}}">
                            <button class="btn btn-secondary">
                                Volver
                            </button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </div>
    </div>
</div>

@endsection
