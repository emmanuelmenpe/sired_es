@extends('layouts.app')

@section('content')
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Local</th>
        <th scope="col">Visitante</th>
        <th scope="col">Cancha</th>
        <th scope="col">Fecha</th>
        <th scope="col">Hora</th>
        <th scope="col">Arbitro</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($partidos as $partido)
        <tr>
            <td>{{$partido->id_local}}</td>
            <td>{{$partido->id_visitante}}</td>
            <td>{{$partido->cancha}}</td>
            <td>{{$partido->fecha}}</td>
            <td>{{$partido->hora}}</td>
            <td>{{$partido->arbitro}}</td>
            <td>
                <form action="" method="POST">
                    <a href="{{route('partidos.create', $partido->id)}}">
                        <button type="button" class="btn btn-primary btn-sm">Actalizar</button>
                    </a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
          
      @endforeach
    </tbody>
  </table>
@endsection