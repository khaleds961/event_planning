<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admins extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'admins'; 
    protected $fillable = [
        'fullname',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}