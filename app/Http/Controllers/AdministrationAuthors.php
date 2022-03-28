<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;

class AdministrationAuthors extends Controller
{
    public function index(Request $r) {
        $authors = (new Authors())->all();
        return response()->json($authors, 200, ['Content-type'=>'application/json;charset=utf-8'],JSON_UNESCAPED_UNICODE);
    }
    public function edit(Request $r) {

        return 1;
    }
}
