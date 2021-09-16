<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller {

    public function index (){
        $title = "Over onze website";
        $paragraph = "Jow mensjes die dit lezen";

        return view('about', compact('title', 'paragraph'));
    }
}
