<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    
    public function index(){
        $orders= Order::all();
        return view('orders.index')->with('orders',$orders);
    }
    public function create(){
        
      return view('orders.create');
    }
    public function store(Request $request){
      $order = new Order();
      $order->user_id = $request->filled('	user_id') 
        ? $request->user_id
        : User::inRandomOrder()->value('id');
      $order->total_price = $request->total_price;
      $order->status = $request->status;
      $order->address_id = $request->filled('address_id') 
        ? $request->address_id 
        : Address::inRandomOrder()->value('id');
      $order->save();

      return redirect()->route('orders.index');
    }
    public function edit($id){
      $order = Order::findOrFail($id);
      return view('orders.edit')->with('order', $order);
      }
   public function update(Request $request,$id){
      $order = Order::findOrFail($id);
      $order->total_price = $request->total_price;
      $order->status = $request->status;
      $order->save();
      return redirect()->route('orders.index');
      }
     public function delete($id){
        $order= Order::find($id);
        $order->delete();
         return redirect()->back();
    }
}
