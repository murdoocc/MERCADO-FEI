@extends('plantillamaestra')
@section('seccion')
<div class="logo mr-auto">
        <h1 class="text-light"><a href="index.html"><span>MercadoFei</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="#about">Mis datos</a></li>
          <li><a href="#menu">Mis Categorias</a></li>
          <li><a href="#specials">Sugerencias</a></li>
          <li><a href="#events">Foro Productos</a></li>
          <li><a href="#chefs">Emprendedores</a></li>
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