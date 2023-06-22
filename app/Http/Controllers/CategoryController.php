<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
 use App\Models\Category;
 use Auth;
class CategoryController extends Controller
{
    public function CategoryIndex(Request $request)
    {
        $listdata = Category::where('is_deleted',0)->get();
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
        $product->created_by = Auth::user()->id;
        $product->save();
        return redirect()->route('category')->with('success','Category has been created successfully.');
    }
    public function CategoryEdit($id)
    {
        $edit_data = Category::find($id);
         return view('category.edit',compact('edit_data'));
    }
    public function CategoryUpdate(Request $request,$id)
    {
        Category::find($id)->update(['category_name' => $request->category_name,'updated_by'=>Auth::user()->id]);
         return redirect()->route('category')->with('success','Category Has Been updated successfully');
    }
    public function CategoryDelete($id)
    {
        Category::find($id)->update(['is_deleted'=>1]);
        return redirect()->route('category')->with('success','Category has been deleted successfully');
    }
}
