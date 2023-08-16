@component('mail::message')
<p>Dear Sir/Maam,<br>A query has been received from {{$name}}. Details of the query is as shown below:</p>
<br>
@if($name!=null || $name!="")
<b>Name :</b> {{$name}} <br>
@endif
@if($email!=null || $email!="")
<b>Email :</b> {{$email}} <br>
@endif
@if($phone!=null || $phone!="")
<b>Phone Number :</b> {{$phone}} <br>
@endif
@if($pincode!=null || $pincode!="")
<b>Pincode :</b> {{$pincode}} <br>
@endif
@if($status_message!=null || $status_message!="")
<b>status message :</b> {{$status_message}} <br>
@endif
@if($payment_mode!=null || $payment_mode!="")
<b>Payment Mode :</b> {{$payment_mode}} <br>
@endif


<br>
<br>
Regards, <br />
Library ManageMent System
<br>
<br>
Thank you for using our application!
<br>
<span><strong>This is an auto-generated email. Please do not reply to this email. We will shortly get back to you.</strong></span>
@endcomponent