@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Partidos programados
      <a href="partidos/create">
        <button type="button" class="btn btn-success float-right">Crear partido</button>
      </a>
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
          <th scope="col">Local</th>
          <th scope="col">Visitante</th>
          <th scope="col">Cancha</th>
          <th scope="col">Fecha</th>
          <th scope="col">Hora</th>
          <th scope="col">Arbitro</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($partidos as $partido)
          <tr> 
              <td>{{$partido->nombre}}</td>
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
              
              <td>{{$partido->cancha}}</td>
              <td>{{$partido->fecha}}</td>
              <td>{{$partido->hora}}</td>
              <td>{{$partido->arbitro}}</td>
              <td>
                  <form action="{{route('partidos.destroy', $partido->id)}}" method="POST">
                      <a href="{{route('partidos.edit', $partido->id)}}">
                          <button type="button" class="btn btn-primary btn-sm">Actalizar</button>
                      </a>
                      <a href="{{route('resultados.edit', $partido->id)}}">
                        <button type="button" class="btn btn-secondary btn-sm">Definir resultados</button>
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
        {{ $partidos->links() }}
      </div>
    </div>
</div>
@endsection