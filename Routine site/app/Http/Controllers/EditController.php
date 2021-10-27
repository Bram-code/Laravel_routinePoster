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

    public function update($id, Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'string',
            'routine' => 'required',
            'user_id' => 'required'
        ]);

        $routine = Routine::find($id);
        $routine->title = $request->input('title');
        $routine->description = $request->input('description');
        $routine->image = $request->input('image');
        $routine->routine = $request->input('routine');
        $routine->user_id = $request->input('user_id');
        $routine->update();

        return redirect()->to('/home');
    }

    public function index($id){

        $routine = Routine::find($id);

        return view('edit', compact('routine'));
    }

}
