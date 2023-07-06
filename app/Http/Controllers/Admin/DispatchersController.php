<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class DispatchersController extends Controller
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

        $dispatchers = User::where('role', 2)->where('email', 'LIKE', '%'.$search.'%')->paginate(10);

        return view('admin.dispatchers', [
            'user'        => $user,
            'dispatchers'   => $dispatchers,
            'search'      => $search
        ]);
    }

    public function getDispatcher(Request $request){
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
                //get dispatcher
                $dispatcher = User::where('id', $data['id'])->where('role', 2)->first();
                
                return response()->json([
                    'status'  => 'success',
                    'dispatcher' => $dispatcher,
                ]);
            }
        }
        else{
            return response()->json([
                'status'  => 'error',
                'message' => 'Dispatcher does not exist.',
            ]);
        }
    }

    public function addDispatcher(Request $request){
    
        $user = Auth::user();
        
        if($user['role'] != 0){
            return response()->json([
                'status'  => 'error',
                "message" => 'Operation is not allowed.'
            ]);
        }

        $data = $request->except('_token');
        
        $rules = [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone'      => ['required', new Phone($data['phone'])],
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
                $user->password     = Hash::make($data['password']);
                $user->phone        = $data['phone'];
                $user->role         = 2;
                $user->first_name   = '';
                $user->last_name    = '';
        
                $user->save();
        
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Dispatcher successfully updated.',
                    'dispatcher' => $user
                ]);
            }
        }
        else{
            $user = User::where('email', $data['email'])->first();
        
            if($user != null){
                return response()->json([
                    'status'  => 'error',
                    "message" => 'Email already exist.'
                ]);
            }
            $user=User::create([
                'email'      => $data['email'],
                'password'   => Hash::make($data['password']),
                'role'       => 2,
                'phone'      => $data['phone'],
                'first_name' => '',
                'last_name'  => ''
            ]);

            if ($user) {
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Added successfully.',
                    'dispatcher' => $user
                ]);
            }

            return response()->json([
                'status'  => 'error',
                'message' => 'Added failed.',
            ]);
        }
        
    }

    public function deleteDispatcher(Request $request){
    
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
                
                $dispatcher = User::where('id', $data['id'])->first();
                $dispatcher->delete();

                return response()->json([
                    'status'  => 'success',
                    'message' => 'Deleted successfully.',
                    'dispatcher_id' => $dispatcher->id,
                ]);
            }
        }
        else{
            return response()->json([
                'status'  => 'error',
                'message' => 'Select dispatcher correctly.',
            ]);
        }
    }
}
