<?php

namespace App\Models\Crud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'description'
    ];
}
