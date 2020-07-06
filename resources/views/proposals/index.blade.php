@extends('proposals.layout')
 
@section('content')
    
    
    <!--////////////////////////////////////////PANTALLA DE EMPRENDEDOR/////////////////////////////////////////////-->
        @if(Auth::user() != null)
            <div class='row'  style='margin-bottom:2%'>
                 <div class='col-lg-8 margin-tb'>                
                    <div class='pull-left'>
                        <h2 class='col-xs-12 col-sm-12 col-md-12 text-center'>Bienvenido al FORO</h2>
                    </div>
                    <div class='pull-right'>                        
                        <a href='#victorModal' role='button'  class='btn btn-large btn-warning col-xs-12 col-sm-12 col-md-4 text-center' data-toggle='modal'>Crear una propuesta</a>
                    </div>
                </div>
                 <div class='col-lg-4 margin-tb'>                
                    <div class='pull-right'>
                        <a href=" {{ route('inicioemprendedor') }}" class='btn btn-success col-xs-12 col-sm-12 col-md-8 text-center'>Volver</a>
                    </div>
                </div>
            </div>
        
            @if($message = Session::get('success'))
                <div class='alert alert-success'>
                    <p> {{ $message }}</p>
                </div>
            @endif
        
            <table class='table table-bordered'>
                <tr>
                    <th>No</th>
                    <th>Nombre del producto</th>
                    <th>Detalle</th>
                    <th width='280px'>Acción</th>
                </tr>
                @foreach($proposals as $proposal)                
                    @if(auth()->user()->alias == $proposal->alias_emprendedor)
                        <tr>
                                <td> {{ $i++ }} </td>
                                <td> {{ $proposal->nombre_propuesta }}</td>
                                <td> {{ $proposal->detalle }} </td>
                        <td>
                            <form action="{{ route('empre.deletepropose') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type='hidden' name='idp' value={{ $proposal->id }}>
                                    <!--<a class='btn btn-info' href='{{ route('proposals.show',$proposal->id) }}'>Show</a>
                    
                                    //<a class='btn btn-primary' href='{{ route('proposals.edit',$proposal->id) }}'>Edit</a>-->
                
                    
                                <button type='submit' class='btn btn-danger'>Eliminar propuesta</button>
                            </form>
                        </td>
                        </tr>
                    @endif
                @endforeach
            </table>
<!--////////////////////////////////////////PANTALLA DE COMPRADOR/////////////////////////////////////////////-->
        @else
                <div class='row'>
                     <div class='col-lg-12 margin-tb'>
                        <div class='pull-left'>
                            <h2 class='col-xs-12 col-sm-12 col-md-12 text-center'>Bienvenido al FORO</h2>
                        </div>
                         <div class='col-lg-4 margin-tb'>                
                        <div class='pull-right'>
                            <a href=" {{ route('welcome') }} " class='btn btn-success col-xs-12 col-sm-12 col-md-8 text-center'>Volver</a>
                        </div>
                    </div>
                    </div>                      
                    
                        
                </div>
            
                @if($message = Session::get('success'))
                    <div class='alert alert-success'>
                        <p> {{ $message }} </p>
                    </div>
                @endif
            
                <table class='table table-bordered'>
                    <tr>
                        <th>No</th>
                        <th>Nombre del producto</th>
                        <th>Detalle</th>
                        <th width='280px'>Elige tu propuesta</th>
                    </tr>
                    @foreach($proposals as $proposal)
                    <tr>
                        <td> {{ $i++ }}</td>
                        <td> {{ $proposal->nombre_propuesta }} </td>
                        <td> {{ $proposal->detalle }} </td>
                    <td>
                            <form action= " {{ route('proposals.edit',$proposal->id) }} " method='PATCH'>
                            @php
                                $unVoto = $proposal->votos;
                                $unVoto += 1;
                            @endphp
                            <input id='votos' type='hidden' name='votos' value=" . $unVoto . "autofocus> 
                
                            <button type='submit' class='btn btn-warning'>Votar</button>
                        </form>
                    </td>
                </tr>
                    @endforeach
            </table>
        @endif
    
    
    
    <!--INICIO DE POP-UP-->    
    <!-- Modal / Ventana / Overlay en HTML -->
    <div id='victorModal' class='modal fade'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>                    
                    <h4 class='modal-title '>Llena el registro de tu propuesta</h4>
                    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                </div>
                <div class='modal-body'>
                    <form action="{{ route('proposals.store') }}" method='POST'>
                    @csrf
                
                    <div class='row'>
                        <div class='col-xs-12 col-sm-12 col-md-12'>
                            <div class='form-group'>
                                <strong>Emprendedor:</strong>
                                @if(Auth::user() != null)
                                    <input type='text' name='alias_emprendedor' value='{{ Auth::user()->alias }}' class='form-control' placeholder='Digita tu alias de emprendedor' >
                                @else
                                <input type='text' name='alias_emprendedor' class='form-control' placeholder='Digita tu alias de emprendedor'>
                                @endif
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-12 col-md-12'>
                            <div class='form-group'>
                                <strong>Nombre del producto:</strong>
                                <input type='text' name='nombre_propuesta' class='form-control' placeholder='Digita el nombre de tu propuesta' required>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-12 col-md-12'>
                            <div class='form-group'>
                                <strong>Detalle:</strong>
                                <input type='text' name='detalle' class='form-control' placeholder='Describe un poco la propuesta' required>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-12 col-md-12'>
                            <div class='form-group'>
                                <strong>Categoria:</strong>                            
                                <select id='category' name='categoria' class='form-control'>';
                                    <option selected>Selecciona una categoria</option>                        
                                    @foreach ($categories as $category)                            
                                        <option>{{ $category->id }} {{ $category->categoria }} {{ $category->sub_uno }} {{ $category->sub_dos }}</option>
                                    @endforeach
                                </select>                            
                            
                            </div>
                        </div>                        
                        
                    </div>  
                        <div class='col-xs-12 col-sm-12 col-md-12 text-center'>
                                <button type='submit' class='btn btn-primary'>Enviar registro</button>
                        </div>
                    </div>
                
                    </form>
                    <p class='text-danger col-xs-12 col-sm-12 col-md-12 text-center'><small>Recuerda que como propietario de la propuesta no debes de votar.</small></p>
                </div>
                <div class='modal-footer'>                    
                </div>
            </div>
        </div>
        

    </div>
    <!--FIN DE POP-UP-->

    <canvas id="chart1" style="width:100%;" style="height:100%;" class="container"></canvas>

    <script>
        var ctx = document.getElementById("chart1");
        var data = {
                labels: [ 
                <?php foreach($proposals as $proposal):?>
                "<?php echo $proposal->nombre_propuesta?>", 
                <?php endforeach; ?>
                ],
                datasets: [{
                    label: 'Votos',
                    data: [
                <?php foreach($proposals as $proposal):?>
                <?php echo $proposal->votos;?>, 
                <?php endforeach; ?>
                    ],
                    backgroundColor: "#D4D126",
                    borderColor: "#27344F",
                    borderWidth: 3
                }]
            };
        var options = {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            };
        var chart1 = new Chart(ctx, {
            type: 'bar', /* valores: line, bar*/
            data: data,
            options: options
        });
    </script>

@endsection
