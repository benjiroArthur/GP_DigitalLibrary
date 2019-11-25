<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Group;
use App\User;
use App\Role;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $user_id = auth()->user()->id;
        if(auth()->user()->profile_updated == 1)
        {
            if(auth()->user()->password_changed == 1)
            {
//
                $categories = Category::all();
                return view('home', compact('categories'));
            }
            else
            {
                $user = User::find($user_id);

                return view('users.pwdChange', compact('user'));
            }

        }
        else
        {
            $user = User::find($user_id);

            return view('users.profileUpdate', compact('user'));
        }

    }

    public function requestBooks(Request $request, $id)
    {
        if($request->ajax())
        {
            $books = Book::where('group_id',$id)->get();
            return response()->json($books);
        }
    }
}
