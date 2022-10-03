<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Reservation extends Model
{
    use HasFactory;

    protected $fillable=['date_of_submission','date_of_reservation'];



    public function reasonForClosing(){
    return $this->hasOne(Reservation::class,"reason_of_closing_id");
    }

    public function forUser(){
    return $this->hasOne(User::class,"foruser_id");
    }

    public function userThatReserved(){
    return $this->hasOne(User::class,"user_that_reserved_id");
    }

    public function status(){
    return $this->belongsToMany(StatusesOfReservations::class,"reservation_statuses","reservation_id","reservation_status_id");
    }

    public static function nor(){
        return DB::select(DB::raw("SELECT COUNT(*) as nor FROM `reservation_statuses` WHERE reservation_status_id = 1;"));
    }
    
}
