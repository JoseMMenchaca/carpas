@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Carpas</h1>
@stop

@section('content')
    <form action="{{route('carpas.store')}}" method="post">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="codigo"  placeholder="C-0001">
            <label for="codigo">Codigo</label>
          </div>
          <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Leave a comment here" name="descripcion" style="height: 100px"></textarea>
            <label for="descripcion">Descripción</label>
          </div>
          
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="lugar" placeholder="C-0001">
            <label for="lugar">Lugar</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="dimension" placeholder="C-0001">
            <label for="dimension">Dimensión</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="tipo_techo" placeholder="C-0001">
            <label for="tipo_techo">Tipo de Techo</label>
          </div>

          <div class="col-12">
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop