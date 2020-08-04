@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Estadisticas de equipos
      <div class="float-right">
        <form class="form-inline my-2 my-lg-0">

            <select name="filtrarC" class="form-control mr-sm-2">
              <option value="" selected disabled>filtar por categoria</option>
              @foreach ($categorias as $categoria)
                <option name="filtrarC" value="{{$categoria->categoria}}">{{$categoria->categoria}}</option>
              @endforeach
            </select>

            <select name="filtrarR" class="form-control mr-sm-2">
              <option value="" selected disabled>filtar por rama</option>
              @foreach ($ramas as $rama)
                <option name="filtrarR" value="{{$rama->rama}}">{{$rama->rama}}</option>
              @endforeach
            </select>
            
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Filtrar</button>
        </form>
      </div>
    </h2>
    <h6> 
      @if ($queryC || $queryR)
        <div class="alert alert-primary" role="alert">
          Los resultados de filtración '{{$queryC}} {{$queryR}}' son: 
        </div>
      @endif
        <!--{{---
      @if ($queryR)
          <div class="alert alert-primary" role="alert">
          Los resultados de filtración '{{$queryR}}' son: 
        </div>
      @endif--}}-->
    </h6>
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