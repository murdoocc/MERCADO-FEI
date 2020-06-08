@extends('products.layout')

   

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Editar producto</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('inicioemprendedor') }}"> Volver</a>

            </div>

        </div>

    </div>

   

    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

  

    <form action="{{ route('products.update',$product->id) }}" method="POST">

        @csrf

        @method('PUT')

   

         <div class="row">
         
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group row">
                    <label for="precio" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>

                    <div class="col-md-6">
                        <input id="precio" type="text" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{ $product->precio }}" required autocomplete="precio" autofocus>

                        @error('precio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group row">
                    <label for="detalle" class="col-md-4 col-form-label text-md-right">{{ __('Detalle') }}</label>

                    <div class="col-md-6">
                        <input id="detalle" type="text" class="form-control @error('detalle') is-invalid @enderror" name="detalle" value="{{$product->detalle}}" required autocomplete="new-password">

                        @error('detalle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>          
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">                
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                    <div class="form-check form-check-inline col-md-6">
                        <input type="radio" class="form-check-input" id="materialInline1" name="estado" value="1">
                        <label class="form-check-label" for="materialInline1">Producto disponible</label>
                

                        <input type="radio" class="form-check-input" id="materialInline2" name="estado" value="0">
                        <label class="form-check-label" for="materialInline2">Producto Agotado</label>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">                
                <div class="form-group row">
                    <label for="existencia" class="col-md-4 col-form-label text-md-right">{{ __('Existencia') }}</label>

                    <div class="col-md-6">
                        <input id="existencia" type="text" class="form-control @error('existencia') is-invalid @enderror" name="existencia" value="{{ $product->existencia }}" required autocomplete="existencia" autofocus>

                        @error('existencia')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

              <button type="submit" class="btn btn-primary">Actualizar</button>

            </div>

        </div>

   

    </form>

@endsection