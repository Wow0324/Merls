<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Rules\Phone;
use App\Models\AuthorUsersList;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class AddAuthorUserController extends Controller
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
        
        if($user == null || $user['role'] != 1){
            return redirect()->route('customer.signup3')->with([
                'status'  => 'error',
                "message" => 'Operation is not allowed.'
            ]);
        }

        return view('customer.add_author_user');
    }

    public function addAuthorUser(Request $request){
        
        $user = Auth::user();
        
        if($user['role'] != 1){
            return redirect()->route('customer.signup3')->with([
                'status'  => 'error',
                "message" => 'Operation is not allowed.'
            ]);
        }
        
        $data = $request->except('_token');
        
        $rules = [
            'name'  => ['required', 'string', 'max:255'],
            'phone' => ['required', new Phone($data['phone'])],
        ];

        $v = Validator::make($data, $rules);

        if ($v->fails()) {
            return redirect()->route('customer.signup3')->with([
                'status'  => 'error',
                "message" => 'Name or phone validation failed.'
            ]);
        }
        
        $old_author = AuthorUsersList::where('name', $data['name'])->first();
        if($old_author != null){
            return redirect()->route('customer.signup3')->with([
                'status'  => 'error',
                "message" => 'Authorized user already registered.'
            ]);
        }

        $author=AuthorUsersList::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'user_id' => $user->id,
        ]);

        if ($author) {
            if($data['more'] == "0"){
                return redirect()->route('customer.dashboard')->with([
                    'status'  => 'success',
                    'message' => 'Added successfully.',
                ]);
            }
            else{
                return redirect()->route('customer.signup3')->with([
                    'status'  => 'success',
                    'message' => 'Added successfully.',
                ]);
            }
            
        }

        return redirect()->route('customer.signup3')->with([
            'status'  => 'error',
            'message' => 'Added failed.',
        ]);
    }
}
