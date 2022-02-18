<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryView(){
    	$category = Category::latest()->get();
    	return view('backend.category.category_view',compact('category'));
    }

    public function CategoryStore(Request $request){
    	$request->validate([
    		'category_name_en' => 'required',
    		'category_name_es' => 'required',
    		'category_icon' => 'required',
    	],[
    		'category_name_en.required' => 'Input Category English Name',
    		'category_name_es.required' => 'Input Category Spanish Name',
    	]);

    	Category::insert([
    		'category_name_en' => $request->category_name_en,
    		'category_name_es' => $request->category_name_es,
    		'category_icon' => $request->category_icon,
    		'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
    		'category_slug_es' => strtolower(str_replace(' ','-',$request->category_name_es)),
    	]);

    	$notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );

    	return redirect()->back()->with($notification);
    }

    public function CategoryEdit($id){
    	$category = Category::findOrFail($id);
    	return view('backend.category.category_edit',compact('category'));
    }

    public function CategoryUpdate(Request $request ,$id){
    	    $category_id = $request->id;

            Category::findOrFail($id)->update([
	    		'category_name_en' => $request->category_name_en,
	    		'category_name_es' => $request->category_name_es,
	    		'category_icon' => $request->category_icon,
	    		'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
	    		'category_slug_es' => strtolower(str_replace(' ','-',$request->category_name_es)),
	    	]);

	    	$notification = array(
	            'message' => 'Category Updated Successfully',
	            'alert-type' => 'info'
	        );

	        return redirect()->route('all.category')->with($notification);
    }

    public function CategoryDelete($id){

    	$category = Category::findOrFail($id);

    	Category::findOrFail($id)->delete();

	    	$notification = array(
	            'message' => 'Category Delete Successfully',
	            'alert-type' => 'info'
	        );

	        return redirect()->back()->with($notification);
    }

}
