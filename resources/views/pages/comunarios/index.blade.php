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
              <th scope="col">C.I.</th>
              <th scope="col">Nombre</th>
              <th scope="col">Lugar</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($comunarios as $i=>$comunario)
            <tr>
                <td> {{$i+1}}</td>
                <td>{{$comunario->ci}}</td>
                <td>{{$comunario->nombre}}</td>
                <td>{{$comunario->lugar}}</td>
                <td> <button class="btn btn-success"> Asignar Carpa </button> </td>
                
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