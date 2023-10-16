<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fundación Interculktural Nor Sud</title>
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <style>
        .header {
            background: url('{{asset('images/slider-bg5.png')}}') no-repeat center;
            background-size: cover;
            min-height: 100vh;
        }
    </style>
</head>
<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-light  opacity-5">
          <img src="{{asset('images/logons.png')}}" >
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{route('login')}}">Administrador </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('comunario.index.busqueda')}}">Carpas</a>
              </li>
              
              
            </ul>
            
          </div>
        </nav>
      </header>
   
    
    
</body>
</html>