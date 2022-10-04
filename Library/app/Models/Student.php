<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Student extends Model
{
    use HasFactory;

    protected $table = 'users';

    public static function lastLogin(){
        return DB::select(DB::raw("SELECT user_logins.time ,users.* FROM user_logins INNER JOIN users ON users.id = user_logins.user_id WHERE users.user_type_id = 2 ORDER BY time DESC limit 1;"));
      
   }
}
