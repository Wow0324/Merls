<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\PropertyList;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddPropertyController extends Controller
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
        
        return view('customer.add_property');
    }

    public function addProperty(Request $request){
        
        $user = Auth::user();
        
        if($user['role'] != 1){
            return redirect()->route('customer.signup3')->with([
                'status'  => 'error',
                "message" => 'Operation is not allowed.'
            ]);
        }

        $data = $request->except('_token');
        
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
        ];

        $v = Validator::make($data, $rules);

        if ($v->fails()) {
            return redirect()->route('customer.signup2')->with([
                'status'  => 'error',
                "message" => 'Name or address validation failed.'
            ]);
        }
        
        $old_property = PropertyList::where('name', $data['name'])->first();
        // dd($old_property);
        if($old_property != null){
            return redirect()->route('customer.signup2')->with([
                'status'  => 'error',
                "message" => 'Property already registered.'
            ]);
        }

        $property=PropertyList::create([
            'name' => $data['name'],
            'address' => $data['address'],
            'user_id' => $user->id,
        ]);

        if ($property) {
            if($data['more'] == "0"){
                return redirect()->route('customer.signup3')->with([
                    'status'  => 'success',
                    'message' => 'Added successfully.',
                ]);
            }
            else{
                return redirect()->route('customer.signup2')->with([
                    'status'  => 'success',
                    'message' => 'Added successfully.',
                ]);
            }
        }

        return redirect()->route('customer.signup2')->with([
            'status'  => 'error',
            'message' => 'Added failed.',
        ]);
    }
}
