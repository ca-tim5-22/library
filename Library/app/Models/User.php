<?php

namespace App\Models;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;
    protected $table="users";
    protected $fillable = [
        "first_and_last_name",
        'email',
        'password',
    ];

    protected $hidden = [
        'password'
        
    ];
}
