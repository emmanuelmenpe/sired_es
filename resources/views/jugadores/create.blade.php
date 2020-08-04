@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Jugador</h1>
        <form action="/jugadores" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre de jugador" required>
            </div>

            <div class="row">
                <div class="form-group col-md-3">
                <label for="curp">CURP</label>
                <input type="text" class="form-control" name="curp" minlength="18" maxlength="18"  placeholder="agregue CURP del jugador" required>
                </div>
            
                <div class="form-group col-md-3">
                    <label for="fotografia">Fotografia</label>
                    <input type="file" name="fotografia" class="form-control" required>
                </div>
            
                <div class="form-group col-md-3">
                    <label for="fotografia">Goles/Canastas anotados</label>
                    <input type="number" name="goles" value="0" min="0" class="form-control" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="id_equipo">Equipo al que pertenece</label>
                    <select name="id_equipo" class="form-control" required>
                        <option selected>-</option>
                        @foreach ($equipos as $equipo) 
                            <option value="{{$equipo->id}}">{{$equipo->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

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
                                <option value="0" selected>NO</option>
                                <option value="1">SI</option>
                            </select>
                        </div> 
        
                        <div class="form-group col-md-4">
                            <label for="fecha_sancion">Fecha de sancion <small>(opcional)</small></label>
                            <input class="form-control" type="date" name="fecha_sancion">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="fecha_fin">Fin de sancion <small>(opcional)</small></label>
                            <input class="form-control" type="date" name="fecha_fin">
                        </div>
                    </div>
        
                    <div class="form-group col-md-4">
                        <label for="motivo">Motivo de sancion<small>(opcional)</small></label>
                        <br>
                        <textarea name="motivo" cols="50" rows="10" maxlength="255"></textarea>
                    </div>
                </div>
              </div>
              <br>
            <button type="submit" class="btn btn-primary">Reguistrar</button>
            <button type="reset" class="btn btn-danger">Cancelar</button>
          </form>
    </div>
@endsection