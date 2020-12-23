<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Catalog;

class IndexController extends Controller
{
    protected $obj_catalog;
	protected $obj_cart;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = DB::table('productos')->paginate(8);
        
        return view('index', ['libros' => $libros]);

    }
    public function indexrelevance()
    {
        
        $libros = DB::table('productos')->paginate(8);
        
        return view('index', ['libros' => $libros]);

    }

    public function indextitle()
    {
  
        $libros = DB::table('productos')->orderBy('name')->paginate(8);
        
        return view('index', ['libros' => $libros]);

    }

    public function indexlowprice()
    {
  
        $libros = DB::table('productos')->orderBy('price', 'asc')->paginate(8);
        
        return view('index', ['libros' => $libros]);

    }

    public function indexhighprice()
    {
  
        $libros = DB::table('productos')->orderBy('price', 'desc')->paginate(8);
        
        return view('index', ['libros' => $libros]);

    }
    public function indexcheapest()
    {
  
        $libros = DB::table('productos')->orderBy('price', 'asc')->limit(3)->paginate(3);
        
        return view('index', ['libros' => $libros]);

    }
    
    public function indexcheck(Request $request){

        $checkphp = 0;
        $checkjavascript = 0;
        $checkjava = 0;
        $libros = NULL;

        $obj_catalog = new catalog();

        if(isset($_POST['check']))
        {
            $valores = $_POST['check'];
        }else
        {
            $valores = 0;
        }

       if(empty($valores))
       {
            $libros = DB::table('productos')->paginate(8);
       }
       else
       {
           $N = count($valores);

           for($i=0; $i < $N; $i++)
           {
               if ($valores[$i] == "php")
               {
                     $checkphp = 1;
                 }
               if ($valores[$i] == "javascript")
               {
                     $checkjavascript = 2;
                 }
               if ($valores[$i] == "java")
               {
                     $checkjava = 3;
                 }	
                 echo($valores[$i] . " ");

             }

           $libros = $obj_catalog->getLibrosCheck($checkphp, $checkjavascript, $checkjava);

       }

        //return view('index', compact('libros'));

        return view('index', ['libros' => $libros]);

   }

   public function indexdetail(Request $request, $id){

    $libro = DB::table('productos')->where('id', '=', $id)
    ->get();

    return view('indexdetail', ['libro' => $libro]);
   }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
