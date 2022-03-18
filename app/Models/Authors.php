<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model {
    use HasFactory;
    /**
     * Таблица с авторами
     *
     */
    public function books() {  // Возвращет коллекцию книг этого автора
        return $this->belongsToMany(Books::class, 'book_author', 'author_id', 'book_id');
    }
}
