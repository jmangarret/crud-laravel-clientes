@extends('app')
@section('content')
    <div class="mt-8 overflow-hidden shadow sm:rounded-lg">
        <div class="p-12">
            <table class="table" width="100%">
                <thead>
                    <tr>
                        <td colspan="5">
                            &nbsp;
                        </td>
                        <td>
                            <a href="{{ url('/clientes/create') }}">
                                <button class="btn btn-success">
                                    Nuevo
                                </button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                </thead>
                <thead>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </thead>

                <tbody>
                    @forelse ($data as $cliente)
                        <tr>
                            <td>{{ $cliente->nombre }} {{ $cliente->apellidos }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->direccion }}</td>
                            <td>{{ $cliente->user->name }}</td>
                            <td>
                                <a href="{{ url('/clientes/' . $cliente->id) }}">
                                    <button class="btn btn-info">
                                        Ver
                                    </button>
                                </a>
                                <a href="{{ url('/clientes/' . $cliente->id . '/edit') }}">
                                    <button class="btn btn-warning">
                                        Editar
                                    </button>
                                </a>
                                <a href="#">
                                    <button class="btn btn-danger" onclick="modalEliminar({{ $cliente->id }})">
                                        Eliminar
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <p class="">No records...</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
            {{ $data->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <div class="modal" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Seguro desea eliminar este cliente?</p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ url('clientes/id') }}" id="formEliminar">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function modalEliminar(id) {
            $('#formEliminar').attr('action', '/clientes/' + id);
            $('#myModal').modal('show')
        }
    </script>

@endsection
