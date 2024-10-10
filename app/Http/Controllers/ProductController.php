<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcat;
use App\Models\Product;

class ProductController extends Controller
{
    public function productview(){
        $cat = Category::where('status','=', 1)->get();

        $subCategory = Subcat::all();
        $product = Product::all();
        return view('product' ,compact('cat','subCategory','product'));
    }

    public function index(){
    
        return view('dashboard');
    }
    
    public function getSubcategories($category_id) {
   
    $subcategories = Subcat::where('category_id', $category_id)->get();
    return response()->json($subcategories);
    }

    public function productadd(Request $request){
        // Validate the request data
       
    
        // Create and save the product
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->subcat_id = $request->sub_cats_id;
        $product->title = $request->title;
        $product->discription = $request->discription;
        $product->save();
    
        // Return response (redirect or success message)
        return back()->with('success', 'Product added successfully!');
    }
    
}
