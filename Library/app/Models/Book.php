<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    protected $fillable = ['title','number_of_pages','release_date','ISBN','total','rented','reserved','content',"alphabet_id","publisher_id"];
    
    public function alphabet(){
    return $this->belongsTo(Alphabet::class);
    }

    public function binding(){
    return $this->belongsTo(Binding::class);
    }

    public function format(){
    return $this->belongsTo(Format::class);
    }

    public function language(){
    return $this->belongsTo(Language::class);
    }

    public function publisher(){
    return $this->belongsTo(Publisher::class,"publisher_id");
    }

    public function authors(){
    return $this->belongsToMany(Author::class,"book_authors");
    }

    public function categories(){
    return $this->belongsToMany(Category::class,"book_categories");
    }

    public function genres(){
    return $this->belongsToMany(Genre::class,"book_genres");
    }

    public function gallery(){
        return $this->hasOne(Gallery::class,"book_id");
    }

    public function rent(){
    return $this->hasMany(Rent::class);
    }

    public function reservation(){
    return $this->hasMany(Reservation::class);
    }

    public function reservations(){
    return $this->hasManyThrough(
        ReservationStatus::class,
        Reservation::class,
        'book_id', // Foreign key on the types table...
        'reservation_id', // Foreign key on the items table...
        'id', // Local key on the users table...
        'id' // Local key on the categories table...
    
 );}

 
 public function rents(){
    return $this->hasManyThrough(
        RentStatus::class,
        Rent::class,
        'book_id', // Foreign key on the types table...
        'renting_id', // Foreign key on the items table...
        'id', // Local key on the users table...
        'id' // Local key on the categories table...
    
 );}




 public function reservation_count(){ 
   $status=StatusesOfReservations::where("name","=","Rezervisano")->get()->first();
 return $this->reservations()->where("reservation_status_id","=",$status->id)->get()->count();
}

public function overdue_count(){ 
    $status=BookStatus::where("name","=","U prekoracenju")->get()->first();
  return $this->rents()->where("book_status_id","=",$status->id)->get()->count();
 }

 public function rent_count(){ 
    $status=BookStatus::where("name","=","Izdato")->get()->first();
  return $this->rents()->where("book_status_id","=",$status->id)->get()->count();
 }

 public function user_active_rented($id){
  return $this->rent()
  ->join('rent_statuses','rents.id','=','renting_id')
  ->whereRaw('rent_statuses.book_status_id ='.BookStatus::where('name','Izdato')->first()->id
  .' and rents.user_who_rented_id ='.$id)
  ->orderBy('rent_date','desc')
  ->groupBy('rents.user_who_rented_id')
  ->count();
}

public function user_active_reservations_number($id){

  $status=StatusesOfReservations::where('name','Rezervisano')->first()->id;
  return $this->reservation()
  ->join('reservation_statuses','reservations.id','=','reservation_id')
  ->where("reservation_statuses.reservation_status_id", "=",$status)
  ->where("reservations.foruser_id","=", $id)
  ->orderBy('date_of_reservation','desc')
  ->groupBy('reservations.foruser_id')
  ->count();
  
}

public function user_active_reservations($id){
  $status=StatusesOfReservations::where('name','Rezervisano')->first()->id;
  return $this->reservation()
  ->join('reservation_statuses','reservations.id','=','reservation_statuses.reservation_id')
  ->where("reservation_statuses.reservation_status_id","=",$status)
  ->where("reservations.foruser_id","=",$id)
  ->orderBy('reservations.date_of_reservation','desc')
  ->get()
  ->first();
}


}
