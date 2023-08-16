<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userProfile(){
        $userDetail=UserDetail::where('user_id',Auth::id())->first();
        return view('frontend.about.user',compact('userDetail'));
    }
    public function userProfileUpdate(Request $request){
        $data=$request->all();
        $user=User::find(Auth::id());
        $user->update(['name'=>$request->name]);
        $user->userDetail()->updateOrCreate([
                    'phone'=>$data['phone'],
                    'pincode'=>$data['pincode'],
                    'address'=>$data['address'],
                    'user_id'=>Auth::user()->id,
        ]);
           return redirect()->back()->with('message','Your Information Added Successfully');


        // $updated_test = Arr::except($data, ['_token','name','email']);
        // // $updated_test['user_id']=Auth::id();
        // $userDetails=UserDetail::where('user_id',Auth::id())->first();
                    
        //     if ($userDetails !== null) {
        //         $userDetails=UserDetail::where('user_id',Auth::id())->first()->update($updated_test);
        //         return redirect()->back()->with('message','Your Information Updated Successfully');
        //     } else {
        //         $userDetails = UserDetail::create([
        //             'phone'=>$data['phone'],
        //             'pincode'=>$data['pincode'],
        //             'address'=>$data['address'],
        //             'user_id'=>Auth::user()->id,
        //         ]);

        //             return redirect()->back()->with('message','Your Information Added Successfully');
                //         }
        }
        public function changepassword(){
            return view('frontend.about.changePassword');
        }
        public function updatePassword(Request $request){
            $request->validate([
                'current_password'=>'required|string|min:8',
                'password'=>'required|string|min:8|confirmed',
            ]);
            $currentPassword=Hash::check($request->current_password,Auth::user()->password);
            if($currentPassword){
                User::find(Auth::id())->update([
                    'password'=>Hash::make($request->password),
                ]);
                return redirect()->route('userProfile')->with('message','The password Changed ');
            }
            else{
                return redirect()->back()->with('message','The password Does not match ');

            }
        }
}

