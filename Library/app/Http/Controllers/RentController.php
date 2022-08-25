<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Http\Requests\StoreRentRequest;
use App\Http\Requests\UpdateRentRequest;
use App\Models\Book;
use App\Models\BookStatus;
use App\Models\GlobalVariable;
use App\Models\RentStatus;
use App\Models\Student;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class RentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        
        $status=DB::table("book_statuses")->where("name","=","Izdato")->get();
        
        $rented=DB::table("rent_statuses")->where("book_status_id","=",$status[0]->id)->get();

        $rented_book_info = [];
        foreach ($rented as $one_rent=>$value) {
       
        $rented_book_info[] = DB::table("rents")->where("id","=",$value->renting_id)->get();
        }
        
        $rented_book_info = (object) $rented_book_info;
        $books = Book::all();
        $users=Users::all();



        return view("izdateKnjige",compact("books","rented","rented_book_info","users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=Users::all();
        $deadline=GlobalVariable::where('variable','=','Returnment_deadline')->get()->first();
        $book_headline=DB::select(DB::raw("SELECT * from galleries;"));
        $book_headline=(object) $book_headline;
        
       


        return view("izdajKnjigu",compact("users","deadline","book_headline"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRentRequest $request)
    {
        
                $rent=Rent::create([
                    "rent_date"=>$request->rent_date,
                    "return_date"=>$request->return_date]);

        
                 $librarian=Users::findOrFail(auth()->user()->id);
                 $student=Users::findOrFail($request->user_who_rented_id);
                 $book=Book::findOrFail($request->book);
                 $book->rented++;
                 $book->save();
                 $librarian->userWhoRentedOut()->save($rent);
                 $student->userWhoRented()->save($rent);
                 $book->rent()->save($rent);
                    $status=DB::table("book_statuses")->where("name","=","Izdato")->get()->first();

                 $rent->rent_status()->attach($status->id);

             
               return redirect("/book");


            }


            public function new($book)
            {
                $users=Users::all();
                $deadline=GlobalVariable::where('variable','=','Returnment_deadline')->get()->first();
                $book=Book::findOrFail($book);
                $book_headline=DB::select(DB::raw("SELECT * from galleries;"));
                $book_headline=(object) $book_headline;
                
                $preko=0;

                $status=DB::table("book_statuses")->where("name","=","U prekoracenju")->get();
                $status_id = $status[0]->id;
                $rented2=DB::select(DB::raw("SELECT * FROM rent_statuses WHERE book_status_id = $status_id"));
                 foreach ($rented2 as $overdue) {
                    $one_overdue=Rent::findOrFail($overdue->renting_id);
                    if($book->id==$one_overdue->book_id)
                     $preko++;
                   }

                return view("izdajKnjigu",compact('users','deadline','book',"book_headline","preko"));
            }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function show($rent)
    {
        $rent=Rent::findOrFail($rent);
        $book=Book::findOrFail($rent->book_id);
        $id = $book->id;
        $overdue = DB::table('book_statuses')->where("name","=","U prekoracenju")->get();
        $rented=DB::table("rent_statuses")->where("renting_id","=",$rent->id)->get();
        $naslovna =DB::table("galleries")->where("book_id", "=",$id)->where("headline","=",1)->get();
$librarian =Users::findOrFail($rent->user_who_rented_out_id);
$student =Users::findOrFail($rent->user_who_rented_id);
$date= Carbon::parse($rent->rent_date);
                                        
$newdate=$date->format("d-m-Y");
$today=date("d-m-Y");

$a= strtotime($newdate) - strtotime($today);

$a= abs(round($a / 86400));



        return view("izdavanjeDetalji",compact("rent","book","naslovna","librarian","student","newdate","overdue","a"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function edit($rent)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRentRequest  $request
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRentRequest $request, Rent $rent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rent $rent)
    {
        //
    }


    public function rented_books($book)
    {
        
    /*    $status=BookStatus::findOrFail(4);
       $knjige=$status->rent()->get();
       dd($knjige); */

   /*  $status=DB::table("book_statuses")->where("name","=","Otpisano")->get()->first();
    foreach($status->rent as $rent){
    echo "ahsdasdhsajhashfhgfdgsdgf";

    }; */

    $book=Book::findOrFail($book);
    $status=DB::table("book_statuses")->where("name","=","Izdato")->get();
    $status_id = $status[0]->id;
    $rented=DB::table("rent_statuses")->where("book_status_id","=",$status_id)->get(); 
    $rented_book_info = [];
    
     foreach ($rented as $rent) {
    
        $one_rent=Rent::findOrFail($rent->renting_id);
        if($book->id==$one_rent->book_id)
         $rented_book_info[]=$one_rent; 

     }
     $users=Users::all();
   
   /*   $u_preko=DB::table("book_statuses")->where("name","=","U prekoracenju")->get();
     $preko=DB::table("rent_statuses")->where("book_status_id","=",$u_preko[0]->id)->get(); 
     $preko=count($preko); */
     $preko=0;

     $status=DB::table("book_statuses")->where("name","=","U prekoracenju")->get();
     $status_id = $status[0]->id;
     $rented2=DB::select(DB::raw("SELECT * FROM rent_statuses WHERE book_status_id = $status_id"));
      foreach ($rented2 as $overdue) {
         $one_overdue=Rent::findOrFail($overdue->renting_id);
         if($book->id==$one_overdue->book_id)
          $preko++;
        }

    return view("rent.IznajmljivanjeIzdate",compact('rented','users','book',"rented_book_info","preko"));
    }



   public function returned_books($book)
    {
    $book=Book::findOrFail($book);
    $status=DB::table("book_statuses")->where("name","=","Vraceno")->get();
    $status_id = $status[0]->id;
    $rented=DB::select(DB::raw("SELECT * FROM rent_statuses WHERE book_status_id = $status_id"));
  
    $rented_book_info = [];
     foreach ($rented as $returned) {
  
       /*  $rented_book_info[] = DB::select(DB::raw("SELECT * FROM rents WHERE id = $value->renting_id AND book_id = $book->id;"));  */

       $one_returned=Rent::findOrFail($returned->renting_id);
        if($book->id==$one_returned->book_id)
         $rented_book_info[]=$one_returned;   
     }

     $izdato=DB::table("book_statuses")->where("name","=","Izdato")->get();
     
     $users=Users::all();
    $preko=0;




    $status=DB::table("book_statuses")->where("name","=","U prekoracenju")->get();
    $status_id = $status[0]->id;
    $rented2=DB::select(DB::raw("SELECT * FROM rent_statuses WHERE book_status_id = $status_id"));
     foreach ($rented2 as $overdue) {
        $one_overdue=Rent::findOrFail($overdue->renting_id);
        if($book->id==$one_overdue->book_id)
         $preko++;
       }



   
   /*   $u_preko=DB::table("book_statuses")->where("name","=","U prekoracenju")->get();
     $preko=DB::table("rent_statuses")->where("book_status_id","=",$u_preko[0]->id)->get(); 
     $preko=count($preko); */
     return view("rent.IznajmljivanjeVracene",compact('rented','users','book',"rented_book_info","preko"));
    } 



    public function overdue_books($book)
    {
        $book=Book::findOrFail($book);
    
        $status=DB::table("book_statuses")->where("name","=","U prekoracenju")->get();
        
        $rented=DB::table("rent_statuses")->where("book_status_id","=",$status[0]->id)->get();
        $preko=0;
        $overdue_book_info = [];
         foreach ($rented as $overdue) {
           
          /*   $overdue_book_info[] = DB::table("rents")->where("id","=",$value->renting_id)->where("book_id","=",$book->id)->get();  */

          $one_overdue=Rent::findOrFail($overdue->renting_id);
          if($book->id==$one_overdue->book_id){
           $overdue_book_info[]=$one_overdue;  
           $preko++;
          }
         }
                                    
         foreach($overdue_book_info as $overdue){
            $date= Carbon::parse( $overdue->rent_date);
            $newdate=$date->format("d-m-Y");
             $overdue->rent_date= $newdate;
            $date= Carbon::parse( $overdue->return_date);
            $newdate=$date->format("d-m-Y");
            $overdue->return_date= $newdate;
            
         }
        
         $users=Users::all();
         $today=date("d-m-Y");

         $izdato=DB::table("book_statuses")->where("name","=","Izdato")->get();
      
        /*  $u_preko=DB::table("book_statuses")->where("name","=","U prekoracenju")->get();
         $preko=DB::table("rent_statuses")->where("book_status_id","=",$u_preko[0]->id)->get(); 
         $preko=count($preko); */

         return view("rent.IznajmljivanjePrekoracenje",compact('rented','users','book',"overdue_book_info","today","preko"));
    } 



    public function abandon_show($rent)
    {
    $rent=Rent::findOrFail($rent);
    return view("otpisiKnjigu",compact('rent'));
    } 





    public function abandon_book($id) {
        $status=DB::table("book_statuses")->where("name","=","Otpisano")->get()->first();
        $rent=Rent::findOrFail($id);
        $rent_status=DB::table("rent_statuses")->where("renting_id","=",$rent->id)->get();
        
        DB::select(DB::raw("UPDATE rent_statuses SET book_status_id = $status->id WHERE renting_id = $id"));
    
    
    
        /* foreach($niz as $clan){
        $rent=Rent::findOrFail($clan);
        $rent->rent_status()->sync([$status->id]);
    } */
        return redirect('/book');

    } 







    public function return_show($rent)
    {
        $rent=Rent::findOrFail($rent);
        $book=Book::findOrFail($rent->book_id);
        $id = $book->id;
        $back = DB::table('book_statuses')->where("name","=","Vraceno")->get();
        $rented=DB::table("rent_statuses")->where("renting_id","=",$rent->id)->get();
        $naslovna =DB::table("galleries")->where("book_id", "=",$id)->where("headline","=",1)->get();
$librarian =Users::findOrFail($rent->user_who_rented_out_id);
$student =Users::findOrFail($rent->user_who_rented_id);
$date= Carbon::parse($rent->rent_date);
                                        
$newdate=$date->format("d-m-Y");
$today=date("d-m-Y");

$a= strtotime($newdate) - strtotime($today);

$a= abs(round($a / 86400));

return view("vratiKnjigu",compact("rent","book","naslovna","librarian","student","newdate","overdue","a"));
    $rent=Rent::findOrFail($rent);
    return view("vratiKnjigu",'rent');
    } 





    public function return_book($id) {
    $status=DB::table("book_statuses")->where("name","=","Vraceno")->get()->first();
    $rent=Rent::findOrFail($id);
    $rent_status=DB::table("rent_statuses")->where("renting_id","=",$rent->id)->get();
    $book=Book::findOrFail($rent->book_id);
    $book->rented--;
    $book->save();
    DB::select(DB::raw("UPDATE rent_statuses SET book_status_id = $status->id WHERE renting_id = $id"));
    /* foreach($niz as $clan){
    $rent=Rent::findOrFail($clan);
    $rent->rent_status()->sync([$status->id]);
} */
    return redirect('/book');
    } 

   


}
