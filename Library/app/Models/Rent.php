<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    public function book(){
    return $this->hasOne(Book::class);
    }
 
    public function userWhoRentedOut(){
    return $this->hasOne(User::class,"user_who_rented_out_id");
    }
        
    public function userThatReserved(){
    return $this->hasOne(User::class,"user_who_rented_id");
    } 

    public function rent(){
    return $this->belongsToMany(BookStatus::class,"rent_statuses","renting_id");
    }


}
