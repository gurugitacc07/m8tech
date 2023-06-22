<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
 use App\Models\Category;
class CategoryController extends Controller
{
    public function CategoryIndex(Request $request)
    {
        $listdata = Category::get();
        return view('category.index',compact('listdata'));
    }
    public function CategoryAdd(Request $request)
    {
        return view('category.add');
    }
    public function CategoryStore(Request $request)
    {
        $product = new Category;
        $product->category_name = $request->category_name;
        $product->is_deleted = 0;
        $product->save();
        return redirect()->route('category')->with('success','Category has been created successfully.');
    }
    public function CategoryEdit($id)
    {
        $edit_data = Category::find($id);
         return view('category.edit',compact('edit_data'));
    }
}
