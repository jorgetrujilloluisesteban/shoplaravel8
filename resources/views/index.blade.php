@extends('layout')

@section('content')


            @if($libros->isEmpty())

                <div class="col-xs-12 error404 text-center">

                        <h1><small>¡Oops!</small></h1>

                        <h2>There are no products in this section yet</h2>

                </div>

            @else
            
            <div class="col-xs-12 col-lg-12">

                <div class="col-xs-12 col-lg-2 float-left centro">
                    <h3><b>Language<b></h3>
                    <br>

                    <form method="POST" action="{{ route('indexcheck') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" >

                        <div class="form-group">
                            <input name="check[]" type="checkbox" class="custom-control-input2" value="php">
                            <span class="custom-control-indicator checkbox2"></span>
                            <span class="custom-control-description">&nbsp;Php</span>
                        </div>
                        <div class="form-group">
                            <input name="check[]" type="checkbox" class="custom-control-input2" value="javascript">
                            <span class="custom-control-indicator checkbox2"></span>
                            <span class="custom-control-description">&nbsp;Javascript</span>
                        </div>
                        <div class="form-group">
                            <input name="check[]" type="checkbox" class="custom-control-input3" value="java">
                            <span class="custom-control-indicator checkbox3"></span>
                            <span class="custom-control-description">&nbsp;Java</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
        
                <div class="col-xs-12 col-lg-8 float-left">
                    <br><br><br>

                    <div class="row">

                            @foreach($libros as $libro)

                            <!--<div class="col-3 col-md-3 mb-5 mb-md-0">-->
                            <div class="card-group">
                                <div class="card-deck">
                                    <div class="card">
                                        
                                        <a href="http://localhost/shoplaravel8/public/indexdetail/{{ $libro->id }}" class="link-libro" style="text-decoration: none; color: #050505;">
                                        <img src="http://localhost/shoplaravel8/resources/img/{{ $libro->imagenurl }}" class="img-responsive imagen"/>
   
                                            <div class="card-block">
                                                <h4 class="card-title text-uppercase mb-0" style="color:#ec6611;">
                                                    @if ($libro->idcategoria == 1)
                                                        <b>PHP</b>
                                                    @endif
                                                    @if ($libro->idcategoria == 2)
                                                        <b>Javascript</b>
                                                    @endif
                                                    @if ($libro->idcategoria == 3)
                                                        <b>Java</b>
                                                    @endif
                                                </h4>
                                                <h6><b>{{ $libro->name }}</b></h6>
                                                <h3><b><p class="card-text text-uppercase price" style="color:#5594db;">{{ $libro->price }} €</p></b></h3>

                                            </div>
                                        </a>
                                        <div class="card-footer">
                                            <!--<small class="text-muted">Last updated 3 mins ago</small>-->
                                            <a href="http://localhost/shoplaravel8/public/indexdetail/{{ $libro->id }}" class="link-libro" style="text-decoration: none; color: #050505;"><button type="button" class="btn btn-warning btn-block">View Details</button></a>
                                            <a href="http://localhost/shoplaravel8/public/car/{{ $libro->id }}" class="link-libro" style="text-decoration: none; color: #050505;"><button type="button" class="btn btn-primary btn-block">Add to Car</button></a>
                                        </div>

                                    </div> <!--.card-->
                                </div>
                            <!--</div>--><!--col-6 col-md-3-->

                            </div>

                            @endforeach
                    </div>
                </div>
                
                <div class="col-xs-12 col-lg-2 float-right centro"> 
                    <div class="boton1">
                          <div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sort by Relevance
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item combo" style="text-decoration: none;" href="{{ route('indexrelevance') }}">Sort by Relevance</a><br>
                            <a class="dropdown-item combo" style="text-decoration: none;" href="{{ route('indextitle') }}">Title</a><br>
                            <a class="dropdown-item combo" style="text-decoration: none;" href="{{ route('indexlowprice') }}">Lowest Price</a><br>
                            <a class="dropdown-item combo" style="text-decoration: none;" href="{{ route('indexhighprice') }}">highest price</a><br>
                            <a class="dropdown-item combo" style="text-decoration: none;" href="{{ route('indexcheapest') }}">the 3 cheapest</a><br>
                          </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xs-12"></div>
            <div class="clearfix"></div>

                <div class="d-flex justify-content-center">
                    {{ $libros->links() }}
                </div>

            @endif
            
@endsection