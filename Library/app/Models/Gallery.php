<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['photo','headline'];
    
    public function gallery(){
    return $this->hasOne(Book::class);
    }
}
