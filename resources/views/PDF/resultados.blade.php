<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Resultados</title>
</head>
<body>
    <h1>Resultados de partidos</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Local</th>
            <th scope="col">Visitante</th>
            <th scope="col">Ganador</th>
            <th scope="col">Goles local</th>
            <th scope="col">Goles visitante</th>
            <th scope="col">Fecha de partido</th>
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
                            echo "<td>".$partidoo->nombre. "</td>";
                        }
                        $i=$i+1;
                    }
                    if ($partido->id_ganador == $partido->id_local) {
                        echo "<td>local</td>";
                    } elseif ($partido->id_perdedor == $partido->id_local) {
                        echo "<td>visitante</td>";
                    } else {
                        echo "<td>empate</td>"; 
                    }
                    
                @endphp
                <td>{{$partido->goles_ganador}}</td> 
                <td>{{$partido->goles_perdedor}}</td>
                <td>{{$partido->fecha}}</td>
              </tr>  
            @endforeach
            
        </tbody>
    </table>
    
</body>
</html>