@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1>Tabla de posiciones
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
    </h1>
    <table class="table" id="t1" >
        <thead>
          <tr class="bg-success">
            <th scope="col"># Posición</th>
            <th scope="col">Nombre</th>
            <th scope="col">JJ</th>
            <th scope="col">JG</th>
            <th scope="col">JE</th>
            <th scope="col">JP</th>
            <th scope="col">GF</th>
            <th scope="col">GC</th>
            <th scope="col">DIF</th>
            <th scope="col">%V</th>
            <th scope="col">%E</th>
            <th scope="col">%D</th>
            <th scope="col">PTS</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($equipos as $equipo)
            <tr>
                @php
                    $JJ = $equipo->victorias + $equipo->empates + $equipo->derrotas;
                    $DIF = $equipo->goles_favor - $equipo->goles_contra;
                @endphp
                <th scope="row">{{$loop->iteration}}</th>
                <th scope="row"><img src="{{asset('images/'.$equipo->logo)}}" alt="no_img" height="60px" width="60px"> | {{$equipo->nombre}}</th>
                <td>{{$JJ}}</td> 
                <td>{{$equipo->victorias}}</td>
                <td>{{$equipo->empates}}</td>
                <td>{{$equipo->derrotas}}</td>
                <td>{{$equipo->goles_favor}}</td>
                <td>{{$equipo->goles_contra}}</td>
                <td>{{$DIF}}</td>
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
                <td>{{$equipo->puntos}}</td>
            </tr>
  
          @endforeach
        </tbody>
    </table>
    
    {{-------------------------------------------------------------
    <br>
    <h1>Tabla de Goleo</h1>
    <table class="table" id="t2">
        <thead>
        <tr class="bg-success">  
            <th scope="col">Equipo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Goles totales</th>
            <th scope="col">Goles penales</th>
            <th scope="col">Goles asistencia</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($jugadores as $jugador)
                @foreach ($equiposJ as $equipoJ)
                    @if ($equipoJ->id == $jugador->id_equipo)
                        <tr>
                            <td><img src="{{asset('images/'.$equipoJ->logo)}}" alt="no_img" height="50px" width="50px"> | {{$equipo->nombre}}</td>
                            <td><img src="{{asset('images/'.$jugador->fotografia)}}" alt="no_img" height="50px" width="50px"> | {{$jugador->nombre}}</td>
                            <td>{{$jugador->goles}}</td>
                            <td>{{$jugador->goles_penal}}</td>
                            <td>{{$jugador->goles_asistencia}}</td>
                        </tr>
                        @break
                    @endif
                @endforeach
            @endforeach
        
        </tbody>
    </table>
    --}}
</div>
@endsection