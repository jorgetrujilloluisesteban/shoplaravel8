@extends('layout')

@section('content')

        @if(!$libro)

            <div class="col-xs-12 error404 text-center">

                    <h1><small>¡Oops!</small></h1>

                    <h2>There are no products in this section yet</h2>

            </div>

        @else

            <div class="row">
                <div class="col-lg-12 col-md-12">
                 @foreach($libro as $libro)

                        <div class="col-lg-4 col-md-6 mb-5 mb-md-0 float-left detail1">
                            <img src="http://localhost/shoplaravel8/resources/img/{{ $libro->imagenurl }}" class="img-responsive float-left"/>
                        </div>
                        <div class="col-lg-8 col-md-6 mb-5 mb-md-0 float-right detail2">
  
                            <h2 class="card-title text-uppercase mb-0" style="color:#ec6611;">
                                @if ($libro->idcategoria == 1)
                                    <b>PHP</b>
                                @endif
                                @if ($libro->idcategoria == 2)
                                    <b>Javascript</b>
                                @endif
                                @if ($libro->idcategoria == 3)
                                    <b>Java</b>
                                @endif
                            </h2>
                            <h2><b>{{ $libro->name }}</b></h2>
                            <h4><b>{{ $libro->descripcion }}</b></h4>

                                <div class="col-3 col-md-2 mb-5 mb-md-0 box">
                                    <h4>Mapt Subscription</h4>
									<h3 style="color:#5594db;"><b>FREE</b></h3>
									<h4>€30.23/m after trial</h4>
                                </div>
                                <div class="col-3 col-md-2 mb-5 mb-md-0 box">
                                    <h4>Book</h4>
									<h3 style="color:#5594db;"><b>{{ $libro->price }} €</b></h3>
								    <h4 style="color:red;">Save 29%</h4>
                                </div>
                                <div class="col-3 col-md-2 mb-5 mb-md-0 box">
                                    <h4>Print + eBook</h4>
                                    <h3 style="color:#5594db;"><b>€42.99</b></h3>
                                    <h4>RRP €42.99</h4>
                                </div>

                                <div class="card-footer">
                                    <!--<small class="text-muted">Last updated 3 mins ago</small>-->
                                    <a href="http://localhost/shoplaravel8/public/car/{{ $libro->id }}" class="link-libro" style="text-decoration: none; color: #050505;">
                                    <button type="button" class="btn btn-primary btn-lg btn-block text-center">Add to Car</button></a>
	                            </div>
                        </div>

                @endforeach
                </div>
            </div>
                
        @endif

@endsection