<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\AuthorUsersList;
use App\Models\PropertyList;
use App\Rules\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
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

        $propertyList = PropertyList::where('user_id', $user->id)->get();

        $propertyId = request('property_id') *1;
        $activeProperty = null;

        if($propertyId == null || $propertyId == 0){
            $activeProperty = $propertyList->count() > 0 ? $propertyList[0] : null;
        }
        else{
            $activeProperty = PropertyList::where('id', $propertyId)->first();
        }
        
        $authorList = AuthorUsersList::where('user_id', $user->id)->paginate(10);
        
        return view('customer.dashboard', [
            'user' =>$user,
            "properties" => $propertyList,
            "activeProperty" => $activeProperty,
            "authorUsers" => $authorList
        ]);
    }
    
    public function addProperty(Request $request){
        
        $user = Auth::user();
        
        if($user['role'] != 1){
            return response()->json([
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
            return response()->json([
                'status'  => 'error',
                "message" => 'Name or address validation failed.'
            ]);
        }

        if($request->has('id')){
            if($data['id'] > 0){
                //edit property
                $property = PropertyList::where('id', $data['id'])->first();
                $property->name = $data['name'];
                $property->address = $data['address'];
                $property->save();
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Edited successfully.',
                    'property_id' => $property->id,
                ]);
            }
        }
        else{
            //add property
            $old_property = PropertyList::where('name', $data['name'])->first();
        
            if($old_property != null){
                return response()->json([
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

    public function addAuthor(Request $request){
    
        $user = Auth::user();
        
        if($user['role'] != 1){
            return response()->json([
                'status'  => 'error',
                "message" => 'Operation is not allowed.'
            ]);
        }

        $data = $request->except('_token');
        
        $rules = [
            'name'       => ['required', 'string', 'max:255'],
            'phone'      => ['required', new Phone($data['phone'])],
        ];

        $v = Validator::make($data, $rules);

        if ($v->fails()) {
            return response()->json([
                'status'  => 'error',
                "message" => 'Name or phone validation failed.'
            ]);
        }

        if($request->has('id')){
            if($data['id'] > 0){
                //edit property
                $author = AuthorUsersList::where('id', $data['id'])->first();
                $author->name = $data['name'];
                $author->phone = $data['phone'];
                $author->save();
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Edited successfully.',
                    'author' => $author,
                ]);
            }
        }
        else{
            //add property
            $old_author = AuthorUsersList::where('name', $data['name'])->first();
        
            if($old_author != null){
                return response()->json([
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
}
