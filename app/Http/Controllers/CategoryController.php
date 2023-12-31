<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
 use App\Models\Category;
 use App\Models\Subcategory;
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
        $edit_data = Category::where('is_deleted',0)->find($id);
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





    public function SubCategoryIndex(Request $request)
    {
        $listdata = Subcategory::where('is_deleted',0)->get();
        return view('subcategory.index',compact('listdata'));
    }
    public function SubCategoryAdd(Request $request)
    {
        $category = Category::where('is_deleted',0)->get();
        return view('subcategory.add',compact('category'));
    }
    public function SubCategoryStore(Request $request)
    {
        $sub = new Subcategory;
        $sub->sub_category_name = $request->sub_category_name;
        $sub->category_id = $request->category_id;
        $sub->is_deleted = 0;
        $sub->created_by = Auth::user()->id;
        $sub->save();
        return redirect()->route('subcategory')->with('success','SubCategory has been created successfully.');
    }
    public function SubCategoryEdit($id)
    {
        $category = Category::where('is_deleted',0)->get();
        $edit_data = Subcategory::where('is_deleted',0)->find($id);
         return view('subcategory.edit',compact('edit_data','category'));
    }
    public function SubCategoryUpdate(Request $request,$id)
    {
        // dd($request->all());
        Subcategory::find($id)->update(['sub_category_name' => $request->sub_category_name,'category_id'=>$request->category_id,'updated_by'=>Auth::user()->id]);
         return redirect()->route('subcategory')->with('success','SubCategory Has Been updated successfully');
    }
    public function SubCategoryDelete($id)
    {
        Subcategory::find($id)->update(['is_deleted'=>1]);
        return redirect()->route('subcategory')->with('success','SubCategory has been deleted successfully');
    }
}
