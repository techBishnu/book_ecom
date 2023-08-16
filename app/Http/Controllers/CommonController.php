<?php
namespace App\Http\Controllers;
use Validator;

class CommonController extends Controller{

    public function validator($data, $rules)
    {
        
        
        $validate = Validator::make($data, $rules);
        $error_messages = $validate->errors()->first();
        if($validate->fails()){
            return [
                'error_message' => $error_messages,
                'response' => false
            ];
        }
        else{
            return [
                'error_message' => $error_messages,
                'response' => true
            ];
        }
    }
}
