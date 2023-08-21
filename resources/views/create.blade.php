@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Crea Tú lista de Canciones Favoritas</h2>
        </div>
        <div>
            <a href="{{route('songs.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>
    
    @if ($errors->any())
    <div class="alert alert-danger mt-2">
        <strong>Para crear una nueva canción necesitas colocar la información de la canción que quieres guardar en tú lista de favoritos.</strong> Lo lamento algo fue mal..<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{route('songs.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Autor de la canción</strong>
                    <input type="text" name="author" class="form-control" placeholder="Nombre del autor de la canción" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Título de la canción</strong>
                    <input type="text" name="title" class="form-control" placeholder="Título de la canción" >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nombre del album</strong>
                    <input type="text" name="album" class="form-control" placeholder="Nombre del Album" >
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Duración de la canción apróximada en minutos</strong>
                    <input type="number" name="time" class="form-control" placeholder="tiempo de la canción">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 mt-2">
                <div class="form-group">
                    <strong>Fecha creación canción:</strong>
                    <input type="date" name="due_date" class="form-control" id="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
@endsection