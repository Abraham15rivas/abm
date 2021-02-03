
@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Actualización de datos') }}</div>
                <div class="card-body">
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
                    <form action="{{ route('update.user', $person->id) }}" method="post">
                        @csrf
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                            <label for="name" class="col-form-label">Nombre de usuario:</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $person->user->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-form-label">Email:</label>
                                <input type="text" name="email" class="form-control" id="email" value="{{ $person->user->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label">Password:</label>
                                <input type="password" name="password" class="form-control" id="password" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="col-form-label">Confirmación Password:</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="rol" class="col-form-label">Nivel de Accesso:</label>
                                <select name="rol" id="rol" required>
                                    @foreach ($rols as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name_p" class="col-form-label">Nombre</label>
                                <input type="text" class="form-control" name="name_p" id="name_p" value="{{ $person->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="surname" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" name="surname" id="surname" value="{{ $person->surname }}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone_number" class="col-form-label" >Número de telefono:</label>
                                <input type="number" class="form-control" name="phone_number" id="phone_number" value="{{ $person->phone_number }}" required>
                            </div>
                            <div class="form-group">
                            <label for="adress" class="col-form-label">Dirección:</label>
                            <textarea class="form-control" name="adress" id="adress" required>{{ $person->adress }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="group" class="col-form-label">Grupo de usuario</label>
                                <select name="group" id="rol" required>
                                    @foreach ($groups as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection