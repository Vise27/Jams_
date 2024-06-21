<?php

namespace App\Models\Crud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Crud\Brand;
use App\Models\Crud\Supplier;
use App\Models\Crud\Categorie;
use App\Models\Crud\Modelo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand_id',
        'supplier_id',
        'categorie_id',
        'modelo_id',
        'price',
        'stock',
        'description',
        'image',
        'status'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function Supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    public function Categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
    public function Modelo()
    {
        return $this->belongsTo(Modelo::class, 'modelo_id');
    }
}
