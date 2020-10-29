<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'id_customer';
    
    protected $table = 'customer'; // customer table

    public function order()
    {
        return $this->hasMany('App\Models\Order', 'fk_id_customer');
    }
}
