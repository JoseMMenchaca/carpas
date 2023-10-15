<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ONG - </title>
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/select2/select2.min.css')}}">
    <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
</head>
<body>
    <div class="container">
        <div class="card mt-3">
            <nav class="navbar navbar-light navbar-expand" style="background-color: #e3f2fd;">
                <!-- Navbar content -->
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Menú</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                      <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="{{route('siembra.form',[base64_encode($comunario->ci)])}}">Siembra</a>
                        <a class="nav-link" href="{{ route('cosecha.index',[base64_encode($comunario->ci)]) }}">Cosecha</a>
                        <a class="nav-link" href="{{ route('usos.index',[base64_encode($comunario->ci)]) }}">Usos</a>
                       
                      </div>
                    </div>
                  </div>
            </nav>
            <div class="card-header">
                <h4>@yield('title')</h4>
                <div class="content">
                    <p><b>Nombre:</b> {{$comunario->nombre}}</p>
                    <p><b>C.I.:</b> {{$comunario->ci}}</p>
                </div>
            </div>
            <div class="card-body">
                @yield('content')

            </div>
        </div>
    </div>
</body>
</html>