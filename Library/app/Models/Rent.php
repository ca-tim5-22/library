<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Filters\ProductFilter;
use Illuminate\Database\Eloquent\Builder;

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

   public function rent_status(){
      return $this->belongsToMany(BookStatus::class,"rent_statuses","renting_id","book_status_id")->withTimestamps();
      }



}
