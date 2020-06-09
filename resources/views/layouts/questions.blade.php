

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Ask.com</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!-- Fontawsome --> 
<script src="https://kit.fontawesome.com/e2b5f74269.js" crossorigin="anonymous"></script>

@livewireStyles



</head>

<!--Main Navigation-->
<header>



<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand navbar-primary bg-primary scrolling-navbar">
<div class="container">

<!-- Brand -->
<a class="navbar-brand waves-effect" href="{{'home'}}">
<strong style="color:white">Ask.com</strong>
</a>

<!-- Collapse -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<!-- Links -->
<div class="collapse navbar-collapse" id="navbarSupportedContent">

<!-- Left -->
<ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link waves-effect" style="color:white" href="{{route('questions.create')}}">Ask A Question
            
        </a>
    </li>
    <li class="nav-item active" >
        <a class="nav-link waves-effect" href="{{route('questions.index')}}" style="color:white">Show Questions
            
        </a>
    </li>
    </ul>



<!-- Right Side Of Navbar -->

    <!-- Authentication Links -->
    @guest
        <li class="nav-item">
            <a class="nav-link" style="color:white" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" style="color:white" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else



    <div class="dropdown">
    <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @if(Auth::user()->avatar)
                    <img src="{{ asset('storage/images/'. Auth::user()->avatar) }}" alt="image" style="width:30px; height:30px;">
                @else
                  <img src="{{ asset('storage/images/default.png') }}" alt="image" style="width:30px; height:30px;">
                @endif    
            </a>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
    <a class="dropdown-item" href="{{route('users.show' , auth()->user()->id)}}">Your Profile</a>
    
  </div>
</div>





    @endguest

</div>
</div>


</div>

</div>
</nav>
<!-- Navbar -->

</header>
<!--Main Navigation-->

<!--Main layout-->
<main class="mt-5 pt-5">
<div class="container">

<!--Section: Post-->
<section class="mt-4">



<!--Grid row-->



@yield('body')


<footer class="page-footer text-center font-small mdb-color darken-2 mt-4 wow fadeIn">




<hr class="my-4">

<!-- Social icons -->
<div class="pb-4">
<a href="https://www.facebook.com/mdbootstrap" target="_blank">
<i class="fab fa-facebook-f mr-3"></i>
</a>

<a href="https://twitter.com/MDBootstrap" target="_blank">
<i class="fab fa-twitter mr-3"></i>
</a>

<a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
<i class="fab fa-youtube mr-3"></i>
</a>

<a href="https://plus.google.com/u/0/b/107863090883699620484" target="_blank">
<i class="fab fa-google-plus-g mr-3"></i>
</a>

<a href="https://dribbble.com/mdbootstrap" target="_blank">
<i class="fab fa-dribbble mr-3"></i>
</a>

<a href="https://pinterest.com/mdbootstrap" target="_blank">
<i class="fab fa-pinterest mr-3"></i>
</a>

<a href="https://github.com/mdbootstrap/bootstrap-material-design" target="_blank">
<i class="fab fa-github mr-3"></i>
</a>

<a href="http://codepen.io/mdbootstrap/" target="_blank">
<i class="fab fa-codepen mr-3"></i>
</a>
</div>
<!-- Social icons -->

<!--Copyright-->
<div class="footer-copyright py-3">
© 2018 Copyright:
<a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> MDBootstrap.com </a>
</div>
<!--/.Copyright-->

</footer>
<!--/.Footer-->