<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'PIN', 'username', "email"];

    protected $hidden = ['password'];

    public function type(){
    return $this->hasOne(UserType::class);
    }
}
