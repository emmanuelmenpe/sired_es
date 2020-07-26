@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Estadisticas de equipos</h2>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Equipo</th>
            <th scope="col">% Victorias</th>
            <th scope="col">% Empates</th>
            <th scope="col">% Derrotas</th>
            <th scope="col">Liga</th>
            <th scope="col">Rama</th>
            <th scope="col">Categoria</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($equipos as $equipo)
            <tr>
                <td>{{$equipo->nombre}}</td>
                @php
                    $victorias =  $equipo->victorias;
                    $empates = $equipo->empates;
                    $derrotas = $equipo->derrotas;
                    
                    $total = $victorias + $empates + $derrotas;
                    
                    if ($total>1) {
                      $porcentaje = 100/$total;

                      $porcentajeVictoria = $victorias * $porcentaje;
                      $porcentajeEmpate = $empates * $porcentaje;
                      $porcentajeDerrota = $derrotas * $porcentaje;

                      round($porcentajeVictoria);
                      round($porcentajeEmpate);
                      round($porcentajeDerrota);
                      
                      echo "<td>".round($porcentajeVictoria, 2)."</td>";
                      echo "<td>".round($porcentajeEmpate, 2)."</td>";
                      echo "<td>".round($porcentajeDerrota, 2)."</td>";
                    } else {
                      echo "<td>$equipo->victorias</td>";
                      echo "<td>$equipo->empates</td>";
                      echo "<td>$equipo->derrotas</td>";
                    }
                @endphp
                <td>{{$equipo->liga}}</td>
                <td>{{$equipo->rama}}</td>
                <td>{{$equipo->categoria}}</td>
            </tr>
  
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="mx-auto">
          {{ $equipos->links() }}   
        </div>
      </div>
</div>
@endsection