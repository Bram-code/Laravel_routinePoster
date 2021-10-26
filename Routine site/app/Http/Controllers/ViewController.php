<?php

namespace App\Http\Controllers;

use App\Models\routine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $id = request('id');

        if (Auth::user()->id != $id){
            return redirect()->route('home');
        }

        $users = User::all();

        $title = Auth::user()->name . 's routines';

        $routines = Routine::all() -> where('user_id', Auth::user()->id);


        return view('view', compact('title', 'routines', 'users'));

    }
}
