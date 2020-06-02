@extends('plantillamaestra')
@section('header')
<div class="logo mr-auto">
        <h1 class="text-light"><a href="index.html"><span>MercadoFei</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="">{{ Auth::user()->alias }}</a></li>
          <li><a href="#about">Mis datos</a></li>          
          <li><a href="#specials">Sugerencias</a></li>
          <li><a href="#events">Foro Productos</a></li>
          <li><a href="#chefs">Emprendedores</a></li>
          <li><a href="{{ route('categories.index') }}">Categorias</a></li>
          <li><a href="#gallery">Mis Productos</a></li>
          <!--<li><a href="#contact">Contact</a></li>-->
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

          <div class="card-body">
                    <form method="POST" action="{{ route('users.update', Auth::user()->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name"  placeholder="{{ Auth::user()->name }}">

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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="apellido_p" value="{{ old('name') }}" required autocomplete="name" placeholder="{{ Auth::user()->apellido_p }}">

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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="apellido_m" value="{{ old('name') }}" required autocomplete="name" placeholder="{{ Auth::user()->apellido_m }}">

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ Auth::user()->email }}">

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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="alias" value="{{ old('name') }}" required autocomplete="name" placeholder="{{ Auth::user()->alias }}">

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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="number_tel" value="{{ old('name') }}" required autocomplete="name" placeholder="{{ Auth::user()->number_tel }}">

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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="carrera" value="{{ old('name') }}" required autocomplete="name" placeholder="{{ Auth::user()->carrera }}">
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
                <button type="submit" class="btn btn-danger">Eliminar cuenta</button>
              </form>
            </div>
          </div>

        </div>
@endsection

@section('gallery_products')
    
        <div class="container-fluid">

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.index') }}"> Create New Product</a>
            </div>

            <div class="section-title">
            <h2>Some photos from <span>Our Restaurant</span></h2>
            <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
            </div>

            <div class="row no-gutters">

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="assets/img/gallery/gallery-1.jpg" class="venobox" data-gall="gallery-item">
                    <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
                </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="assets/img/gallery/gallery-2.jpg" class="venobox" data-gall="gallery-item">
                    <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
                </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="assets/img/gallery/gallery-3.jpg" class="venobox" data-gall="gallery-item">
                    <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
                </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="assets/img/gallery/gallery-4.jpg" class="venobox" data-gall="gallery-item">
                    <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
                </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="assets/img/gallery/gallery-5.jpg" class="venobox" data-gall="gallery-item">
                    <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
                </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="assets/img/gallery/gallery-6.jpg" class="venobox" data-gall="gallery-item">
                    <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
                </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="assets/img/gallery/gallery-7.jpg" class="venobox" data-gall="gallery-item">
                    <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
                </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="gallery-item">
                <a href="assets/img/gallery/gallery-8.jpg" class="venobox" data-gall="gallery-item">
                    <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
                </a>
                </div>
            </div>

            </div>

        </div>


@endsection