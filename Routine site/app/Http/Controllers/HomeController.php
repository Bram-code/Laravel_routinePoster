<?php

namespace App\Http\Controllers;

use App\Models\routine;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $users = User::all();

        $title = 'Alle routines';

        $routines = Routine::latest()->get();


        return view('home', compact('title', 'routines', 'users'));

    }
}
