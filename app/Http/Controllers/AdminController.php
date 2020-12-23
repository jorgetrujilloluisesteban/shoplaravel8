<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Catalog;
use App\Models\Cart;
use App\Models\Order;

use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{
    public function indexadminproducto(Request $request)
    {
        $libros = DB::table('productos')->orderBy('price', 'asc')->paginate(3);
        
        return view('indexadminproducto', ['libros' => $libros]);
    }
    public function indexadminorder(Request $request)
    {
        $orders = DB::table('orders2')->orderBy('fecharegistro', 'asc')->paginate(3);
        
        return view('indexadminorder', ['orders' => $orders]);
    }

    public function pending(Request $request, $id)
    {
        $nueva_cantidad = 0;
        //UPDATE

        DB::table('orders2')->where('orders2.id', $id)
                            ->update(['estado' => $nueva_cantidad]);
        
        $orders = DB::table('orders2')->orderBy('fecharegistro', 'asc')->paginate(3);

        return view('indexadminorder', ['orders' => $orders]);
    }

    public function sent(Request $request, $id)
    {
        $nueva_cantidad = 1;
        //UPDATE

        DB::table('orders2')->where('orders2.id', $id)
                            ->update(['estado' => $nueva_cantidad]);
        
        $orders = DB::table('orders2')->orderBy('fecharegistro', 'asc')->paginate(3);

        return view('indexadminorder', ['orders' => $orders]);
    }

    public function deleteorder(Request $request, $id)
    {
        $nueva_cantidad = 2;
        //UPDATE

        DB::table('orders2')->where('orders2.id', $id)
                            ->update(['estado' => $nueva_cantidad]);
        
        $orders = DB::table('orders2')->orderBy('fecharegistro', 'asc')->paginate(3);

        return view('indexadminorder', ['orders' => $orders]);
    }

    public function orderby(Request $request, $orden)
    {
        $orders = DB::table('orders2')->orderBy('fecharegistro', $orden)->paginate(3);
        
        return view('indexadminorder', ['orders' => $orders]);
    }

    public function addorder(Request $request)
    {
        $orders = DB::table('orders2')->orderBy('fecharegistro', 'asc')->paginate(3);

        return view('addorder', ['orders' => $orders]);
    }

    public function saveaddorder(Request $request)
    {
 
        $order = new Order(array(
            'name' => $request->get('_name'), 
            'email' => $request->get('_email'),
            'address' => $request->get('_address'),
            'ordercontent' => $request->get('_ordercontent'),
            'fecharegistro' => $request->get('_fecharegistro'),
            'estado' => $request->get('_estado')
        ));

        $order->save();

        Session::flash('flash_message', 'Saved order');

        $orders = DB::table('orders2')->orderBy('fecharegistro', 'asc')->paginate(3);

        return view('indexadminorder', ['orders' => $orders])->with('status', 'order created');
    }

    public function addproducto(Request $request)
    {
        $libros = DB::table('productos')->orderBy('price', 'asc')->paginate(3);
        
        return view('addproducto', ['libros' => $libros]);
    }

    public function saveaddproducto(Request $request)
    {
        $titulo = $request->get('_tituloProducto'); 
        $precio = $request->get('_precio');
        $descripcionProducto = $request->get('_descripcionProducto');
        $idcategoria = $request->get('_seleccionarCategoria');

        /*=============================================
        VALIDAR IMAGEN PORTADA
        =============================================*/

        $rutaPortada = "default.jpg";

        if (!empty($titulo) AND !empty($precio) AND !empty($descripcionProducto) AND !empty($idcategoria))
        {

            if (!empty($_FILES["_fotoPortada"]["tmp_name"]))
            {
                /*=============================================
                DEFINIMOS LAS MEDIDAS
                =============================================*/
            
                list($ancho, $alto) = getimagesize($_FILES["_fotoPortada"]["tmp_name"]);	
            
                $nuevoAncho = 1280;
                $nuevoAlto = 720;

                    /*=============================================
                    DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                    =============================================*/
            
                    if($_FILES["_fotoPortada"]["type"] == "image/jpeg"){
            
                        /*=============================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        =============================================*/
            
                        $aleatorio = mt_rand(100,999);
            
                        $rutaPortada = $_FILES["_fotoPortada"]["tmp_name"];
            
                        $origen = $_FILES["_fotoPortada"]["tmp_name"];

                        $destino = "c:/wamp64/www/shoplaravel8/resources/img/".$aleatorio.".jpg";

                        $destino2 = $aleatorio.".jpg";

                        move_uploaded_file($origen,$destino);
            
                    }
            
                    if($_FILES["_fotoPortada"]["type"] == "image/png"){
            
                        /*=============================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        =============================================*/
            
                        $aleatorio = mt_rand(100,999);

                        $rutaPortada = $_FILES["_fotoPortada"]["tmp_name"];
            
                        $origen = $_FILES["_fotoPortada"]["tmp_name"];
        
                        $destino = "c:/wamp64/www/shoplaravel8/resources/img/".$aleatorio.".png";

                        $destino2 = $aleatorio.".png";	

                        move_uploaded_file($origen,$destino);
            
                    }

            }
                /************* */

                if ($rutaPortada!="default.jpg"){
                    $foto = $destino2;
                }else{
                    $foto = $rutaPortada;
                }
                
                $producto = new Catalog(array(
                    'name' => $request->get('_tituloProducto'), 
                    'price' => $request->get('_precio'),
                    'descripcion' => $request->get('_descripcionProducto'),
                    'imagenurl' => $foto,
                    'idcategoria' => $request->get('_seleccionarCategoria')
                ));

                $producto->save();
                Session::flash('flash_message', 'Product created');
        }

        $libros = DB::table('productos')->orderBy('price', 'asc')->paginate(3);
        
        return view('indexadminproducto', ['libros' => $libros]);
    }

    public function editproducto(Request $request, $id)
    {

        $libros = DB::table('productos')->where('productos.id', $id)
        ->orderBy('price', 'asc')->paginate(3);
        
        return view('editproducto', ['libros' => $libros])->with('id', $id);;
    }

    public function deleteproducto(Request $request, $id)
    {
        DB::table('productos')
        ->where('productos.id', $id)
        ->delete();

        Session::flash('flash_message', 'Deleted product');

        $libros = DB::table('productos')->orderBy('price', 'asc')->paginate(3);
        
        return view('indexadminproducto', ['libros' => $libros]);
    }

    public function saveeditproducto(Request $request)
    {
 
        /*=============================================
        VALIDAR IMAGEN PORTADA
        =============================================*/

        $id = $request->get('_id');
        $name = $request->get('_tituloProducto');
        $price = $request->get('_precio');
        $descripcion = $request->get('_descripcionProducto');
        $imagenurl = $request->get('_imagenurl');

        $rutaPortada = "default.jpg";

        if (!empty($id) AND !empty($name) AND !empty($price) AND !empty($descripcion))
        {
            if (!empty($_FILES["_fotoPortada"]["tmp_name"]))
            {
                //$rutaPortadaDelete = $_FILES["_fotoPortada"]["name"];

                /*=============================================
                DEFINIMOS LAS MEDIDAS
                =============================================*/
            
                list($ancho, $alto) = getimagesize($_FILES["_fotoPortada"]["tmp_name"]);	
            
                $nuevoAncho = 1280;
                $nuevoAlto = 720;

                    /*=============================================
                    DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                    =============================================*/
            
                    if($_FILES["_fotoPortada"]["type"] == "image/jpeg"){
            
                        /*=============================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        =============================================*/
            
                        $aleatorio = mt_rand(100,999);
            
                        $rutaPortada = $_FILES["_fotoPortada"]["tmp_name"];
            
                        $origen = $_FILES["_fotoPortada"]["tmp_name"];

                        $destino = "c:/wamp64/www/shoplaravel8/resources/img/".$aleatorio.".jpg";

                        $destino2 = $aleatorio.".jpg";

                        move_uploaded_file($origen,$destino);
                        
                    }
            
                    if($_FILES["_fotoPortada"]["type"] == "image/png"){
            
                        /*=============================================
                        GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                        =============================================*/
            
                        $aleatorio = mt_rand(100,999);

                        $rutaPortada = $_FILES["_fotoPortada"]["tmp_name"];
            
                        $origen = $_FILES["_fotoPortada"]["tmp_name"];
        
                        $destino = "c:/wamp64/www/shoplaravel8/resources/img/".$aleatorio.".png";

                        $destino2 = $aleatorio.".png";	

                        move_uploaded_file($origen,$destino);
            
                    }
            }
                /************* */

                if ($rutaPortada!="default.jpg"){

                    unlink("c:/wamp64/www/shoplaravel8/resources/img/".$imagenurl);

                    $foto = $destino2;
                }else{
                    $foto = $rutaPortada;
                }

                $producto = new Catalog;
                $producto->UpdateProduct($id, $name, $price, $descripcion, $foto);

                Session::flash('flash_message', 'Edited product');

            
        }

        $libros = DB::table('productos')->orderBy('price', 'asc')->paginate(3);
        
        return view('indexadminproducto', ['libros' => $libros]);
    }
}