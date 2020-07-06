<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>MercadoFei</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
		function recibir(numero, nombre_propuesta, detalle)
		{
			document.f1.idp.value = numero;
			document.f1.nombre_propuesta.value = nombre_propuesta;
			document.f1.detalle.value = detalle;
		} 
</script>
<script>
		function recibir2(numero)
		{
			var valor2 = document.getElementById("idid"+numero).value;
			document.getElementById("idp2").value=valor2;
		} 
</script>

<style>
body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {        
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}    
/* Custom checkbox */
.custom-checkbox {
	position: relative;
}
.custom-checkbox input[type="checkbox"] {    
	opacity: 0;
	position: absolute;
	margin: 5px 0 0 3px;
	z-index: 9;
}
.custom-checkbox label:before{
	width: 18px;
	height: 18px;
}
.custom-checkbox label:before {
	content: '';
	margin-right: 10px;
	display: inline-block;
	vertical-align: text-top;
	background: white;
	border: 1px solid #bbb;
	border-radius: 2px;
	box-sizing: border-box;
	z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	content: '';
	position: absolute;
	left: 6px;
	top: 3px;
	width: 6px;
	height: 11px;
	border: solid #000;
	border-width: 0 3px 3px 0;
	transform: inherit;
	z-index: 3;
	transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
	border-color: #03A9F4;
	background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
	color: #b8b8b8;
	cursor: auto;
	box-shadow: none;
	background: #ddd;
}
/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
}	
</style>
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#">MercadoFei</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="{{ route('admin.home') }}">Emprendedores </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('admin.products') }}">Productos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('admin.categories') }}">Categorias</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="{{ route('admin.proposals') }}">Propuestas <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item" ><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); 
					document.getElementById('logout-form').submit();">Cerrar sesión</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form> 
				</li>
			</ul>
		</div>
</nav>	
<div class="container-fluid">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Administrar <b>Propuestas</b></h2>	
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar propuesta</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
							</span>
						</th>
						<th>Id</th>
						<th>Emprendedor</th>
						<th>Nombre propuesta</th>
						<th>Detalle</th>
						<th>Categoria</th>
						<th>Votos</th>
						<th>Funciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($proposals as $propose)
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td id="{{ $propose->id }}">{{ $propose->id }}</td>	
						<td>{{ $propose->alias_emprendedor }}</td>
						<td>{{ $propose->nombre_propuesta }}</td>
						<td>{{ $propose->detalle }}</td>
						<td>{{ $propose->categoria }}</td>
						<td>{{ $propose->votos }}</td>
						<td>
						@php
							$i = $propose->id;
							$nombre_propuesta = $propose->nombre_propuesta;
							$detalle = $propose->detalle;
						@endphp
						<form id="formulario" method="Post" data-toggle="modal" data-target="#editEmployeeModal">
      						<input type="button" class="btn btn-warning btn-block" id="button1" name="enviar" value="Editar" onclick="recibir({{$i}}, '{{$nombre_propuesta}}', '{{$detalle}}');"/>
   						</form>
						<form id="formulario" method="Post" data-toggle="modal" data-target="#deleteEmployeeModal">
      						<input type="text" id="idid{{$i}}" value="{{ $propose->id }}" hidden/>
      						<input type="button" class="btn btn-danger btn-block" id="button1" name="enviar" value="Eliminar" onclick="recibir2({{$i}});"/>
   						</form>				
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>        
</div>
<!-- ADD Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="{{ route('admin.createpropose') }}" enctype="multipart/form-data">
			@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Agregar propuesta</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Emprendedor</label>
                        <select id='alias_emprendedor' name='alias_emprendedor' class='form-control'>";
							<option selected>Selecciona a un emprendedor</option>                        
							@foreach ($users as $user)
								@if($user->is_admin==0){								
									<option>{{ $user->alias }}</option>
								@endif
							@endforeach
						</select>
						@error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="form-group">
						<label>Nombre de propuesta</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="nombre_propuesta" value="{{ old('name') }}" required autocomplete="name" autofocus>
						@error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="form-group">
						<label>Detalle</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="detalle" value="{{ old('name') }}" required autocomplete="name" autofocus>
						@error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="form-group">
						<label>Categoria</label>
						<select id='category' name='categoria' class='form-control'>";
							<option selected>Selecciona una categoria</option>                        
							@foreach ($categories as $category)                            
								<option>{{ $category->id }} {{ $category->categoria }} {{ $category->sub_uno }} {{ $category->sub_dos }}</option>
							@endforeach
						</select>
						@error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-success" value="Agregar">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" name="f1" action="{{ route('admin.updatepropose')}}" enctype="multipart/form-data">
				@csrf
                @method('POST')
				<div class="modal-header">						
					<h4 class="modal-title">Editar propuesta</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Id: <input id="idp" type="text" name="idp" style="border:0; width:15px;"></label>
					</div>			
					<div class="form-group">
						<label>Emprendedor</label>
                        <select id='alias_emprendedor' name='alias_emprendedor' class='form-control'>";
							<option selected>Selecciona a un emprendedor</option>                        
							@foreach ($users as $user)
								@if($user->is_admin==0){								
									<option>{{ $user->alias }}</option>
								@endif
							@endforeach
						</select>
						@error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="form-group">
						<label>Nombre de propuesta</label>
						<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="nombre_propuesta" required autocomplete="name">
						@error('name')
                        <span class="invalid-feedback" role="alert">
                        	<strong>{{ $message }}</strong>
                        </span>
                        @enderror
					</div>
					<div class="form-group">
						<label>Detalle</label>
						<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="detalle" required autocomplete="name">
						@error('name')
                        <span class="invalid-feedback" role="alert">
                        	<strong>{{ $message }}</strong>
                        </span>
                        @enderror
					</div>
					<div class="form-group">
						<label>Categoria</label>
						<select id='category' name='categoria' class='form-control'>";
							<option selected>Selecciona una categoria</option>                        
							@foreach ($categories as $category)                            
								<option>{{ $category->id }} {{ $category->categoria }} {{ $category->sub_uno }} {{ $category->sub_dos }}</option>
							@endforeach
						</select>
						@error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-info" value="Actualizar">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
		<form action="{{ route('admin.deletepropose')}}" method="POST">
			@csrf
            @method('DELETE')
				<div class="modal-header">						
					<h4 class="modal-title">Eliminar propuesta</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>¿Estas seguro de querer eliminar la propuesta con el id <input id="idp2" type="text" name="idp" style="border:0; width:30px;">?</p>
					<p class="text-warning"><small>Esta acción no podra ser revertida.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
