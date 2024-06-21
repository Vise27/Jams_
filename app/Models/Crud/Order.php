<?php

namespace App\Models\Crud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Crud\Product;
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'product_id',
        'cantidad',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
