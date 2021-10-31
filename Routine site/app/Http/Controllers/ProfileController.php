<?php

namespace App\Http\Controllers;

use App\Models\routine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth::user()->id;

        $user = User::find($id);

        $array = unserialize($user->liked);

        $routines = Routine::all() ->whereIn('id',  $array);

        $users = User::all();

        return view('profile', compact('user', 'routines', 'users'));
    }

    public function change(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'E-mail' => 'required'
        ]);

        $id = Auth::user()->id;

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('E-mail');
        $user->update();

        return redirect()->to('/home');
    }
}
