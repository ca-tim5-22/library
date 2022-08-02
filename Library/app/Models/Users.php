<?php

namespace App\Models;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'PIN', 'username', 
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        
    ];
    public function type(){
    return $this->hasOne(UserType::class);
    }
}
