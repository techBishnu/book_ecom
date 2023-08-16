<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
//  protected function authenticated()
// {
    

//     if(Auth::user()->userType=='1'){
//         return redirect('/admin/home')->with('status','Wecome to Admin');
//     }
//     else{
//         // $count=Cart::user()->where('email',Auth::user()->email)->count();
//         return redirect('/home')->with('status','Wecome to User');

//     }
// }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function authenticated(){
        $user=Auth::user();
        if($user->hasAnyRole(['Admin'])){
            return redirect('/admin/home')->with('status','Wecome to Admin');
        }
      
             return redirect('/home')->with('status','Wecome to User');

        
       
    }

    
}
