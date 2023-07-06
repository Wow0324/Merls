<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuthorUsersList;
use App\Rules\Phone;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorUsersController extends Controller
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

        $authorList = AuthorUsersList::where('name', 'LIKE', '%'.$search.'%')->paginate(10);

        return view('admin.author_users', [
            'user'        => $user,
            'authorUsers' => $authorList,
            'search'      => $search
        ]);
    }

    public function addAuthor(Request $request){
    
        $user = Auth::user();
        
        if($user['role'] != 0){
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
                $old = AuthorUsersList::where('name', $data['name'])->where('phone', $data['phone'])->first();
                if($old){
                    return response()->json([
                        'status'  => 'error',
                        'message' => 'Authorized user exist already.'
                    ]);    
                }
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

    public function deleteAuthor(Request $request){
    
        $user = Auth::user();
        
        if($user['role'] != 0){
            return response()->json([
                'status'  => 'error',
                "message" => 'Operation is not allowed.'
            ]);
        }

        $data = $request->except('_token');
        
        $rules = [
            'name'       => ['required', 'string', 'max:255'],
            'phone'      => ['required', new Phone($data['phone'])]
        ];

        $v = Validator::make($data, $rules);

        if ($v->fails()) {
            return response()->json([
                'status'  => 'error',
                "message" => 'Name or phone validation failed.'
            ]);
        }

        if ($data['verify'] != 'DELETE') {
            return response()->json([
                'status'  => 'error',
                "message" => 'Type DELETE and click the delete button.'
            ]);
        }

        if($request->has('id')){
            if($data['id'] > 0){
                
                $author = AuthorUsersList::where('id', $data['id'])->first();
                $author->delete();

                return response()->json([
                    'status'  => 'success',
                    'message' => 'Deleted successfully.',
                    'author_id' => $author->id,
                ]);
            }
        }
        else{
            return response()->json([
                'status'  => 'error',
                'message' => 'Select Authorized user correctly.',
            ]);
        }
    }
}
