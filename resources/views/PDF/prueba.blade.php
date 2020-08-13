<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    {{--<link rel="stylesheet" href="{{asset('css/StylePDF.css')}}">--}}
    <title style="height: ">prueba</title>
</head>
<body>
        <h1>Tabla de posiciones
        </h1>
        <table class="table">
            <thead>
              <tr class="bg-success">
                <th scope="col"># Posición</th>
                <th scope="col">Nombre</th>
                <th scope="col">JJ</th>
                <th scope="col">JG</th>
                <th scope="col">JE</th>
                <th scope="col">JP</th>
                <th scope="col">GF</th>
                <th scope="col">GC</th>
                <th scope="col">DIF</th>
                <th scope="col">%V</th>
                <th scope="col">%E</th>
                <th scope="col">%D</th>
                <th scope="col">PTS</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($equipos as $equipo)
                <tr>
                    @php
                        $JJ = $equipo->victorias + $equipo->empates + $equipo->derrotas;
                        $DIF = $equipo->goles_favor - $equipo->goles_contra;
                    @endphp
                    <td>{{$loop->iteration}}</td>
                    <td>{{$equipo->nombre}}</td>
                    <td>{{$JJ}}</td> 
                    <td>{{$equipo->victorias}}</td>
                    <td>{{$equipo->empates}}</td>
                    <td>{{$equipo->derrotas}}</td>
                    <td>{{$equipo->goles_favor}}</td>
                    <td>{{$equipo->goles_contra}}</td>
                    <td>{{$DIF}}</td>
                    @php
                    $victorias =  $equipo->victorias;
                    $empates = $equipo->empates;
                    $derrotas = $equipo->derrotas;
                    
                    $total = $victorias + $empates + $derrotas;
                    
                    if ($total>1) {
                      $porcentaje = 100/$total;
    
                      $porcentajeVictoria = $victorias * $porcentaje;
                      $porcentajeEmpate = $empates * $porcentaje;
                      $porcentajeDerrota = $derrotas * $porcentaje;
    
                      round($porcentajeVictoria);
                      round($porcentajeEmpate);
                      round($porcentajeDerrota);
                      
                      echo "<td>".round($porcentajeVictoria, 2)."</td>";
                      echo "<td>".round($porcentajeEmpate, 2)."</td>";
                      echo "<td>".round($porcentajeDerrota, 2)."</td>";
                    } else {
                      echo "<td>$equipo->victorias</td>";
                      echo "<td>$equipo->empates</td>";
                      echo "<td>$equipo->derrotas</td>";
                    }
                @endphp
                    <td>{{$equipo->puntos}}</td>
                </tr>
      
              @endforeach
            </tbody>
        </table>
</body>
</html>