<?php

namespace App\Http\Controllers;

use App\Models\routine;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $id = request('id');

        $routine = Routine::all()->where('id', $id);

        return view('delete', compact('routine'));
    }

    public function delete()
    {
        $id = request('id');

        Routine::where('id', '=', $id) -> delete();

    }


}
