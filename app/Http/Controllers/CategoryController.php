<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
 
class CategoryController extends Controller
{
    public function CategoryIndex(Request $request)
    {
        return view('category.index');
    }
    public function CategoryAdd(Request $request)
    {
        return view('category.add');
    }
    public function CategoryStore(Request $request)
    {
        $input = $request->all();
        Category::create($input);
        return redirect()->route('category')->with('success','Category has been created successfully.');
    }
}
