<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class AddressesController extends Controller
{
    public function index(){
        $addresses= Address::all();
        return view('addresses.index')->with('addresses',$addresses);
    }
     public function create(){
  
      return view('addresses.create');
    }
    public function store(Request $request){
      $address = new Address();
      $address->user_id = $request->filled('user_id') 
        ? $request->user_id
        : User::inRandomOrder()->value('id');
      $address->city = $request->city;
      $address->street = $request->street;
      $address->postal_code = $request->postal_code;
      $address->save();

      return redirect()->route('addresses.index');
   }
   public function edit($id){
    $address = Address::findOrFail($id);
    return view('addresses.edit')->with('address', $address);
   }
    public function update(Request $request,$id){
      $address = Address::findOrFail($id);
      $address->city = $request->city;
      $address->street = $request->street;
      $address->postal_code=$request->postal_code; 
      $address->save();
      return redirect()->route('addresses.index');
      }
     public function delete($id){
      $address = Address::find($id);
      $address->delete();
      return redirect()->back();
   }
}
