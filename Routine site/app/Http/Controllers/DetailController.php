<?php

namespace App\Http\Controllers;

use App\Models\routine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index($id){

        $routine = Routine::find($id);

        $users = User::all();

        if(Auth::user() == true){
            if ($routine -> liked == ""){
                $check2 = [];
            }else {
                $check2 = unserialize($routine->liked);
            }

            $user_id = Auth::user()->id;

            $check = in_array($user_id, $check2);
        }else{
            $check = true;
        }

        return view('detail', compact( 'routine', 'users', 'check'));
    }

    public function like($id){
        $user_id = Auth::user()->id;

        $users = User::find($user_id);

        if ($users -> liked == ""){
            $array2 = [];
        }else{
            $array2 = unserialize($users -> liked);
        }

        array_push($array2, $id);

        $users -> liked = serialize($array2);

        $users -> update();

        $routine = Routine::find($id);

        if ($routine -> liked == ""){
            $array = [];
        }else{
            $array = unserialize($routine -> liked);
        }

        array_push($array, $user_id);

        $routine -> liked = serialize($array);

        $routine -> update();

        return redirect()->to('/home');
    }

    public function nolike($id){
        $user_id = Auth::user()->id;

        $users = User::find($user_id);

        $array2 = unserialize($users -> liked);

        $key2 = array_search($id, $array2);

        unset($array2[$key2]);

        $users -> liked = serialize($array2);

        $users -> update();

        //now for the routine

        $routine = Routine::find($id);

        $array = unserialize($routine -> liked);

        $key = array_search($user_id, $array);

        unset($array[$key]);

        $routine -> liked = serialize($array);

        $routine -> update();

        return redirect()->to('/home');
    }


}
