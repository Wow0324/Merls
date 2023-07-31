<?php

namespace App\Http\Controllers\Dispatcher;

use App\Http\Controllers\Controller;
use App\Models\AuthorUsersList;
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
        if($user == null || $user['role'] != 2){
            return redirect()->route('login')->with([
                'status'  => 'error',
                "message" => 'Operation is not allowed.'
            ]);
        }

        $search = request('search');
        if($search == null) $search = '';

        $authorList = AuthorUsersList::where('name', 'LIKE', '%'.$search.'%')->orWhere('phone', 'LIKE', '%'.$search.'%')->paginate(10);

        return view('dispatcher.author_users', [
            'user'        => $user,
            'authorUsers' => $authorList,
            'search'      => $search
        ]);
    }
}
