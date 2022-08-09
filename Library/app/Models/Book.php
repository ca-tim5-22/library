<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    protected $fillable = ['title','number_of_pages','release_date','ISBN','total','rented','reserved','content',"alphabet_id","publisher_id"];
    
    public function alphabet(){
    return $this->hasOne(Alphabet::class);
    }

    public function binding(){
    return $this->hasOne(Binding::class);
    }

    public function format(){
    return $this->hasOne(Format::class);
    }

    public function language(){
    return $this->hasOne(Language::class);
    }

    public function publisher(){
    return $this->hasOne(Publisher::class);
    }

    public function authors(){
    return $this->belongsToMany(Author::class,"book_authors","author_id");
    }

    public function categories(){
    return $this->belongsToMany(Category::class,"book_categories","category_id");
    }

    public function genres(){
    return $this->belongsToMany(Genre::class,"book_genres","genre_id");
    }
}
