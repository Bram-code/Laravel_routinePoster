<?php

namespace App\Http\Controllers;

use App\Models\routine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index(){

        $id = request('id');

        $routine = Routine::find($id);

        $users = User::all();

        if ($routine -> liked == ""){
            $check2 = [];
        }else {
            $check2 = unserialize($routine->liked);
        }

        $user_id = Auth::user()->id;

        $check = in_array($user_id, $check2);

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


}
