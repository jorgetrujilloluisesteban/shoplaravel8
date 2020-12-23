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
    <h2>Edit Product</h2>
    @foreach($libros as $libro)
    <form method="POST" action="{{ route('saveeditproducto') }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="_id" value="{{ $libro->id }}"/>
        <input type="hidden" name="_imagenurl" value="{{ $libro->imagenurl }}"/>

        <div class="modal-header" style="background:#3c8dbc; color:white">

        <h4 class="modal-title">Edit product</h4>

        </div>

        <div class="modal-body">

        <div class="box-body">

        <!--=====================================
        ENTRADA PARA EL TÍTULO
        ======================================-->

        <div class="form-group">
            
            <div class="input-group">

                <!--<input type="text" class="form-control input-lg validarProducto tituloProducto"  placeholder="Enter product title">-->
                <input type="text" class="form-control input-lg" name="_tituloProducto" value="{{ $libro->name }}" required="required" placeholder="{{ $libro->name }}"/>
            </div>

        </div>


        <!--=====================================
        AGREGAR CATEGORÍA NUMERICA
        ======================================-->

        <div class="form-group">
            
            <div class="input-group">

                <!--<select class="form-control input-lg seleccionarCategoria">-->
                <select class="form-control input-lg" name="_seleccionarCategoria" value="{{ $libro->idcategoria }}" required="required">
                
                <option value="">Selecionar categoría</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>

                <?php

                ?>

                </select>

            </div>

        </div>


        <!--=====================================
        AGREGAR DESCRIPCIÓN
        ======================================-->

        <div class="form-group">
            
            <div class="input-group">

            <textarea type="text" maxlength="320" rows="3" class="form-control input-lg" name="_descripcionProducto" value="{{ $libro->descripcion }}" required="required" placeholder="{{ $libro->descripcion }}"></textarea>

            </div>

        </div>


        <!--=====================================
        AGREGAR PRECIO
        ======================================-->

        <div class="form-group row">
            
            <!-- PRECIO -->

            <div class="col-md-4 col-xs-12">

            <div class="panel">PRECIO</div>
            
            <div class="input-group">
            
                <span class="input-group-addon"><i class="ion ion-social-usd"></i></span> 

                <!--<input type="number" class="form-control input-lg precio" min="0" step="any">-->
                <input type="number" class="form-control input-lg" name="_precio" value="{{ $libro->price }}" required="required" min="0" step="any"/>

            </div>

            </div>


        </div>
        <!--=====================================
        AGREGAR FOTO
        ======================================-->


        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
            <input type="file" name="_fotoPortada" class="custom-file-input fotoPortada" id="inputGroupFile01">
            <label class="custom-file-label" for="inputGroupFile01">Elije el achivo</label>

            </div>
        </div>
        <!--<img src="/shoptodo/images/default.jpg" class="img-thumbnail previsualizarPrincipal" width="200px">-->

        </div>

        </div>

        <div class="modal-footer">

        <input type="submit" class="btn btn-success" id="_submit" name="_submit" value="Save Product" />

        </div>
    </form>
    @endforeach
</div>


<div class="separa"></div>
    
@endsection