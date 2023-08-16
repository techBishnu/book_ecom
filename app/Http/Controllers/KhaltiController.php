<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KhaltiController extends Controller
{
    public function verifyKhalti(Request $request)
    {
        $data = $request->all();    
        // $bill = \App\Models\Bill::where('unique_bill_id',$data['purchase_order_id'])->first();
        if(array_key_exists('message',$data)){
            Alert::error('Error', $data['message']);
            return redirect()->route('welcome');
        }else{

        
        // $user=Auth::user();
      
        // $paymentMethod = PaymentGateway::where('name', 'khalti')->first();

        $args = http_build_query(array(
            'pidx' => $data['pidx'],
        ));

        $url = 'https://a.khalti.com/api/v2/'.'epayment/lookup/';

        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $headers = ['Authorization: Key ba0a86e38e464a4b9372b1e07d6280b4'];//SECRET_KEY
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // payment verification end

        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $decodedResponse = json_decode($response);
        if ($decodedResponse->status == 'Completed') {
            // $bill->update([
            //     'status' => 'Paid',
            //     'gateway_response' => $response
            // ]);
            Alert::success('Successful','Payment Success');
            return redirect()->route('homepage');
        } else {
            // $bill->update([
            //     'status' => 'Unpaid'
            // ]);
            Alert::error('Error', 'Something Went Wrong. Try again later.');
            return redirect()->route('homepage');
            
        }
    }
    }
}
