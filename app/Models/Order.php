<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_order';
    public $incrementing = false;
    
    protected $table = 'order'; // order table
    protected $fillable = ['id_order', 'status']; // array of field

    public function book()
    {
        return $this->hasMany('App\Models\Book', 'order_details', 'fk_id_order', 'fk_id_book');
    }

    public function payment()
    {
        return $this->hasOne('App\Models\Payment', 'fk_id_order');
    }
}
