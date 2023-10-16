@extends('pages.usoCarpas.layout.app')

@section('title','Siembra')
@section('content')
    <form action="{{route('siembra.create',[base64_encode($comunario->ci)])}}" method="post">
        @csrf
        <div class="mb-3 row">
            <label for="fecha" class="col-sm-2 col-form-label">Fecha:</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="fecha" name="fecha" value="{{date('Y-m-d')}}">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="hortaliza" class="col-sm-2 col-form-label">Hortaliza:</label>
            <div class="col-sm-10">
                <select class="form-control select2" id='hortaliza' name="hortaliza">
                  <option disabled selected>--SELECCIONE UNA HORTALIZA--</option> 
                  @foreach ($hortalizas as $item)
                    <option value="{{$item->id}}"> {{$item->nombre}} </option>
                    @endforeach
                  </select>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="variedad" class="col-sm-2 col-form-label">Variedad:</label>
            <div class="col-sm-10">
                <select class="form-control select2" id='variedad' name="variedad">

                </select>
            </div>
          </div>

          <div class="mb-3 row">
            <label for="precio" class="col-sm-2 col-form-label">Precio de semilla:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="precio" name="precio" >
            </div>
          </div>

          <div class="mb-3 row">
            <label for="dimension" class="col-sm-2 col-form-label">Dimensión:</label>
            <div class="col-sm-5">

                <div class="input-group mb-3">
                  <input type="text" class="form-control" id="dimension1">
                  <span class="input-group-text">X</span>
                  <input type="text" class="form-control" id="dimension2">
                  <span class="input-group-text">=</span>
                  <input type="text" class="form-control" id="resultado" name='resultado' readonly>
                  <span class="input-group-text">m2</span>
                </div>
            </div>
          </div>
          
          <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-primary" type="submit">Guardar</button>
          </div>
    </form>
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/select2/select2.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

        $('#dimension2').keyup(function(){
            d1=$('#dimension1').val();
            d2=$('#dimension2').val();
            $('#resultado').val(d1*d2);
        });

        $('#hortaliza').change(function(){   
        var id = $("#hortaliza").val();
        
        
        $.ajax({
            type:'POST',
            url:"{{ route('hortalizas.buscar') }}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{id:id},
            success:function(data){
              
              $('#variedad').empty()
              for (let i = 0; i < data.length; i++) {
                $('#variedad').append('<option value="'+ data[i].id +'">'+ data[i].variedad +'</option>');
              }
            }
          });
        });

    </script>
@endsection