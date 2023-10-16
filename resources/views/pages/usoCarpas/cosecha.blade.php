@extends('pages.usoCarpas.layout.app')

@section('title','Cosecha')
@section('content')
<table class="table table-hover">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Hortaliza</th>
          <th scope="col">Variedad</th>
          <th scope="col">Fecha de Siembra</th>
          <th scope="col">Dimensión</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($siembra as $i=>$item)
        <tr>
            <td> {{$i+1}}</td>
            <td>{{$item->variedad->hortaliza->nombre}}</td>
            <td>{{$item->variedad->variedad}}</td>
            <td>{{$item->fecha_siembra}}</td>
            <td>{{$item->dimension}}</td>
            <td> <button type="button" class="btn btn-primary cosecha" data-bs-id='{{$item->id}}' data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Cosecha
              </button> </td>
            
        </tr>
        @endforeach
      </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Cosecha</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('cosecha.create',[base64_encode($comunario->ci)])}}" method="POST">
          @csrf
        <div class="modal-body">

          <input type="hidden" name="id" id="siembra_id" value=''>
          <div class="mb3 row" id='datos_siembra'>
            
          </div>
          <div class="mb-3 row">
            <label for="fecha" class="col-sm-4 col-form-label">Fecha de Cosecha:</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" id="fecha" name="fecha" value="{{date('Y-m-d')}}">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="peso" class="col-sm-4 col-form-label">Peso Cosecha:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="peso" name="peso">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="unidad" class="col-sm-4 col-form-label">Unidad de medida:</label>
            <div class="col-sm-8">
              <select name="unidad" id="unidad" class="form-control">
                <option value="Kg">Kilogramo</option>
                <option value="@">Arroba</option>
                <option value="Cuartilla">Cuartilla</option>
                <option value="Amarro">Amarro</option>
                <option value="Mano">Mano</option>
                <option value="Manojo">Manojo</option>
                <option value="Monton">Montón</option>
              </select>
            </div>
          </div>

          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/poppers.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap5.min.js')}}"></script>

  <script>
    $('.cosecha').click(function(){
      variedad=$(this).parents("tr").find("td").eq(2).html();
      hortaliza=$(this).parents("tr").find("td").eq(1).html();
      id=$(this).data('bs-id');
      $('#siembra_id').val(id);
      $('#datos_siembra').html('<p><b class="col-4">Hortaliza:</b>'+hortaliza+'</p><p><b class="col-4">Variedad:</b>'+variedad+'</p>');
    });
  </script>

@endsection