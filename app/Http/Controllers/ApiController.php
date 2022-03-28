<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function selectBookAndAuthor() {
        $authorsAndBooks = DB::table('books')->join('authors', 'books.id', '=', 'authors.id')->select('books.title', 'authors.surname', 'authors.name', 'authors.patronymic')->get();

        $json = [
            "data" => [$authorsAndBooks]
        ];
        return response()->json($json, 200, ['Content-type'=>'application/json;charset=utf-8'],JSON_UNESCAPED_UNICODE);
    }

    public function selectById(Request $request) {
        $id = $request->input('id');
        $book = (new Books())->find($id);
        $json = [
            "data" => $book
        ];
        return response()->json($json, 200, ['Content-type'=>'application/json;charset=utf-8'],JSON_UNESCAPED_UNICODE);
    }

    public function updateById(Request $request) {
        $id = $request->input('id');

        $books = new Books();
        $book = $books->find($id);

        $title = $request->input('title');
        $dateOut = $request->input('date_out');
        $createdAt = $request->input('created_at');
        $updatedAt = $request->input('updated_at');

        $isEmptyField = empty($title) && empty($dateOut) && empty($updatedAt) && empty($createdAt);
        if (!$isEmptyField) {
            $book->title = $title;
            $book->date_out = $dateOut;
            $book->updated_at = $updatedAt;
            $book->created_at = $createdAt;
            $book->save();
            $json = [
                "data" => $book
            ];
        } else {
            $json = [
                "data" => ['error' => 'Не все поля корректно заполнены']
            ];
        }

        return response()->json($json, 200, ['Content-type'=>'application/json;charset=utf-8'],JSON_UNESCAPED_UNICODE);
    }

    public function deleteById($id) {
        $book = Books::find($id);
        if($book) {
            $book->delete();
            $json = [
                "data" => ['success' => 'Запись удалена']
            ];
        } else {
            $json = [
                "data" => ['error' => 'Запись не удалена']
            ];
        }

        return response()->json($json, 200, ['Content-type'=>'application/json;charset=utf-8'],JSON_UNESCAPED_UNICODE);
    }
}
