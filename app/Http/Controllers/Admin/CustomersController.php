<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class CustomersController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if($user == null || $user['role'] != 0){
            return redirect()->route('login')->with([
                'status'  => 'error',
                "message" => 'Operation is not allowed.'
            ]);
        }

        $search = request('search');
        if($search == null) $search = '';

        $customers = User::where('role', 1)->where('email', 'LIKE', '%'.$search.'%')->paginate(10);

        return view('admin.customers', [
            'user'        => $user,
            'customers'   => $customers,
            'search'      => $search
        ]);
    }

    public function getCustomer(Request $request){
        $user = Auth::user();
        
        if($user['role'] != 0){
            return response()->json([
                'status'  => 'error',
                "message" => 'Operation is not allowed.'
            ]);
        }

        $data = $request->except('_token');
        if($request->has('customer_id')){
            if($data['customer_id'] > 0){
                //get customer
                $customer = User::where('id', $data['customer_id'])->where('role', 1)->first();
                
                return response()->json([
                    'status'  => 'success',
                    'customer' => $customer,
                ]);
            }
        }
        else{
            return response()->json([
                'status'  => 'error',
                'message' => 'Customer does not exist.',
            ]);
        }
    }

    public function addCustomer(Request $request){
    
        $user = Auth::user();
        
        if($user['role'] != 0){
            return response()->json([
                'status'  => 'error',
                "message" => 'Operation is not allowed.'
            ]);
        }

        $data = $request->except('_token');
        
        $rules = [
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone'      => ['required', new Phone($data['phone'])],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'zipcode' => ['required', 'string'],
        ];

        $v = Validator::make($data, $rules);

        if ($v->fails()) {
            return response()->json([
                'status'  => 'error',
                "message" => 'Validation failed.'
            ]);
        }
        
        if($request->has('id')){
            if($data['id'] > 0){
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
                $user->password     = Hash::make($data['password']);
                $user->phone        = $data['phone'];
                $user->address      = $data['address'];
                $user->city         = $data['city'];
                $user->state        = $data['state'];
                $user->zipcode      = $data['zipcode'];
                $user->role         = 1;
        
                $user->save();
        
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Customer successfully updated.',
                    'customer' => $user
                ]);
            }
        }
        else{
            $user = User::where('email', $data['email'])->first();
        
            if($user != null){
                return response()->json([
                    'status'  => 'error',
                    "message" => 'Customer already exist.'
                ]);
            }
            $user=User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 1,
                'phone' => $data['phone'],
                'address' => $data['address'],
                'city' => $data['city'],
                'state' => $data['state'],
                'zipcode' => $data['zipcode'],
            ]);

            if ($user) {
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Added successfully.',
                ]);
            }

            return response()->json([
                'status'  => 'error',
                'message' => 'Added failed.',
            ]);
        }
        
    }

    public function deleteCustomer(Request $request){
    
        $user = Auth::user();
        
        if($user['role'] != 0){
            return response()->json([
                'status'  => 'error',
                "message" => 'Operation is not allowed.'
            ]);
        }

        $data = $request->except('_token');

        if ($data['verify'] != 'DELETE') {
            return response()->json([
                'status'  => 'error',
                "message" => 'Type DELETE and click the delete button.'
            ]);
        }

        if($request->has('id')){
            if($data['id'] > 0){
                
                $customer = User::where('id', $data['id'])->first();
                $customer->delete();

                return response()->json([
                    'status'  => 'success',
                    'message' => 'Deleted successfully.',
                    'customer_id' => $customer->id,
                ]);
            }
        }
        else{
            return response()->json([
                'status'  => 'error',
                'message' => 'Select customer correctly.',
            ]);
        }
    }

    public function approveCustomer(Request $request){
        
        $user = Auth::user();
        
        if($user['role'] != 0){
            return response()->json([
                'status'  => 'error',
                "message" => 'Operation is not allowed.'
            ]);
        }

        $data = $request->except('_token');

        if($request->has('id')){
            if($data['id'] > 0){
                //edit property
                $customer = User::where('id', $data['id'])->first();
                $customer->status = $data['approve'];
                $customer->save();
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Changed status successfully.',
                    'customer_id' => $customer->id,
                    'customer_status' => $data['approve'],
                ]);
            }
        }
        else{
            return response()->json([
                'status'  => 'error',
                'message' => 'Select customer correctly.',
            ]);
        }
    }

}
