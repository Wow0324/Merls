<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\Phone;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * update profile
     *
     * @return JsonResponse
     */
    public function updateProfile(Request $request) : JsonResponse
    {
        $data = $request->except('_token');
        
        $user = Auth::user();

        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone'      => ['required', new Phone($data['phone'])],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'zipcode' => ['required', 'string'],
        ];

        if($user->role == 1){
            if($data['password'] == '' || $data['password_confirmation'] == ''){
                $rules = [
                    'first_name' => ['required', 'string', 'max:255'],
                    'last_name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'phone'      => ['required', new Phone($data['phone'])],
                    'address' => ['required', 'string'],
                    'city' => ['required', 'string'],
                    'state' => ['required', 'string'],
                    'zipcode' => ['required', 'string'],
                ];  
            }
        }

        $v = Validator::make($data, $rules);

        if ($v->fails()) {
            return response()->json([
                'status'  => 'error',
                'message' => $v->errors()
            ]);
        }
        
        $user = User::where('email', $data['email'])->first();
        
        if($user == null){
            return response()->json([
                'status'  => 'error',
                "message" => 'User does not exist.'
            ]);
        }
        
        $user->email        = $data['email'];
        $user->first_name   = $data['first_name'];
        $user->last_name    = $data['last_name'];
        if($data['password'] != '' && $data['password'] == $data['password_confirmation']){
            $user->password     = Hash::make($data['password']);
        }
        $user->phone        = $data['phone'];
        $user->address      = $data['address'];
        $user->city         = $data['city'];
        $user->state        = $data['state'];
        $user->zipcode      = $data['zipcode'];
        $user->role         = 1;

        $user->save();

        return response()->json([
            'status'  => 'success',
            'message' => 'User successfully updated.',
        ]);
    }
}
