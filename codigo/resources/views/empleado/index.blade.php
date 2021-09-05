<!doctype html>
<html lang="en">
  <head>
    <title>Lista Empleados</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
    <div class="row" style="margin-top: 1em;">
      <div class="col-md-10" style="margin-left: 100px;">
        <div style="padding:10px; background-color: #001940; color:white;">
          <h3 class="text-center">Listado de Empleados</h3>
        </div>
        <div style="padding:10px; background-color: white; width: 100%;">
          <div class="text-center">
          <a href="{{ url('/empleado/create') }}" class="btn btn-primary">Nuevo</a>
          </div>
          <hr>
            <table class="table table-striped table-inverse table-responsive">
              <thead class="thead-inverse">
                <tr class="text-center">
                <th>Codigo</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Nacimiento</th>
                <th>Puesto</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              
              @foreach($empleados as $empleado)
              <tr  class="text-center" data-id="{{ $empleado -> id }}">
                <td>{{ $empleado -> codigo}}</td>
                <td>{{ $empleado -> nombres}}</td>
                <td>{{ $empleado -> apellidos}}</td>
                <td>{{ $empleado -> direccion}}</td>
                <td>{{ $empleado -> telefono}}</td>
                <td>{{ $empleado -> fecha_nacimiento}}</td>
                <td>{{ $empleado -> id_puesto}}</td>
                <td>
                  <a href="{{ url('/empleado/'. $empleado -> id .'/edit') }}" class="btn btn-warning">Editar</a>
                  <form action="{{ url('/empleado/'.$empleado -> id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" onclick="return confirm('¿Deseas eliminar el registro?')"  class="btn btn-danger" value="Borrar">
                  </form>
                </td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
          {{ $empleados->links() }}
        </div>
      </div>
    </div>       
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>