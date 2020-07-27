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
                      <th scope="col">liga</th>
                      <th scope="col">Rama</th>
                      <th scope="col">categoria</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{$equipo->victorias}}</td>
                      <td>{{$equipo->empates}}</td>
                      <td>{{$equipo->derrotas}}</td>
                      <td>{{$equipo->liga}}</td>
                      <td>{{$equipo->rama}}</td>
                      <td>{{$equipo->categoria}}</td>
                    </tr>
                  </tbody>
                </table>
                <h1>Integrantes
                  <!--{{--<a href="/jugadores/create">   OR
                    <a href="{{route('jugadores.create',$equipo->id)}}">--}}-->
                  <a href="{{route('jugadores.create', $equipo->id)}}">
                    <button type="button" class="btn btn-success float-right">Agregar jugador</button>
                  </a>
                </h1>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">CURP</th>
                      <th scope="col">Fotografia</th>
                      <th scope="col">Sancionado</th>
                      <th scope="col">Motivo</th>
                      <th scope="col">Fecha sancion</th>
                      <th scope="col">fecha fin</th>
                      <th scope="col">Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $jugadores as $jugador)
                    @if ($equipo->id == $jugador->id_equipo)
                    @if ($jugador->sancion == 0)
                      <tr>
                        <td>{{$jugador->nombre}}</td> 
                        <td>{{$jugador->curp}}</td> 
                        <td><img src="{{asset('images/'.$jugador->fotografia)}}" alt="no_img" height="50px" width="50px"></td> 
                        @if ($jugador->sancion == 0)
                          <td>NO</td>
                        @else
                          <td>SI</td>
                        @endif
                        <td>{{$jugador->motivo}}</td>
                        <td>{{$jugador->fecha_sancion}}</td>
                        <td>{{$jugador->fecha_fin}}</td>
                        <td> 
                          <form action="{{route('jugadores.destroy', $jugador->id)}}" method="POST">
                              <a href="{{route('jugadores.edit', $jugador->id)}}">
                                  <button type="button" class="btn btn-primary btn-sm">Editar</button>
                              </a>
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                          </form>
                        </td>
                      </tr>  
                    @else
                      <tr style="background-color: #FF4200">
                        <td>{{$jugador->nombre}}</td> 
                        <td>{{$jugador->curp}}</td> 
                        <td><img src="{{asset('images/'.$jugador->fotografia)}}" alt="no_img" height="50px" width="50px"></td> 
                        @if ($jugador->sancion == 0)
                          <td>NO</td>
                        @else
                          <td>SI</td>
                        @endif
                        <td>{{$jugador->motivo}}</td>
                        <td>{{$jugador->fecha_sancion}}</td>
                        <td>{{$jugador->fecha_fin}}</td>
                        <td> 
                          <form action="{{route('jugadores.destroy', $jugador->id)}}" method="POST">
                              <a href="{{route('jugadores.edit', $jugador->id)}}">
                                  <button type="button" class="btn btn-primary btn-sm">Editar</button>
                              </a>
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                          </form>
                        </td>
                      </tr>
                    @endif
                      
                    @endif
                        
                    @endforeach
                  </tbody>
                </table>
          </div>
      </div>
  </div>
@endsection