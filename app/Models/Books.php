<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    /**
     * Таблица с книгами
     *
     */
    public function authors() {  // Возвращает коллекцию авторов этой книги
        return $this->belongsToMany(Authors::class, 'book_author', 'book_id', 'author_id');
    }
}
