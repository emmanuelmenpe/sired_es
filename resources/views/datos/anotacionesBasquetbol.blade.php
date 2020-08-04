@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tabla de canastas de jugadores
        <div class="float-right">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Buscar jugador" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </h1>
    <h6> 
        @if ($search)
          <div class="alert alert-primary" role="alert">
            Los resultados para tu busqueda '{{$search}}' son: 
          </div>
        @endif
    </h6>
    <table class="table table-striped">
        <thead>
        <tr>  
            <th scope="col">Nombre</th>
            <th scope="col">Fotografia</th>
            <th scope="col">Equipo</th>
            <th scope="col">Goles totales</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($jugadores as $jugador)
                @foreach ($equipos as $equipo)
                    @if ($equipo->id_liga == 2 && $equipo->id == $jugador->id_equipo)
                        <tr>
                            <td>{{$jugador->nombre}}</td>
                            <td><img src="{{asset('images/'.$jugador->fotografia)}}" alt="no_img" height="50px" width="50px"></td> 
                            <td>{{$equipo->nombre}}</td>
                            <td>{{$jugador->goles}}</td>
                        </tr>
                        @break
                    @endif
                @endforeach
            {{--
            <tr>
                <th>{{$jugador->nombre}}</th>
                <td><img src="{{asset('images/'.$jugador->fotografia)}}" alt="no_img" height="50px" width="50px"></td> 
                @foreach ($equipos as $equipo)
                    @if ($equipo->id == 1)
                            <td>{{$equipo->nombre}}</td>  
                            @break
                    @endif
                    
                @endforeach
                <td>{{$jugador->goles}}</td>
            </tr>
            --}}
            @endforeach
        
        </tbody>
    </table>
</div>
@endsection