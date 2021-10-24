<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Models\User;
use http\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoutineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');


    }

    public function index(){

        if (Auth::user()->admin == false){
            return redirect()->route('home');
        }

        $users = User::all();

        $title = 'Alle routines';

        $routines = Routine::all();


        return view('admin.routine', compact('title', 'routines', 'users'));

    }


}
