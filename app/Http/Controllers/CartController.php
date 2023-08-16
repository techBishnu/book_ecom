<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class CartController extends Controller
{
    public function addToCart(Request $request, $id){
        $cart=session()->get('cart',[]);
       
      
        
        $book=Book::find($id);
        if($book->quantity>0){
        $quantity=$request->input('quantity',1);
        if(isset($cart[$id])){
            $cart[$id]['quantity'] +=$quantity;
        }
        else{
            $cart[$id]=[
                'id'=>$id,
                'name'=>$book->name,
                'price'=>$book->price,
                'quantity'=>$quantity,
                'url'=>route('product_detail',$book->slug),
                'image'=>$book->getFirstMediaUrl('book_image')
            ];
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('message','Cart Added Successfully');
    }else{
        return redirect()->back()->with('message','Item Has Out Of Stock');

    }
    }
    public function getcart(){
        $cart=session()->get('cart',[]);
        return view('frontend.cart.cart',compact('cart'));
    }
    public function updateToCart(Request $request,$id){
        //  $data=$request->all();
   
      $cart=session()->get('cart',[]);
     
        //  if($id=$cart[$id]['id'])
        //  $cart[$id]['quantity']=$request->quantity;
        //     session()->put('cart',$cart);   
        //     return redirect()->back()->with('message','Cart Updated Successfully');

        $id=$cart[$id]['id'];

      
        if(isset($id)){
            // dd($cart[$id]);
            $cart[$id]['quantity']=$request->input('quantity');
            $bookQuantity=$this->getBookQuantity($id);
            if($cart[$id]['quantity']>$bookQuantity){
                $cart[$id]['quantity']=$bookQuantity;
                session()->put('cart',$cart);
                return redirect()->back()->with('message',' Only we have ,Out of Stock')->with('bookQuantity',$bookQuantity);
            }
            session()->put('cart',$cart);
            return redirect()->back()->with('message','Cart Updated Successfully');
        }
    }
    public function getBookQuantity($id){
        $book=Book::find($id);
        if($book){
            return $book->quantity;
        }
        else{
            return null;
        }
    }
    public function cartdelete($id){
        $cart=session()->get('cart',[]);
        unset($cart[$id]);
        session()->put('cart',$cart);
        return redirect()->back()->with('message','Cart Removed Successfully');

    }
    
    
}
