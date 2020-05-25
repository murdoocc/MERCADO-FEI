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
                echo '<img src="data:image/jpg;base64,' . base64_encode($data) . '" width="500" height="400"/>';   
              @endphp  
            <!--<a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>-->
          </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">

            <div class="content">
              <h3><strong>{{ Auth::user()->name }}</strong></h3>
              <p>
                Alias: {{ Auth::user()->alias }}
              </p>
              <p>
                Matricula: {{ Auth::user()->matricula }}
              </p>
              <p>
                E-mail: {{ Auth::user()->email }}
              </p>
              <p class="font-italic">
                Tel: {{ Auth::user()->numero_tel }}
              </p>
              <p>
                Carrera: {{ Auth::user()->carrera }}
              </p>
              <p>
                Ubicación: {{ Auth::user()->ubicacion }}
              </p>
              <form action="{{ route('users.destroy', Auth::user()->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Borrar</button>
            </form>

            </div>
          </div>

        </div>
@endsection
