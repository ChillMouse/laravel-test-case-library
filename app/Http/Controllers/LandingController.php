<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Books;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index() {
        $authors = (new Authors())->all();
        return view('landing', compact('authors'));
    }
}
