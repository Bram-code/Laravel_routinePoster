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

        $routines = Routine::latest() -> get();

        return view('admin.routine', compact( 'routines', 'users'));

    }

    public function switch(Request $request){

        $routines = Routine::all();

        foreach ($routines as $routine){

            $check = $request->input($routine->id);
            if ($check == true){
                $is = '!=';
            }else{
                $is = '==';
            }

            if ($check . $is . $routine -> active){

                $query = Routine::find($routine->id);
                if($check == true){
                    $query->active = true;
                }else{
                    $query->active = false;
                }
                $query->update();
            }
        }
        header("Refresh:0");
    }
}
