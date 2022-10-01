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
        'first_and_last_name','gender_id', 'PIN', 'username', "user_type_id",
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

    public function user_login(){
        return $this->hasMany(UserLogin::class,'user_id');
    }

    public function userWhoRentedOut(){
        return $this->hasMany(Rent::class,"user_who_rented_out_id");
        }
    
    public function userWhoRented(){
    return $this->hasMany(Rent::class,"user_who_rented_id");
    } 


    public function userWhoReserved(){
        return $this->hasMany(Reservation::class,"user_that_reserved_id");
        }
    
    public function forUser(){
    return $this->hasMany(Reservation::class,"foruser_id");
    } 

    public function userWhoReceived(){
        return $this->hasMany(Rent::class,"user_who_received_back_id");
        } 



}


