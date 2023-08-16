<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Esewa</title>
</head>
<body>
        <form action="https://uat.esewa.com.np/epay/main" id="esewa-form" name="esewa_load" method="POST">
            <input value="{{ $total }}" name="tAmt" type="hidden">
            <input value="{{ $total }}" name="amt" type="hidden">
            <input value="0" name="txAmt" type="hidden">
            <input value="0" name="psc" type="hidden">
            <input value="0" name="pdc" type="hidden">
            <input value="EPAYTEST" name="scd" type="hidden">
            <input value="{{ $pid }}" name="pid" type="hidden">
            <input value="{{ route('esewaSuccess') }}" type="hidden" name="su">
            <input value="{{ route('esewaFailure',$orderId) }}" type="hidden" name="fu">
        </form>
        <script>
                 window.onload = function(){
                    document.forms['esewa_load'].submit();
                 }
        </script>
</body>
</html>