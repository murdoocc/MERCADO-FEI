@extends('proposals.layout')
 
@section('content')
    
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="col-xs-12 col-sm-12 col-md-12 text-center">Bienvenido al FORO</h2>
            </div>
            <div class="pull-right">
                <a href="#victorModal" role="button"  class="btn btn-large btn-warning col-xs-12 col-sm-12 col-md-12" data-toggle="modal">Crear una propuesta</a>                  
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
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($proposals as $proposal)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $proposal->name }}</td>
            <td>{{ $proposal->detail }}</td>
            <td>
                <form action="{{ route('proposals.destroy',$proposal->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('proposals.show',$proposal->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('proposals.edit',$proposal->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table

    
    
    <!--INICIO DE POP-UP-->    
    <!-- Modal / Ventana / Overlay en HTML -->
    <div id="victorModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">                    
                    <h4 class="modal-title ">Llena el registro de tu propuesta</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('proposals.store') }}" method="POST">
                    @csrf
                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Emprendedor:</strong>
                                <input type="text" name="alias_emprendedor" class="form-control" placeholder="Digita tu alias de emprendedor">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nombre del producto:</strong>
                                <input type="text" name="nombre_propuesta" class="form-control" placeholder="Digita el nombre de tu propuesta">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Detalle:</strong>
                                <input type="text" name="detalle" class="form-control" placeholder="Describe un poco la propuesta">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Categoria:</strong>
                                <input type="text" name="categoria" class="form-control" placeholder="categoria">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Enviar registro</button>
                        </div>
                    </div>
                
                    </form>
                    <p class="text-danger col-xs-12 col-sm-12 col-md-12 text-center"><small>Recuerda que como propietario de la propuesta no debes de votar.</small></p>
                </div>
                <div class="modal-footer">                    
                </div>
            </div>
        </div>
        

    </div>
    <!--FIN DE POP-UP-->
@endsection
