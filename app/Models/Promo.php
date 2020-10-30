<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false; 
    protected $primaryKey = 'id_promo';

    protected $table = 'promo';
    protected $fillable = ['id_promo', 'name_promo', 'discount', 'start_discount', 'end_discount'];

    public function books()
    {
        return $this->hasMany('App\Models\Book', 'fk_id_promo');
    }
}
