<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false; 
    protected $primaryKey = 'id_book';

    protected $table = 'book';
    protected $fillable = ['id_book', 'name_book', 'author', 'price_book', 'pages', 'date_published', 'publisher', 'stock', 'fk_id_category', 'fk_id_promo'];
}
