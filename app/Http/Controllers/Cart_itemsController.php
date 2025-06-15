<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class Cart_itemsController extends Controller
{
   public function index(){
        $items= CartItem::all();
        return view('cart_items.index')->with('items',$items);
    }
    public function create(){
   
      return view('cart_items.create');
    }
    public function store(Request $request){
      $item = new CartItem();
      $item->cart_id = $request->filled('cart_id') 
        ? $request->cart_id
        : Cart::inRandomOrder()->value('id');
        $item->product_id = $request->filled('product_id') 
        ? $request->product_id 
        : Product::inRandomOrder()->value('id');
      $item->quantity = $request->quantity;
      $item->save();

      return redirect()->route('cart_items.index');
   }
   public function edit($id){
    $item = CartItem::findOrFail($id);
    return view('cart_items.edit')->with('item', $item);
   }
     public function update(Request $request,$id){
      $item = CartItem::findOrFail($id);;
      $item->quantity=$request->quantity; 
      $item->save();
      return redirect()->route('cart_items.index');
      }
   public function delete($id){
      $items = CartItem::find($id);
        $items->delete();
      return redirect()->back();
   }
}
