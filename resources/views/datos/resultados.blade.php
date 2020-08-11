@extends('layouts.app')

@section('content') 
<div class="container">
    <h1>Resultados de partidos</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Local</th>
            <th scope="col">Visitante</th>
            <th scope="col">Ganador</th>
            <th scope="col">Goles local</th>
            <th scope="col">Goles visitante</th>
            <th scope="col">Fecha de partido</th>
        </tr>
        </thead>
        <tbody>
            {{--
            @foreach ($resultados as $resultado)
                <tr>
                    @foreach ($partidos as $partido)
                        @foreach ($equipos as $equipo)
                            @if ($partido->id_local == $equipo->id)
                                <td>{{$equipo->nombre}}</td>
                                @break
                            @endif
                        @endforeach 
                        @break 
                    @endforeach

                    @foreach ($partidos as $partido)
                        @foreach ($equipos as $equipo)
                            @if ($partido->id_visitante == $equipo->id)
                                <td>{{$equipo->nombre}}</td>
                                @break
                            @endif
                        @endforeach  
                        @break
                    @endforeach

                    @if ($resultado->id_ganador == $partido->id_local)
                        <td>Local</td>
                    @elseif($resultado->id_ganador == $partido->id_visitante)
                        <td>Visitante</td>
                    @else
                        <td>Empate</td>
                    @endif
                </tr>
            @endforeach 
            --}}
            
            @foreach ($partidos as $partido)
                <tr>
                <td>
                    @if($partido->logo != "")
                      <img src="{{ asset('images/'.$partido->logo) }}" alt="{{ $partido->logo }}" height="50px" width="50px">
                    @endif
                    {{$partido->nombre}}
                </td>
                @php 
                    $i=1;
                    foreach ($partidoss as $partidoo) {
                        if ($loop->iteration == $i) {
                            echo "<td>".
                                "<img src=".asset('images/'.$partidoo->logo)." alt=".$partido->logo." height='50px' width='50px'>". 
                                $partidoo->nombre.
                                "</td>";
                        }
                        $i=$i+1;
                    }
                    if ($partido->id_ganador == $partido->id_local) {
                        //echo "<td>".$partido->nombre."</td>";
                        echo "<td>local</td>";
                    } elseif ($partido->id_perdedor == $partido->id_local) {
                        //echo "<td>".$partidoo->nombre."</td>";
                        echo "<td>visitante</td>";
                    } else {
                        echo "<td>empate</td>"; 
                    }
                    
                @endphp
                <td>{{$partido->goles_ganador}}</td> 
                <td>{{$partido->goles_perdedor}}</td>
                <td>{{$partido->fecha}}</td>
              </tr>  
            @endforeach
            
        </tbody>
    </table>
</div>
@endsection 