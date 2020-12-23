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
        <h2>Products</h2>
        <a href="{{ route('addproducto') }}">
            <button type="button" class="btn btn-success">Add Product</button>
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
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                    @foreach($libros as $libro)
                            <tr>
                            <td>{{ $libro->name }}</td>
                            <td scope="row"><img src="http://localhost/shoplaravel8/resources/img/{{ $libro->imagenurl }}" class="img-responsive imagen2"/></td>
                            
                            <td>{{ $libro->price }}€</td>
                            @if ($libro->idcategoria == 1)
                                <td>PHP</td>
                            @endif
                            @if ($libro->idcategoria == 2)
                                <td>Javascript</td>
                            @endif
                            @if ($libro->idcategoria == 3)
                                <td>Java</td>
                            @endif

                            <td style="font-size: 12px;">{{ $libro->descripcion }}</td>
                            <td>
                                <a href="{{ url("/editproducto/{$libro->id}") }}">
                                    <button type="button" class="btn btn-info">Edit</button>
                                </a>
                            </td>
                            <td>
                                <a href="{{ url("/deleteproducto/{$libro->id}") }}">
                                    <button type="button" class="btn btn-danger">Delete</button></td>
                                </a>
                            </td>
                            </tr>
                    @endforeach


            </tbody>
        </table>

    </div>
    <div class="separa"></div>
    <div class="d-flex justify-content-center">
        {{ $libros->links() }}
    </div>
@endsection