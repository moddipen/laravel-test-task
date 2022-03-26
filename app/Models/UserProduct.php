<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'purchase_qty',
        'total_amount'        
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function active_product(){
        return $this->belongsTo(Product::class)->where("status",0);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
