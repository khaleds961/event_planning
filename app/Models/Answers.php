<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    use HasFactory;
    protected $table = 'users_choices';
    protected $fillable = [
        'user_id',
        'date',
        'guesses',
    ];
}
