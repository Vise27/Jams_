<?php

namespace App\Models\Crud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;    

class DetailsUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'age',
        'sex',
        'location',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
