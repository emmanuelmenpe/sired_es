@extends('layouts.app')

@section('content')
<div class="container">

<div class="container">
    <h1>Partidos programados
      @can('administrador')
        <a href="partidos/create">
          <button type="button" class="btn btn-success float-right">Agendar partido</button>
        </a>
      @endcan
    </h1>
  <table class="table table-striped">
      <thead>  
        <tr> 
          <th scope="col">Local</th>
          <th scope="col">Visitante</th>
          <th scope="col">Cancha</th>
          <th scope="col">Fecha</th>
          <th scope="col">Hora</th>
          <th scope="col">Árbitro</th>
          @can('administrador')
            <th scope="col">Opciones</th>
          @endcan
          
        </tr>
      </thead>
      <tbody>
        @foreach ($partidos as $partido)
          <tr> 
              @foreach ($equipos as $equipo)
                @if ($partido->id_local == $equipo->id)
                  <td>
                    @if($equipo->logo != "")
                      <img src="{{ asset('images/'.$equipo->logo) }}" alt="{{ $equipo->logo }}" height="50px" width="50px">
                    @endif
                    {{$equipo->nombre}}</td>
                  @break
                @endif
              @endforeach
              
              @foreach ($equipos as $equipo)
                @if ($partido->id_visitante == $equipo->id)
                  <td>
                    @if($equipo->logo != "")
                      <img src="{{ asset('images/'.$equipo->logo) }}" alt="{{ $equipo->logo }}" height="50px" width="50px">
                    @endif
                    {{$equipo->nombre}}</td>
                  @break
                @endif
              @endforeach
              
              {{--
              @php
                  $i=1;
                  foreach ($partidoss as $partidoo) {
                    if ($loop->iteration == $i) {
                      echo "<td>".$partidoo->nombre."</td>";
                      /*echo "iteration: ".$loop->iteration;
                      echo "id: ".$partidoo->id;*/
                    }
                    $i=$i+1;
                  }
              @endphp
              --}}
              <td>{{$partido->cancha}}</td>
              <td>{{$partido->fecha}}</td>
              <td>{{$partido->hora}}</td>
              <td>{{$partido->arbitro}}</td>
              @can('administrador')
                <td> 
                  <form action="{{route('partidos.destroy', $partido->id)}}" method="POST">
                      @php 
                        $i=0;
                        foreach ($resultados as $resultado ) {
                            if ($resultado->id_partido == $partido->id) {
                              $i=$i-1;
                            }
                        }
                      @endphp
                      @if ($i>=0)
                        <a href="{{route('partidos.edit', $partido->id)}}">
                          <button type="button" class="btn btn-primary btn-sm">Actualizar{{$partido->id}}</button>
                        </a> 
                      @endif
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                      @if ($i>=0)
                        <a href={{route('defResultado', $partido->id)}}>
                          <button type='button' class='btn btn-secondary btn-sm'>Capturar resultados</button>
                        </a>
                      @endif
                  </form>
                </td>
              @endcan
              
          </tr>
            
        @endforeach
      </tbody>
    </table>
</div>
@endsection