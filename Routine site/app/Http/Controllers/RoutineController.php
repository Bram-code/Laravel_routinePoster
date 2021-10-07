<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    public function index(){
    $title = 'Alle routines';

    $routines = Routine::all();

    return view('routines.index', compact('title', 'routines'));
    }
}
