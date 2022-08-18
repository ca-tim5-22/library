<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentStatus extends Model
{
    use HasFactory;
    protected $fillable=["renting_id","book_status_id","date"];

}
