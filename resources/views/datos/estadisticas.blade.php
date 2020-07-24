@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Estadisticas de equipos</h2>
    <table class="table table-striped">
        <thead>
          <tr>
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
                @php
                    $victorias =  $equipo->victorias;
                    $empates = $equipo->empates;
                    $derrotas = $equipo->derrotas;
                    
                    $total = $victorias + $empates + $derrotas;
                    echo $total;
                    /*
                    $porcentaje = 100/$total;

                    $porcentajeVictoria = $victoria * $porcentaje;
                    $porcentajeEmpate = $empate * $porcentaje;
                    $porcentajeDerrota = $derrota * $porcentaje;
                   */ 
                
                @endphp
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