@extends('pages.usoCarpas.layout.app')

@section('title','Uso')
@section('content')
<table class="table table-hover">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Hortaliza</th>
          <th scope="col">Variedad</th>
          <th scope="col">Fecha de Siembra</th>
          <th scope="col">Dimensión</th>
          <th scope="col">Fecha de cosecha</th>
          <th scope="col">Peso Cosecha</th>
          <th scope="col">Unidad</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($siembra as $i=>$item)
        @if ($item->cosecha->estado=='P')
        <tr>
            <td> {{$i+1}}</td>
            <td>{{$item->variedad->hortaliza->nombre}}</td>
            <td>{{$item->variedad->variedad}}</td>
            <td>{{$item->fecha_siembra}}</td>
            <td>{{$item->dimension}}</td>
            <td>{{$item->cosecha->fecha_cosecha}}</td>
            <td>{{$item->cosecha->peso_cosecha}}</td>
            <td>{{$item->cosecha->unidad_medida}}</td>
            <td> <button type="button" class="btn btn-primary cosecha" data-bs-id='{{$item->cosecha->id}}' data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Usos
              </button> </td>
            
        </tr>
        @endif
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
        <form action="{{route('usos.create',[base64_encode($comunario->ci)])}}" method="POST">
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
            <label for="peso" class="col-sm-4 col-form-label">Peso vendido:</label>
            <div class="col-sm-8">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="peso" name="peso">
                    <span class="input-group-text">Precio</span>
                    <input type="text" class="form-control" id="vendido_precio" name="vendido_precio" readonly>
                    <span class="input-group-text">Bs.</span>      
                </div>
          </div>

          <div class="mb-3 row">
            <label for="unidad" class="col-sm-4 col-form-label">Consumo:</label>
            <div class="col-sm-8">
              <div class="input-group mb-3">
                  <input type="text" class="form-control" id="consumo" name="consumo" value="0" readonly>
                  <span class="input-group-text">Precio</span>
                  <input type="text" class="form-control" id="consumo_precio" name="consumo_precio" readonly>
                  <span class="input-group-text">Bs.</span>      
              </div>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="unidad" class="col-sm-4 col-form-label">Peso Total:</label>
            <div class="col-sm-8">
              <div class="input-group mb-3">
                  <input type="text" class="form-control" id="total" name="total" value="0" readonly>
                  <span class="input-group-text">Precio</span>
                  <input type="text" class="form-control" id="precio" name="precio">
                  <span class="input-group-text">Bs.</span>      
                </div>
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
      $('#total').val($(this).parents("tr").find("td").eq(6).html());
      id=$(this).data('bs-id');
      $('#siembra_id').val(id);
      $('#datos_siembra').html('<p><b class="col-4">Hortaliza:</b>'+hortaliza+'</p><p><b class="col-4">Variedad:</b>'+variedad+'</p>');
    });

    $('#peso').keyup(function(){
            peso=$('#peso').val();
            total=$('#total').val();
            $('#consumo').val(total-peso);
        });
    $('#precio').keyup(function(){
        total=$('#total').val();
        precio=$('#precio').val();
        peso=$('#peso').val();
        consumo=$('#consumo').val();
        $('#vendido_precio').val((precio/total)*peso);
        $('#consumo_precio').val((precio/total)*consumo);
    });
  </script>

@endsection