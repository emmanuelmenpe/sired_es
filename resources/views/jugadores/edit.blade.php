@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Jugador:{{$jugador->nombre}}</h1>
    <div class="text-center">
        <img src="{{ asset('images/'.$jugador->fotografia) }}" height="200px" width="200px" alt="{{ $jugador->fotografia }}">
    </div>
    <br>
    <form action="{{ route('jugadores.update', $jugador->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="form-group col-md-4">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{$jugador->nombre}}" placeholder="Nombre de jugador" required>
            </div>

        
            <div class="form-group col-md-4">
                <label for="curp">CURP</label>
                <input type="text" class="form-control" onKeyUp="this.value=this.value.toUpperCase();" name="curp" minlength="18" maxlength="18" value="{{$jugador->curp}}" placeholder="agregue CURP del jugador" required>
            </div>

            <div class="form-group col-md-4">
                <label>Nueva fotografía </label>
                <input type="file" name="fotografia" class="form-control">
                @if($jugador->fotografia != "")
                    <img src="{{ asset('images/'.$jugador->fotografia) }}" alt="{{ $jugador->fotografia }}" height="50px" width="50px">
                    <small>fotografía actual</small>
                @endif
            </div>
        </div>

        @if ($jugador->manager == 0)
        <div class="row">
            <div class="form-group col-md-4">
                <label for="goles">Goles anotados</label>
                <input type="number" class="form-control" name="goles" min="{{$jugador->goles}}" value="{{$jugador->goles}}" placeholder="agregue CURP del jugador" required>
            </div>

            <div class="form-group col-md-4">
                <label for="penal">Goles por penal</label>
                <input type="number" class="form-control" name="penal" min="{{$jugador->goles_penal}}" value="{{$jugador->goles_penal}}" placeholder="agregue CURP del jugador" required>
            </div>

            <div class="form-group col-md-4">
                <label for="asistencia">Asistencia a gol</label>
                <input type="number" class="form-control" name="asistencia" min="{{$jugador->goles_asistencia}}" value="{{$jugador->goles_asistencia}}" placeholder="agregue CURP del jugador" required>
            </div>
        </div>
        @endif
        
        {{--
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                ¿El jugador tiene sanción?
            </a>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="sancion">Sancionado</label>
                        <select name="sancion" class="form-control" required>
                            @if ($jugador->sancion == 0)
                                <option value="0" selected>NO</option>
                                <option value="1">SI</option>
                            @else
                                <option value="0">NO</option>
                                <option value="1" selected>SI</option>
                            @endif
                            
                        </select>
                    </div>
                
                    <div class="form-group col-md-4">
                        <label for="fecha_sancion">Fecha de sancion <small>(opcional)</small></label>
                        <input class="form-control" type="date" max="{{$jugador->fecha_fin}}" value="{{$jugador->fecha_sancion}}" name="fecha_sancion">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fecha_fin">Fin de sancion <small>(opcional)</small></label>
                        <input class="form-control" type="date" min="{{$jugador->fecha_sancion}}" value="{{$jugador->fecha_fin}}" name="fecha_fin">
                    </div>
                </div>
        
                <div class="form-group col-md-4">
                    <label for="motivo">Motivo de sancion<small>(opcional)</small></label>
                    <br>
                    <textarea name="motivo" cols="50" rows="10" maxlength="255" >{{$jugador->motivo}}</textarea>
                </div>
            </div>
        </div>
        <br>
        --}}
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <button type="reset" onclick="history.back()" class="btn btn-danger">Cancelar</button>
    </form>
</div>
@endsection