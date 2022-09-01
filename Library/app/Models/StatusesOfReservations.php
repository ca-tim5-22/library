<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusesOfReservations extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function reservation(){
    return $this->belongsToMany(Reservation::class,"reservation_statuses","reservation_status_id","reservation_id");
    }


}
