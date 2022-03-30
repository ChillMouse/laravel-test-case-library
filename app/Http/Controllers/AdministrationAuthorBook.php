<?php

namespace App\Http\Controllers;

use App\Models\BookAuthor;
use Illuminate\Http\Request;

class AdministrationAuthorBook extends Controller
{
    public function index() {
        $relations = (new BookAuthor())->all();
        return view('bookAuthor.index', compact('relations'));
    }
}
