<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Arbitros</title>
</head>
<body>
    <h2>Lista de arbitros registrados</h2>
      <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Disponible</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($arbitros as $arbitro)
              <tr>
                  <td>{{$arbitro->arbitro}}</td>
                  @if ($arbitro->disponible == 1)
                      <td>Sí</td>
                  @else
                      <td>No</td>
                  @endif
              </tr>
            @endforeach
          </tbody>
        </table>
</body>
</html>