@extends('categories.layout')



@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <a class="btn btn-primary" href="{{ route('inicioemprendedor') }}"> Volver</a>
        </div>
        <div style="margin-left:35%">
            <h2>Categorias existentes</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('categories.create') }}"> Crear nueva categoria</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Categoria</th>
        <th>Sub categoria 1</th>
        <th>Sub categoria 2</th>
        <th width="280px">Acciones</th>
    </tr>

    @foreach ($categories as $category)

    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $category->categoria }}</td>
        <td>{{ $category->sub_uno }}</td>
        <td>{{ $category->sub_dos }}</td>
        <td>
            <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">Mostrar</a>
                <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Borrar</button>
            </form>
        </td>
    </tr>

    @endforeach

</table>

{!! $categories->links() !!}    

@endsection