<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


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
    protected $redirectTo = 'admin/customers';

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    public function index()
    {
        return view('auth.login');
    }  

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $role = $request->input('role');
        
        $credentials = $request->only('email', 'password');
        
        $uuser = User::where('email', $credentials['email'])->first();
        if(!$uuser){
            return redirect("login")->with([
                'status'  => 'error',
                'message' => 'User does not exist.',
            ]);
        }
        
        if($uuser->role != $role *1){
            return redirect("login")->with([
                'status'  => 'error',
                'message' => 'Operation is not allowed.',
            ]);
        }
        
        if (Auth::attempt($credentials)) {
            $user=Auth::user();
            switch($user['role']){
                case 0:
                    return redirect()->route('admin.author_users')->with([
                        'status'  => 'success',
                        'message' => 'User successfully logged in.',
                    ]);
                case 1:
                    return redirect()->route('customer.dashboard')->with([
                        'status'  => 'success',
                        'message' => 'User successfully logged in.',
                    ]);
                default:
                    return redirect()->route('dispatcher.author_users')->with([
                        'status'  => 'success',
                        'message' => 'User successfully logged in.',
                    ]);
            }
        }
  
        return redirect("login")->with([
            'status'  => 'error',
            'message' => 'Login are not valid.',
        ]);
    }

    public function logout(){
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }
}
