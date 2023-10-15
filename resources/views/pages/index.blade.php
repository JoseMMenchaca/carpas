<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ONG - </title>
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">

        <div class="card mt-3">
            <div class="card-header">
                INGRESO
              </div>
            <div class="card-body">
                <form action="#" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="ci" placeholder="ci">
                        <label for="ci">Ingrese su C.I.</label>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="submit">Ingresar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>