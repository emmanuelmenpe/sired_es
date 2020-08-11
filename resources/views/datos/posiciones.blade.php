@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tabla de posiciones
          <div class="float-right">
            <form class="form-inline my-2 my-lg-0">
                <select name="filtrar" class="form-control mr-sm-2">
                  <option value="" selected disabled>filtar por categoria</option>
                  @foreach ($categorias as $categoria)
                    <option name="filtrar" value="{{$categoria->categoria}}">{{$categoria->categoria}}</option>
                  @endforeach
                </select>
                
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Filtrar</button>
            </form>
          </div>
        </h2>

        <h6> 
          @if ($query)
            <div class="alert alert-primary" role="alert">
              Los resultados de filtración '{{$query}}' son: 
            </div>
          @endif
        </h6> 

        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#Posición</th>
                <th scope="col">Equipo</th>
                <th scope="col">Victorias</th>
                <th scope="col">Empates</th>
                <th scope="col">Derrotas</th>
                <th scope="col">Rama</th>
                <th scope="col">Categoría</th>
              </tr>
            </thead>
            <tbody> 
              @foreach ($equipos as $equipo)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$equipo->nombre}}</td>
                    <td>{{$equipo->victorias}}</td>
                    <td>{{$equipo->empates}}</td>
                    <td>{{$equipo->derrotas}}</td>
                    <td>{{$equipo->rama}}</td>
                    <td>{{$equipo->categoria}}</td>
                </tr>
      
              @endforeach
            </tbody>
          </table>
          <div class="row">
            <div class="mx-auto">
              {{ $equipos->links() }}   
            </div>
          </div>
    </div>
@endsection