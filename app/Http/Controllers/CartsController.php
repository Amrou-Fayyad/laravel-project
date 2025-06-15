<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function index(){
        $carts= Cart::all();
        return view('carts.index')->with('carts',$carts);
    }
    public function delete($id){
      $cart = Cart::find($id);
      $cart->delete();
      return redirect()->back();
   }
    }
       
