@extends('categories.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Mostrar categoria</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('categories.index') }}"> Volver</a>
            </div>
        </div>
    </div>

   

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">

                <strong>Categoria principal:</strong>
                {{ $category->categoria }}

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Categoria secundaria 1:</strong>
                {{ $category->sub_uno }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Categoria secundaria 2:</strong>
                {{ $category->sub_dos }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion:</strong>
                {{ $category->descripcion }}
            </div>
        </div>
    </div>

@endsection