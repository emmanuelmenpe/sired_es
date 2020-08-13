<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Anotaciones</title>
</head>
<body>
    <h1>Tabla de Goleo</h1>
    <table class="table table-striped" id="t2">
        <thead>
        <tr>  
            <th scope="col">Equipo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Goles totales</th>
            <th scope="col">Goles penales</th>
            <th scope="col">Goles asistencia</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($jugadores as $jugador)
                @foreach ($equipos as $equipo)
                    @if ($equipo->id == $jugador->id_equipo)
                        <tr>
                            <td>{{$equipo->nombre}}</td>
                            <td>{{$jugador->nombre}}</td>
                            <td>{{$jugador->goles}}</td>
                            <td>{{$jugador->goles_penal}}</td>
                            <td>{{$jugador->goles_asistencia}}</td>
                        </tr>
                        @break
                    @endif
                @endforeach
            @endforeach 
        </tbody>
    </table>
</body>
</html>