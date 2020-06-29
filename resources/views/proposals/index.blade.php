@extends('proposals.layout')
 
@section('content')
    
    @php
    ////////////////////////////////////////PANTALLA DE EMPRENDEDOR/////////////////////////////////////////////
        if(Auth::user() != null){
            echo "<div class='row'>";
                echo " <div class='col-lg-12 margin-tb'>";
                    echo "<div class='pull-left'>";
                        echo "<h2 class='col-xs-12 col-sm-12 col-md-12 text-center'>Bienvenido al FORO</h2>";
                            echo "</div>";
                    echo "<div class='pull-right'>";
                        echo "<a href='#victorModal' role='button'  class='btn btn-large btn-warning col-xs-12 col-sm-12 col-md-12' data-toggle='modal'>Crear una propuesta</a>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        
            if($message = Session::get('success')){
                echo "<div class='alert alert-success'>";
                    echo "<p> $message </p>";
                echo "</div>";
            }
        
            echo "<table class='table table-bordered'>";
                echo "<tr>";
                    echo "<th>No</th>";
                    echo "<th>Nombre del producto</th>";
                    echo "<th>Detalle</th>";
                    echo "<th width='280px'>Acción</th>";
                echo "</tr>";
                foreach($proposals as $proposal){                    
                    if(auth()->user()->alias == $proposal->alias_emprendedor){
                        echo "<tr>";
                                echo "<td>" . $i++ . "</td>";
                                echo "<td> $proposal->nombre_propuesta </td>";
                                echo "<td> $proposal->detalle </td>";
                        echo "<td>";
                                echo "<form action=". route('proposals.destroy',$proposal->id) . "method='POST'>";
                
                                    //<!--<a class='btn btn-info' href='{{ route('proposals.show',$proposal->id) }}'>Show</a>
                    
                                    //<a class='btn btn-primary' href='{{ route('proposals.edit',$proposal->id) }}'>Edit</a>-->
                
                                    //csrf
                                    //method('DELETE');
                    
                                echo "<button type='submit' class='btn btn-danger'>Eliminar propuesta</button>";
                            echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                }
            echo "</table>";
////////////////////////////////////////PANTALLA DE COMPRADOR/////////////////////////////////////////////
        }else{
                echo "<div class='row'>";
                    echo " <div class='col-lg-12 margin-tb'>";
                        echo "<div class='pull-left'>";
                            echo "<h2 class='col-xs-12 col-sm-12 col-md-12 text-center'>Bienvenido al FORO</h2>";
                                echo "</div>";
                        echo "<div class='pull-right'>";                            
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            
                if($message = Session::get('success')){
                    echo "<div class='alert alert-success'>";
                        echo "<p> $message </p>";
                    echo "</div>";
                }
            
                echo "<table class='table table-bordered'>";
                    echo "<tr>";
                        echo "<th>No</th>";
                        echo "<th>Nombre del producto</th>";
                        echo "<th>Detalle</th>";
                        echo "<th width='280px'>Elige tu propuesta</th>";
                    echo "</tr>";
                    foreach($proposals as $proposal){
                    echo "<tr>";
                        echo "<td>" . $i++ . "</td>";
                        echo "<td> $proposal->nombre_propuesta </td>";
                        echo "<td> $proposal->detalle </td>";
                    echo "<td>";
                            echo "<form action=" . route('proposals.edit',$proposal->id) . " method='PATCH'>";
                            $unVoto = $proposal->votos;
                            $unVoto += 1;
                            echo "<input id='votos' type='hidden' name='votos' value=" . $unVoto . "autofocus>"; 
                
                            echo "<button type='submit' class='btn btn-warning'>Votar</button>";
                        echo "</form>";
                    echo "</td>";
                echo "</tr>";
                    }
            echo "</table>";
        }
    @endphp
    
    
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
                                    <input type='text' name='alias_emprendedor' value='{{ Auth::user()->alias }}' class='form-control' placeholder='Digita tu alias de emprendedor'>
                                @else
                                <input type='text' name='alias_emprendedor' class='form-control' placeholder='Digita tu alias de emprendedor'>
                                @endif
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-12 col-md-12'>
                            <div class='form-group'>
                                <strong>Nombre del producto:</strong>
                                <input type='text' name='nombre_propuesta' class='form-control' placeholder='Digita el nombre de tu propuesta'>
                            </div>
                        </div>
                        <div class='col-xs-12 col-sm-12 col-md-12'>
                            <div class='form-group'>
                                <strong>Detalle:</strong>
                                <input type='text' name='detalle' class='form-control' placeholder='Describe un poco la propuesta'>
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
