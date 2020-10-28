<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_order';
    
    protected $table = 'order'; // order table
    protected $fillable = ['id_order', 'status']; // array of field
}
