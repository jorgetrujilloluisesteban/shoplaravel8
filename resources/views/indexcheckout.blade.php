@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-lg-8 float-left">
            <h3>Checkout </h3>
                <div class="checkout">
                    @guest
                        <h2>You must log in</h2>
                    @else
                    <form action="{{ route('indexcheckout2') }}" method="POST">
                            {{ csrf_field() }}
                            <label for="name"><b>Name *</b></label>
                                <input type="text" id="name" name="_name" value="" required="required"  class="form-control"/>

                            <label for="email"><b>Email *</b></label>
                                <input type="email" id="email" name="_email" value="" required="required"  class="form-control"/>

                            <label for="address"><b>Address *</b></label>
                            <input type="text" id="text" name="_address" required="required" maxlength="150"  class="form-control"/>

                            <b>Fields marked with an asterisk (*) are required.</b>
                            <br>
                            <br>
                            <input type="submit" class="btn btn-success" id="_submit" name="_submit" value="Place Order" />
                        </form>
                    @endif
                </div>
        </div>
    </div>
</div>
@endsection
