<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Slider;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function book_listAjax(){
     
    $book=Book::select('name')->get();
    $data=[];
    foreach ($book as $item) {
        $data[]=$item['name'];
    }
    return $data;
   
    }
    public function search_book(Request $request){
        // dd($request->search);
       
        if($request->search != ''){
             $book = Book::where('name','LIKE','%'.$request->search.'%')->get();
           
             return view('frontend.searchbook',compact('book'));
            }
            else{
                return redirect()->route('search_book')->with('message','Book Not Found');
            }
        
            
    
    }
    public function categorysearch(Request $request){
 

        $book=Book::where('category_id',$request->category_id)->get();
        return view('frontend.categorydetail',compact('book'));

    }
    public function index(){
        $slider=Slider::where('status','0')->get();
        $book=Book::where('special','1')->latest()->get();

        return view('frontend.index',compact('slider','book'));
    }
    public function productdetail($slug){
        
        $book=Book::where('slug',$slug)->with('category')->first();
        // dd($book);
      
        return view('frontend.productdetails',compact('book'));


    }
    public function new_arrival(){
        $book=Book::where('status','Recent')->get();
        return view('frontend.new_arrival',compact('book'));
    }
    public function new_trending(){
        $book=Book::where('status','Trending')->get();
        return view('frontend.new_trending',compact('book'));
    }
    public function slider(){
        $slider=Slider::all();
        return view('frontend.slider',compact('slider'));
    }

    public function books(){
        $book=Book::latest()->get();
        $category=Category::all();
        return view('frontend.books',compact('book','category'));

    }
    public function best_selling(){
       
        $books_arr=[];
        $books=Book::all();
       foreach($books as $book){

        $count=0;
        $orders=OrderItem::where('book_id',$book['id'])->get();
        // dd($orders);
        
            foreach($orders as $order){
                $count =$count +$order['quantity'];
            }
            if($count>10){
                // foreach($order as $key=>$item){
                array_push($books_arr,$book);
                }
                // dd($book_ar);
        }
        return view('frontend.bestselling',compact('books_arr'));
    }
    public function aboutUs(){
        return view('frontend.about.aboutUs');
    }

}
       
    
        
       
   
       
    
    


