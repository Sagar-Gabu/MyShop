<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;

    protected $fiillable = ['user_id', 'product_id', 'quantity'];

    public function user()
    {
        return $this->hasOne('app\model\user', 'id', 'user_id');
    }
    public function product() {
        return $this->belongsTo(Product::class,'product_id');
    }
}
