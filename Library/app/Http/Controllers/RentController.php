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
                
                return view("izdajKnjigu",compact('users','deadline','book',"book_headline"));
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
    /*   $book=Book::findOrFail($book);
       $rent=$book->rent;
       $rent=Rent::find
       $rented=$rent->rent_status()->get(); */
   /*  $status=DB::table("book_statuses")->where("name","=","Otpisano")->get()->first();
    foreach($status->rent as $rent){
    echo "ahsdasdhsajhashfhgfdgsdgf";

    }; */

    $book=Book::findOrFail($book);
    
    $status=DB::table("book_statuses")->where("name","=","Izdato")->get();
    
    $rented=DB::table("rent_statuses")->where("book_status_id","=",$status[0]->id)->get();
   
    $rented_book_info = [];
     foreach ($rented as $one_rent=>$value) {
       
        $rented_book_info[] = DB::table("rents")->where("id","=",$value->renting_id)->where("book_id","=",$book->id)->get(); 
     }
    
     $rented_book_info = (object) $rented_book_info;
        

 
     $users=Users::all();
    
     $rented_c=count($rented);
     $u_preko=DB::table("book_statuses")->where("name","=","U prekoracenju")->get();
     $preko=DB::table("rent_statuses")->where("book_status_id","=",$u_preko[0]->id)->get(); 
     $preko=count($preko);
    return view("rent.IznajmljivanjeIzdate",compact('rented','users','book',"rented_book_info","preko","rented_c"));
    }



   public function returned_books($book)
    {
        $book=Book::findOrFail($book);
    
    $status=DB::table("book_statuses")->where("name","=","Vraceno")->get();
    
     $rented=DB::table("rent_statuses")->where("book_status_id","=",$status[0]->id)->get();
   
    $rented_book_info = [];
     foreach ($rented as $one_rent=>$value) {
       
        $rented_book_info[] = DB::table("rents")->where("id","=",$value->renting_id)->where("book_id","=",$book->id)->get(); 
     }
    
     $rented_book_info = (object) $rented_book_info;
        

     $izdato=DB::table("book_statuses")->where("name","=","Izdato")->get();
     $renteda=DB::table("rent_statuses")->where("book_status_id","=",$izdato[0]->id)->get();
     $users=Users::all();
     $rented_c=count($renteda);
     $u_preko=DB::table("book_statuses")->where("name","=","U prekoracenju")->get();
     $preko=DB::table("rent_statuses")->where("book_status_id","=",$u_preko[0]->id)->get(); 
     $preko=count($preko);
     return view("rent.IznajmljivanjeVracene",compact('rented','users','book',"rented_book_info","preko","rented_c"));
    } 


    public function overdue_books($book)
    {
        $book=Book::findOrFail($book);
    
        $status=DB::table("book_statuses")->where("name","=","U prekoracenju")->get();
        
        $rented=DB::table("rent_statuses")->where("book_status_id","=",$status[0]->id)->get();
       
        $overdue_book_info = [];
         foreach ($rented as $one_rent=>$value) {
           
            $overdue_book_info[] = DB::table("rents")->where("id","=",$value->renting_id)->where("book_id","=",$book->id)->get(); 


         }
        
         $overdue_book_info = (object) $overdue_book_info;
            
        
                                        
         foreach($overdue_book_info as $rent=>$value){
            $date= Carbon::parse( $value[0]->rent_date);
            $newdate=$date->format("d-m-Y");
$value[0]->rent_date= $newdate;
            $date= Carbon::parse( $value[0]->return_date);
            $newdate=$date->format("d-m-Y");
            $value[0]->return_date= $newdate;
            
         }
        
         $users=Users::all();
         $today=date("d-m-Y");

         $izdato=DB::table("book_statuses")->where("name","=","Izdato")->get();
         $renteda=DB::table("rent_statuses")->where("book_status_id","=",$izdato[0]->id)->get();
        
         $rented_c=count($renteda);
         $u_preko=DB::table("book_statuses")->where("name","=","U prekoracenju")->get();
         $preko=DB::table("rent_statuses")->where("book_status_id","=",$u_preko[0]->id)->get(); 
         $preko=count($preko);

         return view("rent.IznajmljivanjePrekoracenje",compact('rented','users','book',"overdue_book_info","today","preko","rented_c"));
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
