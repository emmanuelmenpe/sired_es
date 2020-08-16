@extends('layouts.app')

@section('content')
<div class="container"> 
    <h1>Tabla de Goleo
        @can('administrador')
        <a href="{{route('anotacionespdf')}}" class="btn btn-primary btn-sm float-right" role="button">Imprimir</a>    
        @endcan
    </h1>
    <table class="table table-striped" id="t2">
        <thead>
        <tr>  
            <th scope="col">Equipo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Goles totales</th>
            <th scope="col">Goles penales</th>
            <th scope="col">Goles asistencia</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($jugadores as $jugador)
                @foreach ($equipos as $equipo)
                    @if ($equipo->id == $jugador->id_equipo)
                        <tr>
                            <th scope="row"><img src="{{asset('images/'.$equipo->logo)}}" alt="no_img" height="50px" width="50px"> | {{$equipo->nombre}}</th>
                            <th scope="row"><img src="{{asset('images/'.$jugador->fotografia)}}" alt="no_img" height="50px" width="50px"> | {{$jugador->nombre}}</th>
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
    
</div>
@endsection