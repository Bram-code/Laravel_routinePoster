<?php

namespace App\Http\Controllers;

use App\Models\routine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
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

        $id = request('id');

        Routine::where('id', $id) -> update(request(['title', 'description', 'image', 'routine', 'user_id']));

        return redirect()->to('/home');
    }

    public function index(){
        $id = request('id');

        $routine = Routines::all()->where('id', $id);

        return view('edit', compact('routine'));
    }
}
