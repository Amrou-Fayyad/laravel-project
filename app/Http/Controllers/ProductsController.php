<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $products= Product::all();
         return view('products.index')->with('products',$products);
    }
     public function create(){
    
      return view("products.create");
    }
    public function store(Request $request){
      $product = new Product();
      $product->name = $request->name;
      $product->description = $request->description;
      $product->price = $request->filled('price') ? $request->price : rand(10, 500);
      $product->stock = $request->filled('stock') ? $request->stock : rand(1, 100);
      $product->category_id = $request->filled('category_id') 
        ? $request->category_id 
        : Category::inRandomOrder()->value('id');
      $product->save();

      return redirect()->route('products.index');
    }
    public function edit($id){
      $product = Product::findOrFail($id);
      return view('products.edit')->with('product', $product);
    }
   public function update(Request $request,$id){
      $product = Product::findOrFail($id);
      $product->name = $request->name;
      $product->description = $request->description;
      $product->save();
      return redirect()->route('products.index');

      }
    public function delete($id){
        $product= Product::find($id);
        $product->delete();
         return redirect()->back();
    }
}