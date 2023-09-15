
<style>
    /* @import url("https://fonts.googleapis.com/css?family=Roboto:400,500,700");
    @import url("./../icons/simple-line-icons/css/simple-line-icons.css");
    @import url("./../icons/font-awesome-old/css/font-awesome.min.css"); */
    body {
      font-family: 'Roboto', sans-serif;
      font-size:16px;
    }
    
    </style>
    
    
    <div class="container-fluid">
    <div class="row" style="margin-bottom:75px;">
    
    {{-- <img src="{{$logo!=null && $logo!=''?$logo:'frontend/images/item-cart-05.png'}}" class="img-responsive" alt="pdf-image" width="110px;"> --}}
    
    <div class="content" style="float:right;">
    <h3>Contact Details<h3>
    <li style="list-style:none; font-size:15px;color:#a0191e !important;">IKBH GROUP PVT LTD</li>
    <li style="list-style:none; font-size:13px;">Sitapaila,Kathmandu,Nepal</li>
    <li style="list-style:none; font-size:13px;">01-5300700,(+977) 9801666001</li>
    <li style="list-style:none; font-size:13px;">info@ikbhgroup.com.np</li>
    
    </div>
    </div>
    
    </div>
    
    <div class="d-flex bd-highlight" style="margin-bottom:20px;margin-top:25px;">
      <div class="flex-fill bd-highlight" style="font-size:16px;"> Order Id : <b>{{ $order->order_id }} </b></div>
      <div class="flex-fill bd-highlight"style="font-size:16px;">Order Status : <b> {{ $order->status_message }} </b> </div>
      <div class="flex-fill bd-highlight"style="font-size:16px;"> Mode of Payment : <b>{{ ucwords($order->payment_mode) }}  </b> </div>
    </div>
       
     
              
                    <table class="table table-bordered table-shopping-cart text-center" style="margin-bottom:26px; border:1px solid #eaeaea!important; width:100%!important; padding:12px!important;">
                            <tr class="table_head" style="border-bottom:1px solid #eaeaea!important; padding-bottom:10px!important;">
                                <th>Image</th>
                                <th>Book</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            @foreach ($orderProduct as $product)
                            <tr class="table_row" style="text-align:center; border-bottom:1px solid #eaeaea!imprtant; margin-top:8px; margin-bottom:8px;">
                                <td><img width="65"  style="margin-top:12px; margin-bottom:8px;" src="{{ $product->thumbnai }}" /></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td> @php echo($product->price*$product->quantity) @endphp
                                </td>
    
                            </tr>
                            @endforeach
                        </table>
                  
                <div class="row mb-3 mt-5">
                    {{-- <div class="col-md-3 ">
                        Shipping Address : 
                       <b> {{ $order->shipping_address }}</b>
                    </div>
                    <div class="col-md-3">
                        Shipping Cost : 
                       <b> {{ config('app.currency') }} @if($order->shipping_cost==null) 0 @else {{ $order->shipping_cost }}
    
                           @endif
                        </b>
                    </div> --}}
                    {{-- <div class="col-md-3">
                        Coupons Applied : 
                       <b>  @if(count($coupons)>0)
                            @foreach($coupons as $appliedCoupon)
                            {{$appliedCoupon->code}} || {{$appliedCoupon->discount_type=='Flat'?config('app.currency').' '.$appliedCoupon->discount. ' ' .'off':$appliedCoupon->discount.' '.'%'.' off'}}
                            @if(!$loop->last)
                            ,
                            @endif
                            @endforeach
                        @else
                        N/A
                        @endif</b>
                    </div> --}}
                    <div class="col-md-3">
                        Total : 
                       <b>  {{ $order->total }}</b>
                    </div>
                </div>
                <div class="row mb-2 mt-4">
                    <div class="col-md-12 fs-13">
                        <h4>Order Status History</h4>
                    </div>
                    {{-- @foreach($order['history'] as $hKey=> $history)
                    <div class="col-md-12 fs-13 p-2">
                        <b>{{$hKey+1}}.</b> <b>{{$history->payment_status}}</b> on
                        <b>{{Carbon\Carbon::parse($history->created_at)->toDateString()}}</b>. @if($history->remarks!=null)
                                                    <br>
                     <b>[ Remarks: </b> {{$history->remarks}} ]
                                                    @endif
                    </div>
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>
    </div>
    