<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function customers(){
        return $this->belongsTo(User::class);
    }

    public function processor(){
        return $this->hasOne(User::class,'processed_by');
    }

    public function product(){
        return $this->hasMany(OrderProduct::class);
    }
}
