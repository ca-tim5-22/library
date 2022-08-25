<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class RentStatus extends Model
{
    use HasFactory;
    protected $fillable=["renting_id","book_status_id","date"];



    public function all_rented_pieces_of_books($book){
        
        $izdato_id = DB::select(DB::raw("SELECT id FROM book_statuses WHERE name = \"Izdato\";"));
        $u_prekoracenju_id = DB::select(DB::raw("SELECT id FROM book_statuses WHERE name = \"U prekoracenju\";"));
        $u_prekoracenju_id = $u_prekoracenju_id[0]->id;
        $izdato_id = $izdato_id[0]->id;
        $renting_ids = DB::select(DB::raw("SELECT renting_id,book_status_id FROM rent_statuses WHERE book_status_id = $izdato_id OR book_status_id = $u_prekoracenju_id;"));

$rents=[];
$preko=0;
        foreach($renting_ids as $renting_id){
            
            $one_rent = DB::select(DB::raw("SELECT * FROM rents WHERE id = $renting_id->renting_id "));
            
            if($one_rent[0]->book_id == $book->id  && $renting_id->book_status_id == $u_prekoracenju_id){
               
                $preko++;
           
                 $rents[]=$one_rent[0];
            }else if($one_rent[0]->book_id == $book->id  && $renting_id->book_status_id == $izdato_id){
                $rents[]=$one_rent[0];
            }
            
        }
        
        $rents = (object) $rents;
      $rents->preko=$preko;

        return $rents;

    }
}
