<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable=['rent_date','return_date'];

    public $timestamps = false;

    public function book(){
    return $this->hasOne(Book::class);
    }
 
  /*   public function userThatReserved(){
    return $this->hasOne(User::class,"user_who_rented_id");
    }  */

   


}
