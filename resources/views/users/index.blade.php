<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Laravel</title>

      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  </head>
  <body class="antialiased">
    <div class="container py-5">
      <div class="row">
        <div class="col-sm-8 mx-auto">

          <div class="card border-0 shadow">
            <div class="card-body">

              @if($errors->any())
                <div class="alert alert-danger">
                  @foreach($errors->all() as $error)
                    - {{ $error}} <br>
                  @endforeach()
                </div>
              @endif

              <form action="{{ route('users.store') }}" method="post">
                <div class="form-row">
                <div class="col-sm-3">
                   <input type="text" name="doc" class="form-control" placeholder="Documento" value="{{ old('doc')}}">
                  </div> 
                  <div class="col-sm-4">
                   <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name')}}">
                  </div> 
                  <div class="col-sm-3">
                    <input type="text" name="status" class="form-control" placeholder="estado"  value="{{ old('status')}}">
                  </div>
                  <div class="col-sm-3">
                    <input type="text" name="car" class="form-control" placeholder="placa"  value="{{ old('car')}}">
                  </div>
                  <div class="col-sm-4">
                    <input type="text" name="email" class="form-control" placeholder="correo electronico"  value="{{ old('email')}}">
                  </div>
                  <div class="col-auto">
                    @csrf
                    <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>documento</th>
                <th>nombre</th>
                <th>estado</th>
                <th>vehiculo</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
                <tr>
                  <td>{{ $user-> id }}</td>
                  <td>{{ $user-> doc }}</td>
                  <td>{{ $user-> name }}</td>
                  <td>{{ $user-> status }}</td>
                  <td>{{ $user-> car }}</td>
                  <td>
                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                      @method('DELETE')
                      @csrf
                      <input
                        type="submit"
                        value="eliminar"
                        class="btn btn-sm btn-danger"
                        onclick="return confirm('¿Esta seguro?')">
                    </form>
                  </td>
                </tr>
              @endforeach()
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
