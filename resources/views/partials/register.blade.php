
@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header vino">{{ __('Registro') }}</div>
                <div class="card-body body-card">
                    @if ($errors->any())
                        <div class="content">
                            <div class="alert alert-danger">
                                <h4 class="text-dark">Corrige antes de continuar</h4>
                                <ul>
                                    @foreach ($errors->all() as $error )
                                        <li class="text-dark">{{ $error }}</li>
                                    @endforeach
                                </ul>           
                            </div>
                        </div>
                    @endif   
                    <form action="{{ route('store.user') }}" method="post">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                            <label for="name" class="col-form-label">Nombre de usuario:</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-form-label">Email:</label>
                                <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label">Password:</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label">Confirmar password:</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="form-group">
                                <label for="rol" class="col-form-label">Nivel de Accesso:</label>
                                <select name="rol" id="rol" required>
                                    @foreach ($rols as $item)
                                        <option value="{{ $item->id }}" @if($item->id == old('rol')) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name_p" class="col-form-label">Nombre</label>
                                <input type="text" class="form-control" name="name_p" id="name_p" value="{{ old('name_p') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="surname" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" name="surname" id="surname" value="{{ old('surname') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone_number" class="col-form-label" >Número de telefono:</label>
                                <input type="number" class="form-control" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" required>
                            </div>
                            <div class="form-group">
                            <label for="adress" class="col-form-label">Dirección:</label>
                            <textarea class="form-control" name="adress" id="adress" required>{{ old('adress') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="group" class="col-form-label">Grupo de usuario</label>
                                <select name="group" id="group" required>
                                    @foreach ($groups as $item)
                                        <option value="{{ $item->id }}" @if($item->id == old('group')) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="/home" class="btn btn-secondary" data-dismiss="modal">volver</a>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection