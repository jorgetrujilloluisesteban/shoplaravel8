@extends('layout')

@section('content')
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pull-left" style="float: left;"> 
        <h3>Administrator </h3>
        <br><br>
            <table class="table">
                <tbody>
                <tr>
                    <td>
                        <a href="{{ route('indexadminproducto') }}">
                            <button type="button" class="btn btn-warning btn-lg">Products</button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="{{ route('indexadminorder') }}">
                            <button type="button" class="btn btn-warning btn-lg">Orders</button>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pull-right" style="float: right;">
        <h2>Orders</h2>
        <a href="{{ route('addorder') }}">
            <button type="button" class="btn btn-success">Add Order</button>
        </a>
            @if(Session::has('flash_message'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{Session::get('flash_message')}}</strong>
                </div>
            @endif
        <br><br>
        <table class="table table-sm">
            <thead>
                <tr>
                <th scope="col">Name</th>
			    <th scope="col">Email</th>
			    <th scope="col">Address</th>
			    <th scope="col">Order Content</th>
			    <th scope="col">
                    Date<br>
                    <a href="{{ url("/orderby/desc") }}">Desc</a>
                    <a href="{{ url("/orderby/asc") }}">Asc</a>
                </th>
                <th scope="col">State</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

                    @foreach($orders as $order)
                            <tr>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>                        
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->ordercontent }}</td>
                            <td>{{ $order->fecharegistro }}</td>
                
                                @if ($order->estado==0)
					  	            <td><button type="button" class="btn btn-warning btn-sm">{{ $order->estado }}</button></td>
                                @endif
                                @if ($order->estado==1)
                                    <td><button type="button" class="btn btn-success btn-sm">{{ $order->estado }}</button></td>
                                @endif
                                @if ($order->estado==2)
                                    <td><button type="button" class="btn btn-danger btn-sm">{{ $order->estado }}</button></td>
                                @endif
                        
                            <td>
                                <a href="{{ url("/pending/{$order->id}") }}">
                                    <button type="button" class="btn btn-warning btn-sm">Pending</button>
                                </a>
                            </td>
                            <td>
                                <a href="{{ url("/sent/{$order->id}") }}">
                                    <button type="button" class="btn btn-success btn-sm">Sent</button>
                                </a>
                            </td>
                            <td>
                                <a href="{{ url("/deleteorder/{$order->id}") }}">
                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </a>
                            </td>
                            </tr>
                    @endforeach


            </tbody>
        </table>

    </div>
    <div class="separa"></div>
    <div class="d-flex justify-content-center">
        {{ $orders->links() }}
    </div>
@endsection
