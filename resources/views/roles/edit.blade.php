@extends('layouts.app')

@section('title')
Crear rol
@endsection


@section('content')
<div class="container">
    <div class="card col-md-8 offset-2">
        <div class="card-header">
            <div class="card-title">
                Editar rol
            </div>
        </div>
        <div class="card-body">

            <form action="/roles/{{$rol->id}}" method="POST">
                @csrf
                @method("PUT")
                <div class="row mb-2">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$rol->name}}"
                        aria-describedby="helpId" placeholder="" required>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror    

                </div>

                <div class="mb-2">
                    <label for="name">Seleccione los permisos</label>
                    @foreach ($permisos as $permiso)
                    <div class="d-block">
                        <label for="">
                            <input type="checkbox" name="permisos[]" value="{{$permiso->id}}"
                                @foreach ($permisosDelRol as $permisoDelRol)
                                    {{($permisoDelRol->id == $permiso->id) ? "checked" : ''}}
                                @endforeach
                            
                             >
                            {{$permiso->description}}
                        </label>
                    </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary btn-block">Crear</button>
            </form>
        </div>
    </div>
</div>
@endsection

