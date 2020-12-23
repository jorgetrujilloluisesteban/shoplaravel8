<?php

namespace App\Models;

use App\Catalog;
use Session;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Cart extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'carrito';

    protected $fillable = [
        'idcarrito', 'car_id_producto', 'cantidad', 'fecharegistro',
    ];

    public function getcar()
    {
        $car = DB::table('carrito')->get();
        return $car;
    }

    public function GetidCarrito()
    {
    	Session::regenerate();

    	if (Session::has('carrito_id'))
		{
		    $carrito_id = Session::get('carrito_id');
		    return $carrito_id;
		}
		else
		{
            //$tempCarrito = str_random(15);
            $tempCarrito = Str::random(15);

			$fecha = date('Y-m-d H:i:s');

			Session::put('carrito_id', $tempCarrito);
			Session::put('id_cliente', '');
			Session::put('usuario_nombre', '');
			//Session::put('usuario_password', '');
			//Session::put('usuario_email', '');
			Session::put('usuario_fecha', $fecha);
			Session::put('usuario_logged', FALSE);

			return $tempCarrito;
		}
    }

    public function getCart($cantidad, $idproducto, $control)
    {
    	$carrito = $this->GetidCarrito();

    	$fecha = date('Y-m-d H:i:s');

    	if($cantidad!=0 AND $control==FALSE)
    	{
    		$vcarrito = $this->AgregarACarrito($carrito, $idproducto, $cantidad, $fecha);
    	}

    	return $carrito;
    }
    

    public function AgregarACarrito($carrito, $idproducto, $cantidad, $fecha)
    {

        /*$car = DB::table('carrito')
        ->join('productos as tbl1', 'tbl1.id',
        '=', 'carrito.car_id_producto')
        ->where('carrito.id', $carrito_id)
        ->get();*/
        
        $result = DB::table('carrito')
            ->join('productos', 'carrito.car_id_producto', '=', 'productos.id')
            ->where('carrito.idcarrito', $carrito)
            ->where('carrito.car_id_producto', $idproducto)
            ->get();

            //$result = DB::table('carrito')->get();

        $control = FALSE;
        $nuevacantidad = 0;

        foreach($result as $row)
        {
            $control = TRUE;
            $nuevacantidad = $nuevacantidad + $row->cantidad;
        }

        $nuevacantidad = $nuevacantidad + $cantidad;

        if ($control==TRUE)
        {
        	//UPDATE

        	//$nuevacantidad = $count + $cantidad;

            DB::table('carrito')
            ->join('productos', 'carrito.car_id_producto', '=', 'productos.id')
            ->where('carrito.idcarrito', $carrito)
            ->where('carrito.car_id_producto', $idproducto)
            ->update(['cantidad' => $nuevacantidad, 'fecharegistro' => $fecha]);

        	return $carrito;
        }
        else
        {
        	//INSERT

            DB::table('carrito')->insert(
            ['idcarrito' => $carrito, 'car_id_producto' => $idproducto, 'cantidad' => $cantidad, 
            'fecharegistro' => $fecha]);

        	return $carrito;
        }
    }

    public function MostrarCarrito($carrito_id)
    {

    	 $car = DB::table('carrito')
            ->join('productos as tbl1', 'tbl1.id',
            '=', 'carrito.car_id_producto')
        	->where('carrito.idcarrito', $carrito_id)
        	->get();

        return $car;
    }


    public function DeleteCart($carrito, $idproducto, $cantidad_delete, $fecha)
    {
        $car = DB::table('carrito')
            ->join('productos', 'carrito.car_id_producto', '=', 'productos.id')
            ->where('carrito.idcarrito', $carrito)
            ->where('carrito.car_id_producto', $idproducto)
            ->get();

        $cantidad_total=0;

       foreach($car as $row)
        {
            $control = TRUE;
            $cantidad_total = $row->cantidad;
        }

        //$cant_total = $car->cantidad;
        $nueva_cantidad = $cantidad_total - $cantidad_delete;

        if ($cantidad_delete>0)
        {
        	if($nueva_cantidad==0)
        	{
        		//DELETE
                DB::table('carrito')
                ->join('productos', 'carrito.car_id_producto', '=', 'productos.id')
                ->where('carrito.idcarrito', $carrito)
                ->where('carrito.car_id_producto', $idproducto)
                ->delete();
        	}
        	else
        	{
                if($nueva_cantidad>0)
                {
            		//UPDATE

                    DB::table('carrito')
                    ->join('productos', 'carrito.car_id_producto', '=', 'productos.id')
                    ->where('carrito.idcarrito', $carrito)
                    ->where('carrito.car_id_producto', $idproducto)
                    ->update(['cantidad' => $nueva_cantidad, 'fecharegistro' => $fecha]);
                }
        	}
        }

        return $carrito;
    }

    public function Savecheckout($obj, $fecha, $name, $email, $address){
        //INSERT
        $estado=0;
        $subtotal = $obj->sumtotal;
        $items = $obj->items;

        $cadena = $subtotal . " "  . $items;

        DB::table('orders2')->insert(
        ['name' => $name, 'email' => $email, 'address' => $address, 'ordercontent' => $cadena
        , 'fecharegistro' => $fecha, 'estado' => $estado]);

        $tempCarrito = Str::random(15);

        $fecha = date('Y-m-d H:i:s');

        Session::put('carrito_id', $tempCarrito);
        Session::put('id_cliente', '');
        Session::put('usuario_nombre', '');
        //Session::put('usuario_password', '');
        //Session::put('usuario_email', '');
        Session::put('usuario_fecha', $fecha);
        Session::put('usuario_logged', FALSE);

        return $tempCarrito;
    }
}

