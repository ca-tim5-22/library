<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    
    protected $fillable = ['first_and_last_name','biography'];

    public function books(){
        return $this->belongsToMany(Book::class,"book_authors","book_id");
    }
}
