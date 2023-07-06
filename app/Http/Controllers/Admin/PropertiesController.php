<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyList;
use App\Models\AuthorUsersList;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertiesController extends Controller
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
            redirect()->route('login')->with([
                'status'  => 'error',
                "message" => 'Operation is not allowed.'
            ]);
        }

        $propertyList = PropertyList::all();

        $propertyId = request('property_id') *1;
        $activeProperty = null;

        if($propertyId == null || $propertyId == 0){
            $activeProperty = $propertyList->count() > 0 ? $propertyList[0] : null;
        }
        else{
            $activeProperty = PropertyList::where('id', $propertyId)->first();
        }
        
        $authorList = AuthorUsersList::paginate(10);
        
        return view('admin.properties', [
            'user' =>$user,
            "properties" => $propertyList,
            "activeProperty" => $activeProperty,
            "authorUsers" => $authorList
        ]);
    }

    public function addProperty(Request $request){
        
        $user = Auth::user();
        
        if($user['role'] != 0){
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

    public function editJurisdiction(Request $request){
        $user = Auth::user();
        
        if($user['role'] != 0){
            return response()->json([
                'status'  => 'error',
                "message" => 'Operation is not allowed.'
            ]);
        }

        $data = $request->except('_token');
        
        $rules = [
            'jurisdiction' => ['required', 'string', 'max:255'],
        ];

        $v = Validator::make($data, $rules);

        if ($v->fails()) {
            return response()->json([
                'status'  => 'error',
                "message" => 'Jurisdiction validation failed.'
            ]);
        }

        if($request->has('id')){
            if($data['id'] > 0){
                //edit property
                $property = PropertyList::where('id', $data['id'])->first();
                $property->jurisdiction = $data['jurisdiction'];
                $property->save();
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Edited successfully.',
                    'jurisdiction' => $data['jurisdiction'],
                ]);
            }
        }
        else{
            return response()->json([
                'status'  => 'error',
                'message' => 'Select Property correctly.',
            ]);
        }
    }

    public function approveProperty(Request $request){
        
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
                $property = PropertyList::where('id', $data['id'])->first();
                $property->approved = $data['approve'];
                $property->save();
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Changed status successfully.',
                    'property_id' => $property->id,
                ]);
            }
        }
        else{
            return response()->json([
                'status'  => 'error',
                'message' => 'Select property correctly.',
            ]);
        }
    }

}
