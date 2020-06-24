@extends('categories.layout')   

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar la categoria</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('categories.index') }}"> Volver</a>
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

    <form action="{{ route('categories.update',$category->id) }}" method="POST">
        @csrf
        @method('PUT')
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Categoria:</strong>
                    <input type="text" name="categoria" value="{{ $category->categoria }}" class="form-control" placeholder="Categoria principal">
                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sub categoria 1:</strong>
                    <input type="text" name="sub_uno" value="{{ $category->sub_uno }}" class="form-control" placeholder="Categoria secundaria 1">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sub categoria 2:</strong>
                    <input type="text" name="sub_dos" value="{{ $category->sub_dos }}" class="form-control" placeholder="Categoria secundaria 2">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descripcion:</strong>
                    <textarea name="descripcion" rows="10" cols="40" maxlength="200" class="form-control">{{ $category->descripcion }}</textarea>                    
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>

        </div>

   

    </form>

@endsection