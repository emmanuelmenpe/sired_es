@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="text-center">
                <img src="{{ asset('images/'.$jugador->fotografia) }}" height="200px" width="200px" alt="{{ $jugador->fotografia }}">
                <h1 class="display-4">{{$jugador->nombre}}</h1>
                <h3>Goles anotados: {{$jugador->goles}}</h3>
                <h3>Goles penal: {{$jugador->goles_penal}}</h3>
                <h3>Asistencia a gol: {{$jugador->goles_asistencia}}</h3>
            </div>
            <br>
            <table class="table table-striped">
                <h1>Historial sanciones
                    @can('administrador')
                        <a href="{{route('sancionnew', $jugador->id)}}">
                            <button type="button" class="btn btn-success float-right">Agregar sanción</button>
                        </a>
                    @endcan
                </h1>
                <thead>
                  <tr>
                    <th scope="col" style="width: 60%;">Motivo</th>
                    <th scope="col">Fecha de sanción</th>
                    <th scope="col">Fin de sanción</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($historiales as $historial)
                        @if ($historial->id_jugador == $jugador->id)
                            <tr>
                                <td><p style="word-break: break-all;">{{$historial->motivo}}</p></td>
                                <td>{{$historial->fecha_sancion}}</td>
                                <td>{{$historial->fecha_fin}}</td>
                            </tr> 
                        @endif
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection