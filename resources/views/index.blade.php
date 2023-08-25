@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Lista de Songs</h2>
        </div>
        <div>
            <a href="{{ route('songs.create') }}"  class="btn btn-primary">Crear song</a>
            <a href="{{ route('welcome') }}" class="btn btn-primary">Volver a Inicio</a>
        </div>
    </div>

    @if (Session::get('success'))
    <div class="alert alert-success mt-2">
        <strong>{{Session::get('success')}}<br>
    </div>
    @endif

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Autor</th>
                <th>Título Canción</th>
                <th>Título Album</th>
                <th>Tiempo</th>
                <th>Fecha de creación</th>
            </tr>
            @foreach($songs as $song)
            <tr>
                <td class="fw-bold">{{$song->author}}</td>
                <td>{{$song->title}}</td>
                <td>{{$song->album}}</td>
                <td>
                    <span class="badge bg-warning fs-6">{{$song->time}}min</span>
                </td>
                <td>{{ \Carbon\Carbon::parse($song->due_date)->format('d-m-Y') }}</td>
                <td>
                    <a href="{{ route('songs.edit', $song->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{route('songs.destroy', $song)}}" method="POST" class="d-inline">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>

            @endforeach
        </table>
        {{$songs->links()}}
    </div>
</div>
@endsection