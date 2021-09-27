@extends('app')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{url('clientes/' . $cliente->id )}}" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="exampleFormControlInput1">Nombres</label>
            <input name="nombre" class="form-control" placeholder="Nombre del cliente" value="{{$cliente->nombre}}" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Apellidos</label>
            <input name="apellidos" class="form-control" placeholder="Apellidos" value="{{$cliente->apellidos}}" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Telefono</label>
            <input name="telefono" class="form-control" placeholder="Num. de Telf." value="{{$cliente->telefono}}" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email</label>
            <input name="email" type="email" class="form-control" placeholder="name@example.com" value="{{$cliente->email}}" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Direccion</label>
            <textarea name="direccion" class="form-control" rows="3" required>{{$cliente->direccion}}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Usuario</label>
            <select name="user_id" class="form-control" required>
                <option value>-- Seleccione --</option>
                @foreach ($users as $user)
                    @if($user->id === $cliente->user_id)
                        <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                    @else
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
        <button type="reset" class="btn btn-secondary">Resetear</button>

    </form>
@endsection
