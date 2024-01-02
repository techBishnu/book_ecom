<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Order;
use App\Models\Status;
// use Barryvdh\DomPDF\PDF;
use \PDF;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Notifications\OrderNotify;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OrderFormRequest;
use Illuminate\Support\Facades\Storage;
use App\Notifications\OrderPlacedNotify;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Notification;


class OrderController extends Controller
{
    public function checkout(){
        $totalPrice=0;
        $cart=session()->get('cart',[]);
        foreach($cart as $id=> $item){
            $totalPrice +=$item['quantity']*$item['price'];
        }
        return view('frontend.checkout',compact('totalPrice'));
    }
    public function orderAdded(Request $request){
        $data = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'phone'=>'required|integer',
            'address'=>'required',
            'pincode'=>'required|integer',
            'payment_mode'=>'required',
            'order_id'=>'nullable',
            'total'=>'nullable',
            'online_res'=>'nullable'

        ]);
        $cart=session()->get('cart',[]);

        $totalOI=0;
        foreach($cart as $cartItem){
            $totalOI +=$cartItem['price']*$cartItem['quantity'];
        }
       
        $order=Order::create([
            'user_id'=>Auth::user()->id,
            'name'=>Auth::user()->name,
            'email'=>Auth::user()->email,
            'phone'=>$data['phone'],
            'address'=>$data['address'],
            'pincode'=>$data['pincode'],
            'status_message'=>'in progress',
            'payment_mode'=>$data['payment_mode'],
            'order_id'=>random_int(1000000000,9999999999999),
            'total'=>$totalOI,
        ]);
       
        if($data['payment_mode']=='COD'){
            foreach($cart as  $item){
                $orderItem=OrderItem::create([
                    'order_id'=>$order->id,
                    'book_id'=>$item['id'],
                    'quantity'=>$item['quantity'],
                    'price'=>$item['price'],
                    'total'=>$item['quantity']*$item['price'],
                    
                ]);
                    $book=Book::find($item['id']);
                    $book->quantity -=$item['quantity'];
                    $book->save();
                    session()->forget('cart');
                }
                $test['order_id']=$order->id;
                $test['title']="Order Placed";
                $test['name']=Auth::user()->name;
                $test['email']=Auth::user()->email;
                $test['phone']=$data['phone'];
                $test['address']=$data['address'];
                $test['pincode']=$data['pincode'];
                $test['status_message']='in progress';
                $test['payment_mode']=$data['payment_mode'];
                $test ['total']=$totalOI;

                Notification::route('mail', 'admin@gmail.com')->notify(new OrderNotify($data));
                Notification::send(auth()->user(), new OrderPlacedNotify($test));
        
            }
        
       
        
        if($data['payment_mode']=='ESEWA'){
            $total=$order->total;
            $orderId=$order->id;
            $pid=$order->order_id;
            
 
            return view('frontend.esewa.redirect',compact('total','pid','orderId'));
        }
        if($data['payment_mode']=='KHALTI'){
            $args = http_build_query(array(
                'return_url'=>route('verifyKhalti'),
                'website_url'=>route('index'),
                // 'amount'=>$bill['price'] * 100,
                'amount'=>10000,
                'purchase_order_id'=>$order['order_id'],
                'purchase_order_name'=>'Order',
                'customer_info'=>['email'=>$order['email'],'name' => $order['name']],
                "modes"=>[
                    "KHALTI",
                    "EBANKING",
                    "MOBILE_BANKING",
                    "CONNECT_IPS",
                    "SCT"
                ]
            ));
            $url = 'https://a.khalti.com/api/v2/'.'epayment/initiate/';
            # Make the call using API.
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
            $headers = ['Authorization: Key ba0a86e38e464a4b9372b1e07d6280b4'];//secret key
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            // payment verification end

            // Response
            $response = curl_exec($ch);
            $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            $decodedResponse = json_decode($response);

            if(isset($decodedResponse->pidx) && isset($decodedResponse->payment_url)){
                return redirect($decodedResponse->payment_url);
            }
            else{
             Alert::error('Error', 'Something Went Wrong. Try again later.');
             return redirect()->route('index');
            }
        }
        return redirect()->route('thankyou')->with('message','Your Order successfully Placed ');
    }
    public function thankyou(){
        return view ('frontend.thankyou');
    }
    public function orderList(){
        $status=Status::all();
        $order=Order::all();
       
        return view('frontend.order.order',compact('order','status'));
    }
    public function orderItemList(){
        $order=OrderItem::all();
        return view('frontend.order.orderItem',compact('order'));
    }
    // public function orderviewDelete($id){
    //     $order=Order::find($id);
    // }
    public function orderview($id){
        // $order=Order::find($id);
        $orders=Order::where('id',$id)->first();
        return view('frontend.order.orderItem',compact('orders'));

    }
    public function deleteOrderItem($id){
        $order=OrderItem::find($id);
       if($order){
           $order->delete();
           return redirect()->back()-with('message','OrderItem deleted successfully');
       }
    }
    public function statusChangeOrder(Request $request, $id){
        $order=Order::find($id);
        $order->status_message=$request->status_message;
        $order->save();
        return redirect()->back();

    }

    protected function validate_data($data , $rules){
        $common_ctrl = new CommonController();
        return $common_ctrl->validator($data,$rules);

    }
    public function filter_order(Request $request){
        $status=Status::all();
        $todayDate=Carbon::now()->format('Y-m-d');
        $order=Order::when($request->date!=null,function ($q) use($request) {
            return $q->whereDate('created_at',$request->date);
        })->when($request->status !=null,function ($q) use($request){
            return $q->where('status_message',$request->status);
        })->get();
        return view('frontend.order.order',compact('order','status'));
    }


    public function generatepdf($orderId){
        // dd($orderId);
        try {
            $order = Order::where('id', $orderId)->first();
            $this->generateOrderPdf($order);
            Alert::success('Success', 'Order PDF Generated');
            return back();
        } catch (Throwable $e) {
            Alert::error('error', 'Oops! Something Went Wrong.');
            return back();
        }
    }

    public function generateOrderPdf($createdOrder)
    {

        $logo = null;
        $order=Order::find($createdOrder->id);
        $orderProduct=OrderItem::where('order_id',$createdOrder->id)->get();
        if ($orderProduct != null) {
          

            foreach ($orderProduct as $key => $o_p) {
                $prod = Book::where('id', $o_p['book_id'])->with('media')->first();
                $o_p['thumbnai'] = '';
                if ($prod && count($prod->getMedia('book_image')) > 0) {
                    $o_p['thumbnai'] = public_path() . '/' . 'storage' . '/' . $prod->getMedia('book_image')[0]['id'] . '/' . $prod->getMedia('book_image')[0]['file_name'];
                }
            }


            if (!is_dir(storage_path() . '/app' . '/public' . '/pdf')) {
                mkdir(storage_path() . '/app' . '/public' . '/pdf');
            }
            // dd($order->order_id);
            $pdf = PDF::loadView('pdf.orderpdf', compact('order', 'orderProduct', 'logo'));
            $pdf_data = $pdf->download()->getOriginalContent();
    
            $fileName = $order->order_id . '.' . 'pdf';
            
            Storage::put('public/pdf/' . $fileName, $pdf_data);
            $get_pdf_path = public_path('storage/pdf/' . $fileName);
            $createdOrder->addMedia($get_pdf_path)->toMediaCollection('order_pdf');

        }
    }
}
