@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Datos de equipo: {{$equipo->nombre}}</h1>
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
                    <td>{{$equipo->id_liga}}</td>
                    <td>{{$equipo->id_rama}}</td>
                    <td>{{$equipo->id_categoria}}</td>
                  </tr>
                </tbody>
              </table>
              <h1>Integrantes</h1>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">CURP</th>
                    <th scope="col">Sancionado</th>
                    <th scope="col">Motivo</th>
                    <th scope="col">Fecha sancion</th>
                    <th scope="col">fecha fin</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($jugadores as $jugador)
                        {{--@if ($integrantes->id_equipo == $equipo->id)--}}
                        <tr>
                            <td>{{$jugador->nombre}}</td>
                            <td>{{$jugador->curp}}</td> 
                            <td>{{$jugador->sancion}}</td>
                            <td>{{$jugador->motivo}}</td>
                            <td>{{$jugador->fecha_sancion}}</td>
                            <td>{{$jugador->fecha_fin}}</td>
                        </tr>
                        {{--@endif--}}
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection