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
            <th scope="col">Goles Ganador</th>
            <th scope="col">Goles perdedor</th>
            <th scope="col">Fecha de partido</th>
        </tr>
        </thead>
        <tbody> 
            @foreach ($partidos as $partido)
                <tr>
                <td>{{$partido->nombre}}</td>
                @php
                    $i=1;
                    foreach ($partidoss as $partidoo) {
                        if ($loop->iteration == $i) {
                            echo "<td>".$partidoo->nombre."</td>";
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