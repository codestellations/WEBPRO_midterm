<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_category';
    
    protected $table = 'category'; // category table
    protected $fillable = ['id_category', 'name_category']; // array of field
}
