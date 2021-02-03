@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($user->rol_id == (1 || 2))
                        <div class="card-body">
                            {{ __('Bienvenido') }} {{ $user->rol->name }}

                            <table class="table table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="9">
                                            <h4 class="" style="display: inline-block">Lista de usuarios</h4>
                                            <span class="" style="display: inline-block; float: right">
                                                @if($user->rol->id == 1)
                                                    <a href="{{ route('create.user') }}" class="btn btn-primary">Nuevo</a>
                                                @endif
                                            </span>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <th>Nivel de Accesso</th>
                                        <th>Grupo</th>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Número de télefono</th>
                                        <th>Dirección</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user_r)
                                        <tr>
                                            <td>{{ $user_r->email }}</td>
                                            <td>{{ $user_r->rol->name }}</td>
                                            <td>{{ $user_r->people->group->name }}</td>
                                            <td>{{ $user_r->people->name }}</td>
                                            <td>{{ $user_r->people->surname }}</td>
                                            <td>{{ $user_r->people->code }}</td>
                                            <td>{{ $user_r->people->phone_number }}</td>
                                            <td>{{ $user_r->people->adress }}</td>
                                            <td calss="text-center">
                                                <a  href="{{ route('edit.user', $user_r->people->id) }}" class="btn btn-success">Editar</a>
                                                @if($user->rol->id == 1)
                                                    <form action="{{ route('delete.user', $user_r->people->id) }}" method="post">
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit">Eliminar</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    @elseif($user->rol_id == (3 ||4))
                        <div class="card-body">
                            {{ __('Bienvenido') }} {{ $user->rol->name }}
                            <p>perteneces al grupo de: {{ $user->people->group->name }}</p>
                            <ul>
                                <li>{{ $user->people->name }}</li>
                                <li>{{ $user->people->surname }}</li>
                                <li>{{ $user->people->code }}</li>
                                <li>{{ $user->people->phone_number }}</li>
                                <li>{{ $user->people->adress }}</li>
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
