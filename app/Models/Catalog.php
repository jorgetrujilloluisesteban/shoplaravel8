<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MyClass {

    public $items;
    public $sumtotal;
 
    public function setItems($val)
    {
       $this->items = $val;
       return $this;
    }
 
    public function setSumtotal($val2)
    {
       $this->sumtotal = $val2;
       return $this;
    }
 }

class Catalog extends Model
{
    
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'productos';

    protected $fillable = [
        'name', 'price', 'descripcion', 'imagenurl', 'idcategoria' ,
    ];
    
    public function getLibrosCheck($checkphp, $checkjavascript, $checkjava)
    {

      if (($checkphp == 0) AND ($checkjavascript == 0) AND ($checkjava == 0))
      {
          $libros = NULL;
      }

      if (($checkphp == 1) AND ($checkjavascript == 2) AND ($checkjava == 3))
      {
          $libros = DB::table('productos')->whereBetween('idcategoria', [0, 4])->paginate(6);
          //$libros = DB::table('productos')->paginate(8);
      }

      if (($checkphp == 1) AND ($checkjavascript == 0) AND ($checkjava == 0))
      {
          $libros = DB::table('productos')->where('idcategoria', '=', 1)
                    //->orWhere('name', 'John')
                                                  ->paginate(6);
      }
      if (($checkphp == 1) AND ($checkjavascript == 2) AND ($checkjava == 0))
      {
          $libros = DB::table('productos')->where('idcategoria', '=', 1)
                                                  ->orWhere('idcategoria', '=', 2)
                                                  ->paginate(6);
      }
      if (($checkphp == 0) AND ($checkjavascript == 2) AND ($checkjava == 3))
      {
          $libros = DB::table('productos')->where('idcategoria', '=', 2)
                                                  ->orWhere('idcategoria', '=', 3)
                                                  ->paginate(6);
      }

      if (($checkphp == 0) AND ($checkjavascript == 0) AND ($checkjava == 3))
      {
          $libros = DB::table('productos')->where('idcategoria', '=', 3)
                                                  ->paginate(6);
      }

      if (($checkphp == 0) AND ($checkjavascript == 2) AND ($checkjava == 0))
      {
          $libros = DB::table('productos')->where('idcategoria', '=', 2)
                                                  ->paginate(6);
      }

      if (($checkphp == 1) AND ($checkjavascript == 0) AND ($checkjava == 3))
      {
          $libros = DB::table('productos')->where('idcategoria', '=', 1)
                                                  ->orWhere('idcategoria', '=', 3)
                                                  ->paginate(6);
      }

      return $libros;
    }
    public function iscart()
    {
    	Session::regenerate();

    	if (Session::has('carrito_id'))
		{
		    $carrito = Session::get('carrito_id');
		    return $carrito;
		}
		else
		{
			return NULL;
		}
    }

    public function isloged()
    {
    	Session::regenerate();

      if (Session::has('usuario_logged')=="FALSE")
  		{
  			Session::put('id_cliente', '');
  			Session::put('usuario_nombre', '');
  			//Session::put('usuario_password', '');
  			//Session::put('usuario_email', '');
  			Session::put('usuario_fecha', '');
  			Session::put('usuario_logged', "FALSE");

  			return "FALSE";
  			
  		}
  		if (Session::has('usuario_logged')=="TRUE")
  		{
  			return "TRUE";
  		}
    }

    public function unloged()
    {
      $fecha = date('Y-m-d H:i:s');
    	Session::regenerate();

  		$carrito = Session::get('carrito_id');

  		Session::put('carrito_id', $carrito);
  		Session::put('id_cliente', '');
  		Session::put('usuario_nombre', '');
  		//Session::put('usuario_password', '');
  		//Session::put('usuario_email', '');
  		Session::put('usuario_fecha', $fecha);
  		Session::put('usuario_logged', FALSE);

  		$car = Cart::select('carrito.*')
          	->where('carrito.idcarrito', $carrito)
          	->delete();
    }

    public function var_item($carrito)
    {
        $obj = new MyClass;

    	$car = Cart::select('carrito.*','productos.*')
        	->join('productos', 'carrito.car_id_producto', '=', 'productos.id')
        	->where('carrito.idcarrito', $carrito)
        	->get();

        $items = 0;
        $sumtotal = 0;

        foreach($car as $resultado)
        {
            $items = $items + $resultado['cantidad'];
            $total = $resultado['cantidad'] * $resultado['price'];
            $sumtotal = $sumtotal + $total;
        }

        $obj->setItems($items);
        $obj->setSumtotal($sumtotal);

        return $obj;

    }
    public function UpdateProduct($id, $name, $price, $descripcion, $foto)
    {
        //UPDATE

        DB::table('productos')
            ->where('productos.id', $id)
            ->update(['name' => $name, 'price' => $price, 'descripcion' => $descripcion, 'imagenurl' => $foto]);

    }
}
