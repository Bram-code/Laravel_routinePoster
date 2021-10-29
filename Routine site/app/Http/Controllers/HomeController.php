<?php

namespace App\Http\Controllers;

use App\Models\routine;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $routines = Routine::latest() -> where('active', '!=', 'true');

        if (request('search')){
            $routines -> where('title', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%');
        }

        $tags = Tag::all();

        $users = User::all();

        return view('home', [
            'routines' => $routines->get(),
            'users' => $users,
            'tags' => $tags
        ]);
    }
}
