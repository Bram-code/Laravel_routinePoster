<?php

namespace App\Http\Controllers;

use App\Models\routine;
use App\Models\User;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(){

        $id = request('id');

        $routine = Routine::all()->where('id', $id);

        $users = User::all();

        return view('detail', compact( 'routine', 'users'));
    }


}
