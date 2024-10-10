<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcat;
use App\Models\Product;

class SubCatController extends Controller{

    public function addsubcat(){
        $cat = Category::where('status','=', 1)->get();

        $subCategory = Subcat::all();
        return view('subcat' ,compact('cat','subCategory'));
    }

    public function storesubcat(request $request){
       
        $subcat = new Subcat();
        $subcat->category_id = $request->category_id;
        $subcat->title = $request->title;
        $subcat->status = $request->status;
        $subcat->save();
        
        return back()->with('success', 'Product added successfully!');
       }
    }