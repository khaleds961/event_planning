<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeysPlaces extends Model
{
    use HasFactory;
    protected $table = 'keys_places';
    protected $fillable = [
        'arabic_name',
        'english_name',
    ];
}
