<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\CrudOperationBindable;

class AdministrationAuthors extends Controller
{
    public function index() {
        $authors = (new Authors())->all();
        return view('authors/author-index', compact('authors'));
    }
    public function delete($id) {
        $author = Authors::find($id);

        if (!empty($author)) {
            $author->delete();
            $answer = "Успешно, ID: $id удалён";
        } else {
            $answer = "Ошибка, не найдена запись";
        }

        return view('authors/author-delete', compact('answer'));
    }
    public function create() {
        return view('authors/author-add-new');
    }
    public function createSubmit(Request $request) {
        $name = $request->input('name');
        $surname = $request->input('surname');
        $patr = $request->input('patronymic');
        $bd = $request->input('birthday');

        $author = new Authors();

        $author->name = $name;
        $author->surname = $surname;
        $author->patronymic = $patr;
        $author->birthday = $bd;

        $author->save();

        return redirect(route('author-index'));
    }

    public function update($id) {
        $author = (new Authors)->find($id);
        return view('authors/author-edit', compact('author'));
    }

    public function updateSubmit(Request $request, $id) {
        $author = (new Authors)->find($id);

        $name = $request->input('name');
        $surname = $request->input('surname');
        $patr = $request->input('patronymic');
        $bd = $request->input('birthday');

        $author->name = $name;
        $author->surname = $surname;
        $author->patronymic = $patr;
        $author->birthday = $bd;

        $author->save();
        return redirect(route('author-index'));
    }
}
