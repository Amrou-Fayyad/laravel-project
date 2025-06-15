<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class Order_itemsController extends Controller
{
   public function index(){
    $items = OrderItem::all();
    return view('order_items.index')->with('items',$items);
   }
   public function create(){
      
      return view('order_items.create');
   }
   public function store(Request $request){
      $item = new OrderItem();
      $item->order_id = $request->filled('order_id') 
        ? $request->order_id
        : Order::inRandomOrder()->value('id');
        $item->product_id = $request->filled('product_id') 
        ? $request->product_id 
        : Product::inRandomOrder()->value('id');
      $item->quantity = $request->quantity;
      $item->price = $request->filled('price') ? $request->price : rand(10, 500);
      $item->save();

      return redirect()->route('order_items.index');
   }
   public function edit($id){
      $item = OrderItem::findOrFail($id);
      return view('order_items.edit')->with('item', $item);
   }
   public function update(Request $request,$id){
      $item = OrderItem::findOrFail($id);
      $item->quantity = $request->quantity; 
      $item->save(); 
      return redirect()->route('order_items.index');
      }
   public function delete($id){
      $items = OrderItem::find($id);
      $items->delete();
      return redirect()->back();
   }
}
