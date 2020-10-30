<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_payment';
    public $incrementing = false;
    
    protected $table = 'payment'; // payment table

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'fk_id_payment');
    }
}
