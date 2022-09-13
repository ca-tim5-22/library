<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookStatus extends Model
{
    use HasFactory;

    protected $fillable=["name"];

   public function rent(){
        return $this->belongsToMany(Rent::class,"rent_statuses","book_status_id","renting_id")->withTimestamps();
        } 


        
    
}
