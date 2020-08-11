@extends('layouts.app')

@section('content')
<div class="container">
  <div class="jumbotron jumbotron-fluid">
      <div class="container">
          <h1 class="display-4">Datos de equipo: {{$equipo->nombre}}
          </h1>
          <table class="table">
              <thead>
                <tr>
                  <th scope="col">Victorias</th>
                  <th scope="col">Empates</th>
                  <th scope="col">derrotas</th>
                  <th scope="col">Rama</th>
                  <th scope="col">categoria</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{$equipo->victorias}}</td>
                  <td>{{$equipo->empates}}</td>
                  <td>{{$equipo->derrotas}}</td>
                  <td>{{$equipo->rama}}</td>
                  <td>{{$equipo->categoria}}</td>
                </tr>
              </tbody>
            </table> 
            <h1>Integrantes
              <!--{{--<a href="/jugadores/create">   OR
                <a href="{{route('jugadores.create',$equipo->id)}}">--}}-->
              @can('administrador')
                <a href="{{route('jugadorNew', $equipo->id)}}"> 
                  <button type="button" class="btn btn-success float-right">Agregar jugador</button>
                </a>
              @endcan
              
            </h1>
            <div class="container">
              
              <div class="d-flex align-content-lg-center flex-wrap">
                @foreach ( $jugadores as $jugador)
                @if ($equipo->id == $jugador->id_equipo)
                {{--@if ($jugador->sancion == 0)--}}
                  @if ($jugador->manager == 1)
                    <div class="card" style="width: 19rem; margin: 10px 10px 10px 10px; background-color: #00FF5D;">
                      <img src="{{asset('images/'.$jugador->fotografia)}}" class="card-img-top" height="200px" alt="no_img">
                      <div class="card-body">
                        <h3 class="card-title">{{$jugador->nombre}}</h3>
                        <p class="card-text">
                          <h3>Manager</h3> <br>
                        </p>
                        @can('administrador')
                          <form action="{{route('jugadores.destroy', $jugador->id)}}" method="POST">
                              
                              <a href="{{route('jugadores.edit', $jugador->id)}}">
                                <button type="button" class="btn btn-primary btn-sm">Editar</button>
                              </a>
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                          </form>
                        @endcan
                      </div>
                    </div>
                  @endif
                @endif
              @endforeach

              @foreach ( $jugadores as $jugador)
                @if ($equipo->id == $jugador->id_equipo)
                {{--@if ($jugador->sancion == 0)--}}
                  @if ($jugador->manager == 0)
                    <div class="card" style="width: 19rem; margin: 10px 10px 10px 10px;">
                      <img src="{{asset('images/'.$jugador->fotografia)}}" class="card-img-top" height="200px" alt="no_img">
                      <div class="card-body">
                        <h3 class="card-title">{{$jugador->nombre}}</h3>
                        <p class="card-text">
                          Goles anotados:{{$jugador->goles}} <br>
                          Goles por penales:{{$jugador->goles_penal}} <br>
                          Asistencia a gol:{{$jugador->goles_asistencia}} <br>
                        </p>
                        
                          <form action="{{route('jugadores.destroy', $jugador->id)}}" method="POST">
                              <a href="{{route('jugadores.show', $jugador->id)}}">
                                <button type="button" class="btn btn-secondary btn-sm">Ver</button>
                              </a>
                              @can('administrador')
                              <a href="{{route('jugadores.edit', $jugador->id)}}">
                                <button type="button" class="btn btn-primary btn-sm">Editar</button>
                              </a>
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            @endcan
                          </form>
                      </div>
                    </div>
                  @endif
                @endif
              @endforeach
              </div>
            </div>
      </div>
  </div>
</div>
@endsection