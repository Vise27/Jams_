<?php

namespace App\Models\Crud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];


    
}
