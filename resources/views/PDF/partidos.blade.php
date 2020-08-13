<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Partidos</title>
</head>
<body>
    <h1>Partidos programados </h1>
  <table class="table table-striped">
      <thead>  
        <tr> 
          <th scope="col">Local</th>
          <th scope="col">Visitante</th>
          <th scope="col">Cancha</th>
          <th scope="col">Fecha</th>
          <th scope="col">Hora</th>
          <th scope="col">Árbitro</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($partidos as $partido)
          <tr> 
              @foreach ($equipos as $equipo)
                @if ($partido->id_local == $equipo->id)
                  <td>{{$equipo->nombre}}</td>
                  @break
                @endif
              @endforeach
              
              @foreach ($equipos as $equipo)
                @if ($partido->id_visitante == $equipo->id)
                  <td>{{$equipo->nombre}}</td>
                  @break
                @endif
              @endforeach
              <td>{{$partido->cancha}}</td>
              <td>{{$partido->fecha}}</td>
              <td>{{$partido->hora}}</td>
              <td>{{$partido->arbitro}}</td>
              
          </tr>
            
        @endforeach
      </tbody>
    </table>
</body>
</html>