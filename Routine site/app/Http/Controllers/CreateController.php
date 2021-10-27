<?php

namespace App\Http\Controllers;

use App\Models\Routine;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CreateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'string',
            'routine' => 'required',
            'user_id' => 'required'
        ]);

        $routine = new Routine();
        $routine->title = $request->input('title');
        $routine->description = $request->input('description');
        $routine->image = $request->input('image');
        $routine->routine = $request->input('routine');
        $routine->user_id = $request->input('user_id');
        $routine->save();

        return redirect()->to('/home');
    }

    public function index(){
        return view('create');
    }


}

