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
        'first_and_last_name', 'PIN', 'username', "user_type_id",
        'photo',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        
        
    ];
    public function type(){
    return $this->belongsTo(UserType::class);
    }  
}
