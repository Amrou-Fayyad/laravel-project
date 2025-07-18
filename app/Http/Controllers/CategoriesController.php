<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
    $categories= Category::all();
    return view('categories.index')->with('categories', $categories);
    }
    public function create(){
    
    return view('categories.create');
    }
     public function store(Request $request){
      $category = new Category();
      $category->name = $request->name;
      $category->save();

      return redirect()->route('categories.index');
   }
   public function edit($id){
      $category = Category::findOrFail($id);
      return view('categories.edit')->with('category', $category);
   }
   public function update(Request $request,$id){
      $category = Category::findOrFail($id);
      $category->name=$request->name; 
      $category->save();
      return redirect()->route('categories.index');
   }
     public function delete($id){
      $categories = Category::find($id);
      $categories->delete();
      return redirect()->back();
   }
}
