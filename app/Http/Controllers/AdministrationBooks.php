<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Books;
use Illuminate\Http\Request;

class AdministrationBooks extends Controller
{
    public function index() {
        $books = (new Books())->all();
        return view('books.book-index', compact('books'));
    }

    public function delete($id) {
        $book = Books::find($id);

        if (!empty($book)) {
            $book->delete();
            $answer = "Успешно, ID: $id удалён";
        } else {
            $answer = "Ошибка, не найдена запись";
        }

        return view('books.book-delete', compact('answer'));
    }

    public function create() {
        $authors = (new Authors())->all();
        return view('books.book-add-new', compact('authors'));
    }

    public function createSubmit(Request $request) {
        $title = $request->input('title');
        $dateOut = $request->input('date_out');

        $book = new Books();

        $book->title = $title;
        $book->date_out = $dateOut;

        $book->save();

        return redirect(route('book-index'));
    }

    public function update($id) {
        $book = (new Books())->find($id);
        return view('books.book-update', compact('book'));
    }

    public function updateSubmit(Request $request, $id) {
        $book = (new Books())->find($id);

        $title = $request->input('title');
        $dateOut = $request->input('date_out');

        $book->title = $title;
        $book->date_out = $dateOut;

        $book->save();
        return redirect(route('book-index'));
    }
}
