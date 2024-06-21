<?php

namespace App\Models\Crud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Crud\Product;

class DetailsProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'size',
        'color',
        'material',
        'weight'
    ];

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
