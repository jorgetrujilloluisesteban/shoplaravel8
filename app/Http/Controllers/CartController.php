<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Catalog;
use App\Models\Cart;

use Illuminate\Support\Facades\Redirect;


class CartController extends Controller
{
	public function indexcar(Request $request, $id){
		//$libros = new Catalog($request->all());

        $obj_catalog = new catalog();
        $obj_cart = new cart();

        //$log = $obj_catalog->isloged();
        $carrito = $obj_cart->GetidCarrito();
        $vcarrito = $carrito;

        $fecha = date('Y-m-d H:i:s');

        //if($request->isMethod('POST'))
        if($id!=0)
        {
            //$idproducto = $_POST['idproducto'];
            //$cantidad = $_POST['cantidad'];
            $cantidad = 1;

            $vcarrito = $obj_cart->AgregarACarrito($carrito, $id, $cantidad, $fecha);
        }

        $car = $obj_cart->MostrarCarrito($vcarrito);

        //da el número de productos y la suma total
        $obj = $obj_catalog->var_item($carrito);

        //$items = $results[0];
        //$sumtotal = $results[1];

        return view('indexcar', ['car'=> $car], ['obj'=> $obj]);
	}

    public function indexcardelete(Request $request){

        $obj_catalog = new catalog();
        $obj_cart = new cart();

        //$log = $obj_catalog->isloged();
        $carrito = $obj_cart->GetidCarrito();
        $vcarrito = $carrito;
        $fecha = date('Y-m-d H:i:s');

        if($_POST)
        {   
            $idproducto = $_POST['idproducto'];
            $cantidad = 1;

            $vcarrito = $obj_cart->DeleteCart($carrito, $idproducto, $cantidad, $fecha);
        }

        $car = $obj_cart->MostrarCarrito($vcarrito);

        //da el número de productos y la suma total
        $obj = $obj_catalog->var_item($vcarrito);

        Session::flash('flash_message', 'Product removed');

        //$items = $results[0];
        //$sumtotal = $results[1];
        //$student->delete();
        //return redirect('/')->with('success', 'Student deleted successfully');

        return view('indexcar', ['car'=> $car], ['obj'=> $obj]);
    }
    public function indexcheckout(Request $request)
    {
        return view('indexcheckout');

    }

    public function indexcheckout2(Request $request){

        $obj_catalog = new catalog();
        $obj_cart = new cart();

        //$log = $obj_catalog->isloged();
        $carrito = $obj_cart->GetidCarrito();
        $vcarrito = $carrito;

        $car = $obj_cart->MostrarCarrito($vcarrito);
        $obj = $obj_catalog->var_item($vcarrito);

        $fecha = date('Y-m-d H:i:s');

        if($_POST)
        {   
            $name = $_POST['_name'];
            $email = $_POST['_email'];
            $address = $_POST['_address'];

            $obj_cart->Savecheckout($obj, $fecha, $name, $email, $address);
        }

        //$car = $obj_cart->MostrarCarrito($vcarrito);

        //da el número de productos y la suma total
        //$obj = $obj_catalog->var_item($vcarrito);

        //$items = $results[0];
        //$sumtotal = $results[1];
        //$student->delete();
        //return redirect('/')->with('success', 'Student deleted successfully');

        $libros = DB::table('productos')->orderBy('name')->paginate(8);
        
        return view('index', ['libros' => $libros]);
    }
}
