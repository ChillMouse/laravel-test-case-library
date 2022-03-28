<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\BookAuthor;
use App\Models\Books;
use Illuminate\Http\Request;

class Administration extends Controller
{
    public function index() {
        $authors = (new Authors)->all();
        $books = (new Books())->all();
        return view("admin_index", compact('authors', 'books'));
    }
}
