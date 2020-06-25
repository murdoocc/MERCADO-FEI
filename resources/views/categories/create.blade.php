@extends('categories.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Añadir una nueva categoria</h2>
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

<form action="{{ route('categories.store') }}" method="POST">

@csrf
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Categoria principal:</strong>
            <input type="text" name="categoria" class="form-control" placeholder="Nombre para identificar la categoria">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Sub categoria 1:</strong>            
            <input type="text" name="sub_uno" class="form-control" placeholder="Nombre de la sub cateogria para tener un referencia más">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Sub categoria 2:</strong>            
            <input type="text" name="sub_dos" class="form-control" placeholder="Nombre para especificar aún más la categoria">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descripción:</strong>
            <textarea class="form-control" name="descripcion" rows="10" cols="40" maxlength="200" placeholder="Describe el significado de esta categoria..."></textarea>                      
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Guardar</button>
    </div>

</div>

</form>

@endsection