@extends('plantillamaestra')
@section('header')
<div class="logo mr-auto">
        <h1 class="text-light"><a href="{{ route('inicioemprendedor') }}"><span>MercadoFei</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>          
          <li><a href="#about">{{ Auth::user()->alias }}</a></li>          
          <!--<li><a href="#specials">Sugerencias</a></li> Apartado de sugerencias no existe-->
          <li><a href="#events">Foro Productos</a></li>
          <li><a href="#chefs">Emprendedores</a></li>
          <li><a href="{{ route('categories.index') }}">Categorias</a></li>
          <li><a href="#gallery">Mis Productos</a></li>
          <li><a href="#contact">Contacto</a></li>
          <li class="book-a-table text-center" ><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Cerrar sesión</a></li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
          </form>                                       
        </ul>
      </nav><!-- .nav-menu -->
@endsection

@section('misdatos')
<div class="row">
          <div class="col-lg-5 align-items-stretch video-box" style='background-image: url("");'>
              @php 
                $image = imagecreatefromstring(Auth::user()->user_image); 
                ob_start(); 
                imagejpeg($image, null, 80); 
                $data = ob_get_contents(); 
                ob_end_clean(); 
                echo '<img src="data:image/jpg;base64,' . base64_encode($data) . '" width="500" height="500" style= "border-radius: 50%;"/>';   
              @endphp  
            <!--<a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>-->
          </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">
          <h2><span>Mis datos</span></h2>
          <div class="card-body">
                    <form method="POST" action="{{ route('users.update', Auth::user()->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Apellido paterno') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="apellido_p" value="{{ Auth::user()->apellido_p }}" required autocomplete="name" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Apellido materno') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="apellido_m" value="{{ Auth::user()->apellido_m }}" required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="********">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Alias') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="alias" value="{{ Auth::user()->alias }}" required autocomplete="name" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Numero de telefono') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="number_tel" value="{{ Auth::user()->number_tel }}" required autocomplete="name" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Carrera') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="carrera" value="{{ Auth::user()->carrera }}" required autocomplete="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Imagen de perfil') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="file" class="form-control @error('name') is-invalid @enderror" name="user_image" value="{{ old('name') }}" required autocomplete="name" multiple>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Ubicacion') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="ubicacion" placeholder="SOLO el nombre o numero de salon" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                            <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="materialInline1" name="estado" value="1">
                                <label class="form-check-label" for="materialInline1">Activo</label>
                                </div>

                                <!-- Material inline 2 -->
                                <div class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" id="materialInline2" name="estado" value="0">
                                <label class="form-check-label" for="materialInline2">Inactivo</label>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar datos') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
              <form action="{{ route('users.destroy', Auth::user()->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Dar de Baja</button>
              </form>
            </div>
          </div>

        </div>
@endsection

@section('gallery_products')
    
        <div class="container-fluid">

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Crear nuevo producto</a>
            </div>

            <div class="section-title">
            <h2> Tus <span> Productos</span></h2>
            <p>Gestiona todos tus productos en este apartado</p>
            </div>

            <div class="row no-gutters">

            <div class='card-deck'>
            
            @if(!empty($products))
            @foreach ($products as $product)
                @if(auth()->user()->alias == $product->alias_emprendedor)
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
                            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>                
                @endif              
            @endforeach
            @endif
                                
            </div>                   
            </div>
        </div>


@endsection

@section('gallery_users')
<div class="container">

        <div class="section-title">
          <h2>Tus Compañeros <span> Emprendedores</span></h2>
          <p>Conoce un poco de ellos y algunos medios de contacto.</p>
        </div>

        <div class="row">
        @foreach ($users as $user)
            @if($user->is_admin == 0)
                <div class="col-lg-4 col-md-6">
                    <div class='member'>
                        <div class='pic'>
                            @php 
                            $image = imagecreatefromstring($user->user_image); 
                            ob_start(); 
                            imagejpeg($image, null, 80); 
                            $data = ob_get_contents(); 
                            ob_end_clean(); 
                            echo '<img src="data:image/jpg;base64,' . base64_encode($data) . '" width="310" height="300" style="border-radius: 15%;" />';   
                            @endphp 
                        </div>      
                        <div class='member-info'>
                            <h4>{{ $user->name }} </h4>
                            <h6 class='card-subtitle mb-2 text-muted'> {{ $user->number_tel }}</h6>
                            <p class='card-text'> {{ $user->email }} </p>
                        </div>      
                    </div>
                </div>
            @endif
        @endforeach
        


        </div>

      </div>
@endsection

@section('events')

      <div class="container">

      <div class="pull-right">
            <a class="btn btn-outline-warning" href="{{ route('proposals.index') }}"> Entra al foro</a>
        </div>

        <div class="section-title">
          <h2>Bienvenido al <span>apartado </span> "FORO"</h2>
        </div>               

        <div class="owl-carousel events-carousel">

          <div class="row event-item">
            <div class="col-lg-6">
              <img src="assets/img/electronicos.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3>Entra y conoce posibles nuevos productos</h3>
              <div class="price">
                <p><span>Tenemos varias categorias</span></p>
              </div>
              <p class="font-italic">
                El proposito del foro es brindar un espacio para que mediante el apoyo de todos podamos tener una variedad más enriquecida de productos
              </p>
              <ul>
                <li><i class="icofont-check-circled"></i> Comparte tu idea de un producto.</li>
                <li><i class="icofont-check-circled"></i> Da tu voto para los productos propuestos.</li>
                <li><i class="icofont-check-circled"></i> Visualiza como van las votaciones.</li>
              </ul>
              <p>
                No olvides que tienes la libertad de proponer cualquier producto, considera que confiamos en tu buen criterio.
              </p>
            </div>
          </div>
       
          <div class="row event-item">
            <div class="col-lg-6">
              <img src="assets/img/about.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3>Productos actuales</h3>
              <div class="price">
                @if(empty($products))
                <p><span>Contamos con un total de count($products)</span></p>
                
              </div>
              <p class="font-italic">
                Los productos que ofrecen los emprendedores son de muy buena calidad, garantizan satisfacción a cada uno de sus compradores.
              </p>
              <p class="font-italic">
                Conoce algunos de nuestros productos
              </p>
              <ul>              
              
                for($i = 0; $i < 5; $i++){
                  $cant = count($products) - 1;
                  $rand = rand(0, $cant);
                  echo "<li><i class='icofont-check-circled'></i>". $i.".-". $products[$rand]->nombre .".</li>";
                }
              @endif
              </ul>     
            </div>
          </div>
        </div>

    </div>

@endsection




