@extends('products.layout')

@section('content')


<div class="row justify-content-center">
<div class="col-md-8">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('inicioemprendedor') }}"> Volver</a>
        </div>
        <div class="pull-center">
            <h2>Crear productos</h2>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">{{ __('Registrar un nuevo producto') }}</div>

    @if ($message = Session::get('failed'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="card-body">
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Emprendedor') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="user_id" value="{{ Auth::user()->id }}" placeholder="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Alias de emprendedor') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="alias_emprendedor" value="{{ Auth::user()->alias }}" placeholder="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                </div>
            </div>
            
            
            <div class="form-group row">
                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>

                <div class="col-md-6">

                    <select id='category' name='category' class='form-control'>";
                        <option selected>Selecciona una categoria</option>                        
                        @foreach ($categories as $category)                            
                            <option>{{ $category->id }} {{ $category->categoria }} {{ $category->sub_uno }} {{ $category->sub_dos }}</option>
                        @endforeach
                    </select>
                    
                </div>
            </div>            

            <div class="form-group row">
                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre del producto') }}</label>

                <div class="col-md-6">
                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label for="precio" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>

                <div class="col-md-6">
                    <input id="precio" type="text" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{ old('precio') }}" required autocomplete="precio" autofocus>

                    @error('precio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="detalle" class="col-md-4 col-form-label text-md-right">{{ __('Detalle') }}</label>

                <div class="col-md-6">
                    <input id="detalle" type="text" class="form-control @error('detalle') is-invalid @enderror" name="detalle" required autocomplete="new-password">

                    @error('detalle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                <div class="form-check form-check-inline col-md-6">
                    <input type="radio" class="form-check-input" id="materialInline1" name="estado" value="1">
                    <label class="form-check-label" for="materialInline1">Producto disponible</label>
             

                    <input type="radio" class="form-check-input" id="materialInline2" name="estado" value="0">
                    <label class="form-check-label" for="materialInline2">Producto Agotado</label>
                </div>
            </div>            
            <div class="form-group row">
                <label for="existencia" class="col-md-4 col-form-label text-md-right">{{ __('Existencia') }}</label>

                <div class="col-md-6">
                    <input id="existencia" type="text" class="form-control @error('existencia') is-invalid @enderror" name="existencia" value="{{ old('existencia') }}" required autocomplete="existencia" autofocus>

                    @error('existencia')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>            

            <div class="form-group row">
                <label for="product_image" class="col-md-4 col-form-label text-md-right">{{ __('Imagen de perfil') }}</label>

                <div class="col-md-6">
                    <input id="product_image" type="file" class="form-control @error('product_image') is-invalid @enderror" name="product_image" value="{{ old('product_image') }}" required autocomplete="product_image" autofocus multiple>
                    @error('product_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Guardar producto') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>

@endsection