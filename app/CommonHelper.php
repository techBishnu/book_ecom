<?php

$validator = validator(request()->all, [
            'name'=>'required|string',
            'email'=>'required|string',
            'phone'=>'required|integer',
            'address'=>'required',
            'pincode'=>'required|integer',
]);
