<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index(){
        $reviews = Review::all();
        return view('reviews.index')->with('reviews',$reviews);
    }
    public function create(){
      
      return view('reviews.create');
    }
    public function store(Request $request){
      $review = new Review();
      $review->user_id = $request->filled('	user_id') 
        ? $request->user_id
        : User::inRandomOrder()->value('id');
      $review->product_id = $request->filled('product_id') 
        ? $request->product_id 
        : Product::inRandomOrder()->value('id');
      $review->rating = $request->filled('rating') ? $request->rating : rand(1, 10);
      $review->comment = $request->comment;
      
      $review->save();

      return redirect()->route('reviews.index');
   }
    public function edit($id){
      $review = Review::findOrFail($id);
      return view('reviews.edit')->with('review', $review);
    }
    public function update(Request $request,$id){
      $review = Review::findOrFail($id);
      $review->comment=$request->comment; 
      $review->save();
      return redirect()->route('reviews.index');
      }
     public function delete($id){
        $review= Review::find($id);
        $review->delete();
         return redirect()->back();
    }
}
