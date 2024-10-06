<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    function user(){
        return $this->belongsTo(User::class);
    }

    function deliveryArea(){
        return $this->belongsTo(Delivery::class);
    }
    use HasFactory;
}
