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

    public function store()
    {

        $this->validate(request(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'string',
            'routine' => 'required',
            'user_id' => 'required'
        ]);

        Routine::create(request(['title', 'description', 'image', 'routine', 'user_id']));

        return redirect()->to('/home');
    }

    public function index(){
        return view('create');
    }


}

