<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User, Rol, Group};

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
        $user = auth()->user();
        $users = collect();
        
        if($user->id == 3 || $user->id == 4) {
            $user->load('people', 'people.group', 'rol');
        } else if ($user->id == 1 || $user->id == 2) {
            $users = User::where('id', '!=', 1)->get()->load('people', 'people.group', 'rol');
        }

        return view('home', compact('user', 'users'));
    }
}
