@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Lista de equipos registrados
      <a href="equipos/create">
        <button type="button" class="btn btn-success float-right">Agregar equipo</button>
      </a>
  </h2>
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
          <th scope="col">Liga</th>
          <th scope="col">Rama</th>
          <th scope="col">Categoria</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($equipos as $equipo)
          <tr>
              <td>{{$equipo->nombre}}</td>
              <td>{{$equipo->id_liga}}</td>
              <td>{{$equipo->id_rama}}</td>
              <td>{{$equipo->id_categoria}}</td>
              <td> 
                  <form action="{{route('equipos.destroy', $equipo->id)}}" method="POST">
                      <a href="{{route('equipos.show', $equipo->id)}}">
                          <button type="button" class="btn btn-secondary btn-sm">Ver</button>
                      </a>
                      <a href="{{route('equipos.edit', $equipo->id)}}">
                          <button type="button" class="btn btn-primary btn-sm">Editar</button>
                      </a>
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                  </form>
              </td>
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