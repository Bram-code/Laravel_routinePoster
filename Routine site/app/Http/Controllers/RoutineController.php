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

        $routines = Routine::all();

        return view('admin.routine', compact( 'routines', 'users'));

    }

    public function switch(Request $request){
        $users = User::all();

        $routines = Routine::all();

        foreach ($routines as $routine){
            $check = $request->input($routine->title);
            if ($routine -> active == true){
                $is = '!=';
            }else{
                $is = '==';
            }

            if ($check . $is . $routine -> active){
                $query = Routine::find($routine->id);
                if($check == false){
                    $query->active = false;
                }else{
                    $query->active = true;
                }
                $query->update();
            }
        }
        header("Refresh:0");
    }
}
