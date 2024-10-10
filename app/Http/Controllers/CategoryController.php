<?php

namespace App\Http\Controllers;

use FFI\CType;
use Illuminate\Http\Request;
use  App\Models\Category;

class CategoryController extends Controller
{
    //
    public function add()
    {

        $cat = Category::where('id' , 2)->first();
        dd( $cat);
        return view('category', compact('cat'));
    }

    public function addCategory(Request $request)
    {

        $cat = new Category();
        $cat->title = $request->title;
        $cat->status = $request->status;
        $cat->save();

        return back()->with('success', 'Product added successfully!');
    }
}
