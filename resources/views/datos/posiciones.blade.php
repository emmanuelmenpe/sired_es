@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>tabla de posiciones</h2>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#posicion</th>
                <th scope="col">Equipo</th>
                <th scope="col">Victorias</th>
                <th scope="col">Empates</th>
                <th scope="col">Derrotas</th>
                <th scope="col">Liga</th>
                <th scope="col">Rama</th>
                <th scope="col">Categoria</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($equipos as $equipo)
                <tr>
                    <td>g</td>
                    <td>{{$equipo->nombre}}</td>
                    <td>{{$equipo->victorias}}</td>
                    <td>{{$equipo->empates}}</td>
                    <td>{{$equipo->derrotas}}</td>
                    <td>{{$equipo->id_liga}}</td>
                    <td>{{$equipo->id_rama}}</td>
                    <td>{{$equipo->id_categoria}}</td>
                </tr>
      
              @endforeach
            </tbody>
          </table>
    </div>
@endsection