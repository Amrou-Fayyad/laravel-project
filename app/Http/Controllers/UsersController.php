<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index')->with('users', $users);
    }
     public function create(){

      return view("users.create");

   }
    public function store(Request $request){
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->role = $request->role;
      $user->save();

      return redirect()->route('users.index');
   }
   public function edit($id){
      $user = User::findOrFail($id);
      return view('users.edit')->with('user', $user);
    }
    public function update(Request $request,$id){
      $user = User::findOrFail($id);
      $user->name=$request->name;
      $user->email = $request->email;
      $user->role = $request->role;
      $user->save();
      return redirect()->route('users.index');

      }
    public function delete($id){
        $user = User::find($id);
        $user->delete();
         return redirect()->back();
    }
 }
