@extends('layout')

@section('content')
    <div class="col-lg-12 col-md-12 mb-12 mb-md-0 body">
        <div class="col-lg-8 col-md-8 mb-8 mb-md-0 float-left">
            <!--<div class="col-12 col-md-12 mb-12 mb-md-0 box2">-->
                <h2>Your Cart</h2>
            <!--</div>-->

            @if(Session::has('flash_message'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{Session::get('flash_message')}}</strong>
                </div>
            @endif

            @if($car->isEmpty())

            <div class="col-xs-12 error404 text-center">

                    <h2>¡Oops!</h2>

                    <h2>There are no products in this section yet</h2>

            </div>

            @else
            @foreach($car as $carro)

                <!--<div class="col-lg-12 col-md-12 mb-12 mb-md-0">-->
                    <section>
                            <div class="col-lg-3 col-md-4 mb-5 mb-md-0 float-left">
                                <img src="http://localhost/shoplaravel8/resources/img/{{ $carro->imagenurl }}" class="img-responsive imagen-car"/>
                            </div>
                            <div class="col-lg-9 col-md-8 mb-5 mb-md-0 float-left">

                                    <h3><b>{{ $carro->name}}</b></h3>

                                    <h6>{{ $carro->descripcion }}</h6>

                                    <h3><b>{{ $carro->price }} €</b></h3>
        
                                        <form method="POST" action="{{ route('indexcardelete') }}">
                                            <input type="hidden" name="idproducto" value="{{ $carro->car_id_producto }}"/>
                                            @method('DELETE')
                                            {{ csrf_field() }}
                                            <label>Quantity:&nbsp;&nbsp;</label>
                                            {{ $carro->cantidad }}
                                            <!--<input type="number" name="cantidad" size="2" min="1" max="5" style="width: 3em;"/>-->
                                            <input type="submit" name="submit" class="btn btn-primary" value="Delete product" size="5" />
                                        </form>

                            </div>
                    </section>
                <!--</div>-->
                <!--<hr width="75%" />-->
                <div class="separa"></div>
            
            @endforeach
            @endif
        </div>
        <div class="col-4 col-md-4 mb-5 mb-md-0 float-right pull-right box1">
            <div class="col-12 col-md-12 mb-12 mb-md-0 box2">
            </div>
            <div class="col-12 col-md-12 mb-12 mb-md-0 box3">
                <h2>Summary</h2>
            </div>
            <div class="col-12 col-md-12 mb-12 mb-md-0 box4">
                Free Shipping<br><br>
                Free shipping on print orders for US, UK, Europe and selected Asian countries
                <hr width="75%" />
                Sub Total:€ {{ $obj->sumtotal}}<br>
                Quantity: {{ $obj->items }}
                VAT:€6.24<br>
                Shipping:€0.00<br><br>

                @if ($obj->sumtotal<=0)
                    <h2>Total:{{ $obj->sumtotal }}</h2>
                @else                               
                    <h2>Total:{{ $obj->sumtotal + 6.24 }}</h2>
                @endif
            </div>

        </div>
    </div>
    @if(!$car->isEmpty())
        <a class="dropdown-item" href="{{ route('indexcheckout') }}"><button type="button" class="btn btn-success btn-lg float-right pull-right checkout">Checkout</button></a>
    @endif
    <div class="separa"></div>
@endsection