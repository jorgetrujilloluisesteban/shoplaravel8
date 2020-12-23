<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weblibrary Esteban Luis Trujillo Jorge</title>


    <!-- CSS only -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/shoplaravel8/resources/css/mios.css">
    <!--<link rel="stylesheet" href="http://localhost/prueba3/shoplaravel8//resources/css/style.css">-->
    <link rel="stylesheet" href="http://localhost/shoplaravel8/resources/css/productos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" integrity="sha512-f8gN/IhfI+0E9Fc/LKtjVq4ywfhYAVeMGKsECzDUHcFJ5teVwvKTqizm+5a84FINhfrgdvjX8hEJbem2io1iTA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" integrity="sha512-hwwdtOTYkQwW2sedIsbuP1h0mWeJe/hFOfsvNKpRB3CkRxq8EW7QMheec1Sgd8prYxGm1OM9OZcGW7/GUud5Fw==" crossorigin="anonymous" />
    

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto+Slab:300,700' rel='stylesheet' type='text/css'>

</head>
<body>

    <div class="container-fluid">
        <div class="row cabecera">
            <div class="col-xs-12 col-lg-8">
                    <h1>Welcome to the WebLibrary Laravel 8</h1>
                    <span>Please select your products ... you book store</span>
            </div>
            <div class="col-xs-12 col-lg-4 btn-head">

                @if (Auth::check())

                <div>

                <a class="" style="text-decoration: none;" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">

                    <button type="button" class="btn btn-primary boton boton-space">
                        {{ Auth::user()->name }}&nbsp;&nbsp;Logout
                    </button>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

                </div>

                @endif

                @if (!Auth::check())
                    <a href="{{ route('login') }}"><button type="button" class="btn btn-primary boton boton-space">Login</button></a>
                    <a href="{{ route('register') }}"><button type="button" class="btn btn-primary boton boton-space">Register</button></a>
                @endguest

                @if(Route::current()->getName() == 'indexcar')
                    <a href="{{ url('/') }}" class="link-libro" style="text-decoration: none; color: #050505;">
                        <button type="button" class="btn btn-primary boton boton-space">Main</button>
                    </a>
                    <a href="{{ url('/mainproducto') }}" class="link-libro" style="text-decoration: none; color: #050505;">
                        <button type="button" class="btn btn-warning boton boton-space">Admin</button>
                    </a>
                @endif

                @if((Route::current()->getName() == 'login') OR (Route::current()->getName() == 'register'))
                    <a href="{{ url('/') }}" class="link-libro" style="text-decoration: none; color: #050505;">
                        <button type="button" class="btn btn-primary boton boton-space">Main</button>
                    </a>
                    <a href="{{ url('/mainproducto') }}" class="link-libro" style="text-decoration: none; color: #050505;">
                        <button type="button" class="btn btn-warning boton boton-space">Admin</button>
                    </a>
                @endif

                @if((Route::current()->getName() == 'indexcheck') OR (Route::current()->getName() == 'indexrelevance') OR (Route::current()->getName() == 'indextitle') OR (Route::current()->getName() == 'indexlowprice') OR (Route::current()->getName() == 'indexhighprice') OR (Route::current()->getName() == 'indexcheapest'))
                    <a href="{{ url('/mainproducto') }}" class="link-libro" style="text-decoration: none; color: #050505;">
                        <button type="button" class="btn btn-warning boton boton-space">Admin</button>
                    </a>
                    <a href="{{ url('car/0') }}" class="link-libro" style="text-decoration: none; color: #050505;">
                        <button type="button" class="btn btn-primary boton boton-space">See car</button>
                    </a>
                @endif

                @if(Route::current()->getName() == 'indexcardelete')
                    <a href="{{ url('/') }}" class="link-libro" style="text-decoration: none; color: #050505;">
                        <button type="button" class="btn btn-primary boton boton-space">Main</button>
                    </a>
                    <a href="{{ url('/mainproducto') }}" class="link-libro" style="text-decoration: none; color: #050505;">
                        <button type="button" class="btn btn-warning boton boton-space">Admin</button>
                    </a>
                @endif

                @if(Route::current()->getName() == 'home')
                    <a href="{{ url('car/0') }}" class="link-libro" style="text-decoration: none; color: #050505;">
                        <button type="button" class="btn btn-primary boton boton-space">See car</button>
                    </a>
                    <a href="{{ url('/mainproducto') }}" class="link-libro" style="text-decoration: none; color: #050505;">
                        <button type="button" class="btn btn-warning boton boton-space">Admin</button>
                    </a>
                @endif

                @if((Route::current()->getName() == 'indexadminproducto') OR (Route::current()->getName() == 'addorder') OR (Route::current()->getName() == 'addproducto') OR (Route::current()->getName() == 'editproducto') OR (Route::current()->getName() == 'pending') OR (Route::current()->getName() == 'sent') OR (Route::current()->getName() == 'deleteorder') OR (Route::current()->getName() == 'deleteproducto') OR (Route::current()->getName() == 'saveaddorder'))
                    <a href="{{ url('car/0') }}" class="link-libro" style="text-decoration: none; color: #050505;">
                        <button type="button" class="btn btn-primary boton boton-space">See car</button>
                    </a>
                    <a href="{{ url('/') }}" class="link-libro" style="text-decoration: none; color: #050505;">
                        <button type="button" class="btn btn-primary boton boton-space">Main</button>
                    </a>
                @endif
                @if(Route::current()->getName() == 'indexadminorder')
                    <a href="{{ url('car/0') }}" class="link-libro" style="text-decoration: none; color: #050505;">
                        <button type="button" class="btn btn-primary boton boton-space">See car</button>
                    </a>
                    <a href="{{ url('/') }}" class="link-libro" style="text-decoration: none; color: #050505;">
                        <button type="button" class="btn btn-primary boton boton-space">Main</button>
                    </a>
                @endif
                @if(Route::current()->getName() == 'indexcheckout')
                    <a href="{{ url('car/0') }}" class="link-libro" style="text-decoration: none; color: #050505;">
                        <button type="button" class="btn btn-primary boton boton-space">See car</button>
                    </a>
                    <a href="{{ url('/') }}" class="link-libro" style="text-decoration: none; color: #050505;">
                        <button type="button" class="btn btn-primary boton boton-space">Main</button>
                    </a>
                @endif
                @if(Route::current()->getName() == 'indexcheckout2')
                    <a href="{{ url('car/0') }}" class="link-libro" style="text-decoration: none; color: #050505;">
                        <button type="button" class="btn btn-primary boton boton-space">See car</button>
                    </a>
                    <a href="{{ url('/') }}" class="link-libro" style="text-decoration: none; color: #050505;">
                        <button type="button" class="btn btn-primary boton boton-space">Main</button>
                    </a>
                @endif
            </div>
        </div>
    </div>

     @yield('content')

    @extends('layout2')

    <!-- Scripts -->

    <!--<script src="http://localhost/weblibrarylaravel1/public/js/mios.js"></script>-->

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js" integrity="sha512-XVz1P4Cymt04puwm5OITPm5gylyyj5vkahvf64T8xlt/ybeTpz4oHqJVIeDtDoF5kSrXMOUmdYewE4JS/4RWAA==" crossorigin="anonymous"></script>

</body>
</html>