@extends('plantillamaestra')

@section('header')
<div class="logo mr-auto">
        <h1 class="text-light"><a href="index.html"><span>MercadoFei</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="#about">Acerca de nosotros</a></li>          
          <li><a href="#events">Foro Productos</a></li>
          <li><a href="#chefs">Emprendedores</a></li>
          <li><a href="{{ route('categories.index') }}">Categorias</a></li>
          <li><a href="#gallery">Productos</a></li>
          <li><a href="#contact">Contacto</a></li> 
          <li class="book-a-table text-center"><a href="login">Iniciar sesión</a></li>                        
        </ul>
      </nav><!-- .nav-menu -->
@endsection

@section('gallery_products')
    
        <div class="container-fluid">

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>

            <div class="section-title">
            <h2> Productos <span> Disponibles</span></h2>
            <p>Gestiona todos tus productos en este apartado</p>
            </div>

            <div class="row no-gutters">

            <div class='card-deck'>
            
            
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-2">
                    <div class='card'>
                        <div class='gallery-item'>
                            @php 
                            $image = imagecreatefromstring($product->product_image); 
                            ob_start(); 
                            imagejpeg($image, null, 80); 
                            $data = ob_get_contents(); 
                            ob_end_clean(); 
                            echo '<img src="data:image/jpg;base64,' . base64_encode($data) . '" width="380" height="300" style="border-radius: 10%;" />';   
                            @endphp 
                        </div>      
                        <div class='card-body'>
                            <h5 class='card-title'>{{ $product->nombre }} </h5>
                            <h6 class='card-subtitle mb-2 text-muted'> {{ $product->precio }}</h6>
                            <p class='card-text'> {{ $product->detalle }} </p>
                        </div>      
                        <div class='card-footer'>
                            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>                
            @endforeach
                                
            </div>                   
            </div>
        </div>


@endsection

@section('gallery_users')
<div class="container">

        <div class="section-title">
          <h2>Nuestros emprendedores<span>Profesionales</span></h2>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row">
          @foreach ($users as $user)
          <div class="col-lg-4 col-md-2">
                    <div class='card'>
                        <div class='gallery-item'>
                            @php 
                            $image = imagecreatefromstring($user->user_image); 
                            ob_start(); 
                            imagejpeg($image, null, 80); 
                            $data = ob_get_contents(); 
                            ob_end_clean(); 
                            echo '<img src="data:image/jpg;base64,' . base64_encode($data) . '" width="350" height="400" style="border-radius: 10%;" />';   
                            @endphp 
                        </div>      
                        <div class='card-body'>
                            <h5 class='card-title'>{{ $user->name }} </h5>
                            <h6 class='card-subtitle mb-2 text-muted'> {{ $user->number_tel }}</h6>
                            <p class='card-text'> {{ $user->email }} </p>
                        </div>      
                    </div>
                </div>                
          @endforeach

        </div>

      </div>
@endsection