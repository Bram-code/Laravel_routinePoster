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

    public function index($id)
    {

        $routine = Routine::find($id);

        return view('delete', compact('routine'));
    }

    public function delete($id)
    {
        $routine = Routine::find($id);
        $routine->delete();
        return redirect()->to('/home');
    }

}
