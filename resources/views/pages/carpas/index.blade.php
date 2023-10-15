@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Carpas</h1>
@stop

@section('content')
<div class="mb-3">
   <a href="{{route('carpas.create')}}"> <button type="button" class="btn btn-success btn-lg">Nueva Carpa</button> </a>
</div>
    <table class="table table-hover">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Código</th>
              <th scope="col">Descripción</th>
              <th scope="col">Lugar</th>
              <th scope="col">Dimensión</th>
              <th scope="col">Tipo de techo</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($carpas as $i=>$carpa)
            <tr>
                <td> {{$i+1}}</td>
                <td>{{$carpa->codigo}}</td>
                <td>{{$carpa->descripcion}}</td>
                <td>{{$carpa->lugar}}</td>
                <td>{{$carpa->dimension}}</td>
                <td>{{$carpa->tipo_techo}}</td>
            </tr>
            @endforeach
          </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{asset('vendor/datatables/js/datatables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/js/datatablesbootstrap5.min.js')}}"></script>
<script>
    $('#books').DataTable();
</script>
@stop