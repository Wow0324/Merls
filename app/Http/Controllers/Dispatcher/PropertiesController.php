<?php

namespace App\Http\Controllers\Dispatcher;

use App\Http\Controllers\Controller;
use App\Models\AuthorUsersList;
use App\Models\PropertyList;
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
        if($user == null || $user['role'] != 2){
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
        
        return view('dispatcher.properties', [
            'user' =>$user,
            "properties" => $propertyList,
            "activeProperty" => $activeProperty,
            "authorUsers" => $authorList
        ]);
    }
}
