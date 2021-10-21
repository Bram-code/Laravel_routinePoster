<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Models\User;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users = User::all();


        $title = 'Alle routines';

        $routines = Routine::all();


        return view('admin.routine', compact('title', 'routines', 'users'));

    }


}
