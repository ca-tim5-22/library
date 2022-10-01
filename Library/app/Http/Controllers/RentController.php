<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Http\Requests\StoreRentRequest;
use App\Http\Requests\UpdateRentRequest;
use App\Models\Book;
use App\Models\BookStatus;
use App\Models\Gallery;
use App\Models\GlobalVariable;
use App\Models\RentStatus;
use App\Models\Reservation;
use App\Models\StatusesOfReservations;
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
       
        $status1=BookStatus::where("name","=","U prekoracenju")->get()->first();
        $status2=BookStatus::where("name","=","Izdato")->get()->first();
    

       

        $rents =Rent::join('rent_statuses', 'rent_statuses.renting_id', '=', 'rents.id')
        ->join('users as u1','u1.id','=','rents.user_who_rented_id')
        ->join('users as u2','u2.id','=','rents.user_who_rented_out_id')
        ->join('books','books.id','=','rents.book_id')
        ->join('galleries','galleries.book_id','=','rents.book_id')
        ->select('rents.*', 'rent_statuses.book_status_id as status','u1.first_and_last_name as student','u2.first_and_last_name as librarian','books.title','galleries.photo')
        ->whereIn('rent_statuses.book_status_id',[$status1->id,$status2->id])->get();
      

        return view("izdateKnjige",compact("rents"));
    }


    public function returned_index()
    {    
        
        $status1=BookStatus::where("name","=","Vraceno")->get()->first();    
        
        $status2=BookStatus::where("name","=","Vraceno sa prekoracenjem")->get()->first();    
        
        $returned =Rent::join('rent_statuses', 'rent_statuses.renting_id', '=', 'rents.id')
        ->join('users as u1','u1.id','=','rents.user_who_rented_id')
        ->join('users as u2','u2.id','=','rents.user_who_received_back_id')
        ->join('books','books.id','=','rents.book_id')->join('galleries','galleries.book_id','=','rents.book_id')
        ->select('rents.*', 'u1.first_and_last_name as student','u2.first_and_last_name as librarian','rent_statuses.updated_at','rent_statuses.book_status_id','books.title','galleries.photo')
        ->whereIn('rent_statuses.book_status_id',[$status1->id,$status2->id])->get();
    


        return view("vraceneKnjige",compact("returned"));
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


                   $reservation_count=$book->reservation_count();
                   $overdue_count=$book->overdue_count();
                   $rent_count=$book->rent_count()+$overdue_count;

                return view("izdajKnjigu",compact('users','deadline','book',"book_headline","preko","reservation_count","overdue_count","rent_count"));
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
        $rented=DB::table("rent_statuses")->where("renting_id","=",$rent->id)->get()->first();
        $naslovna =DB::table("galleries")->where("book_id", "=",$id)->where("headline","=",1)->get();
$librarian =Users::findOrFail($rent->user_who_rented_out_id);
$student =Users::findOrFail($rent->user_who_rented_id);
$date= Carbon::parse($rent->rent_date);
                                        
$newdate=$date->format("d-m-Y");
$today=date("d-m-Y");

$a= strtotime($newdate) - strtotime($today);

$a= abs(round($a / 86400));



        return view("izdavanjeDetalji",compact("rent","rented","book","naslovna","librarian","student","newdate","overdue","a"));
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
        $book= Book::findOrFail($book);
        $rents= new RentStatus();
        $rents= $rents->all_rented_pieces_of_books($book);
         
        $photo=Gallery::where('book_id','=',$book->id)->get()->first()->photo;

        $reservation_count=$book->reservation_count();
        $overdue_count=$book->overdue_count();
        $rent_count=$book->rent_count()+$overdue_count;

        $status3=BookStatus::where('name','=','Izdato')->get()->first();

        $notifications=$book->rent()->join('rent_statuses','rent_statuses.renting_id','=','rents.id')
        ->join('users as librarians','librarians.id','=','rents.user_who_rented_out_id')
        ->join('users as students','students.id','=','rents.user_who_rented_id')
        ->select('rents.*','rent_statuses.created_at','librarians.id as librarian_id','students.id as student_id','librarians.first_and_last_name as librarian','librarians.gender_id as gender','students.first_and_last_name as student')
        ->whereIn('rent_statuses.book_status_id',[$status3->id])
        ->orderBy("return_date","desc")->get();

        $users=Users::all();
    
    return view("rent.IznajmljivanjeIzdate",compact('rents','photo','notifications','users','book','reservation_count', 'overdue_count' , 'rent_count'));
    }



   public function returned_books($book)
    {
    $book=Book::findOrFail($book);
    $status=DB::table("book_statuses")->where("name","=","Vraceno")->get();

    $status2=DB::table("book_statuses")->where("name","=","Vraceno sa prekoracenjem")->get()->first();

    $status_id = $status[0]->id;
    $rented=DB::select(DB::raw("SELECT * FROM rent_statuses WHERE book_status_id = $status_id OR book_status_id = $status2->id"));
  
    $rented_book_info = [];
     foreach ($rented as $returned) {

       $one_returned=Rent::findOrFail($returned->renting_id);
        if($book->id==$one_returned->book_id)
         $rented_book_info[]=$one_returned;   
     }

     $reservation_count=$book->reservation_count();
     $overdue_count=$book->overdue_count();
     $rent_count=$book->rent_count()+$overdue_count;
     
     $users=Users::all();

     $status3=BookStatus::where('name','=','Izdato')->get()->first();

     $photo=Gallery::where('book_id','=',$book->id)->get()->first()->photo;

     $notifications=$book->rent()->join('rent_statuses','rent_statuses.renting_id','=','rents.id')
     ->join('users as librarians','librarians.id','=','rents.user_who_rented_out_id')
     ->join('users as students','students.id','=','rents.user_who_rented_id')
     ->select('rents.*','rent_statuses.created_at','librarians.id as librarian_id','students.id as student_id','librarians.first_and_last_name as librarian','librarians.gender_id as gender','students.first_and_last_name as student')
     ->orderBy("return_date","desc")
     ->whereIn('rent_statuses.book_status_id',[$status3->id])
     ->get();
 

     return view("rent.IznajmljivanjeVracene",compact('rented','photo','notifications','users','book',"rented_book_info","reservation_count","overdue_count","rent_count"));
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

         $reservation_count=$book->reservation_count();
         $overdue_count=$book->overdue_count();
         $rent_count=$book->rent_count()+$overdue_count;

         $photo=Gallery::where('book_id','=',$book->id)->get()->first()->photo;

         $status3=BookStatus::where('name','=','Izdato')->get()->first();

         $notifications=$book->rent()->join('rent_statuses','rent_statuses.renting_id','=','rents.id')
         ->join('users as librarians','librarians.id','=','rents.user_who_rented_out_id')
         ->join('users as students','students.id','=','rents.user_who_rented_id')
         ->select('rents.*','rent_statuses.created_at','librarians.id as librarian_id','students.id as student_id','librarians.first_and_last_name as librarian','librarians.gender_id as gender','students.first_and_last_name as student')
         ->whereIn('rent_statuses.book_status_id',[$status3->id])
         ->orderBy("return_date","desc")->get();
      
        /*  $u_preko=DB::table("book_statuses")->where("name","=","U prekoracenju")->get();
         $preko=DB::table("rent_statuses")->where("book_status_id","=",$u_preko[0]->id)->get(); 
         $preko=count($preko); */

         return view("rent.IznajmljivanjePrekoracenje",compact('rented','photo','notifications','users','book',"overdue_book_info","today","preko","reservation_count","overdue_count","rent_count"));
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
        $book = Book::findOrFail($rent->book_id);
        $new_book_total = $book->total - 1;
        DB::select(DB::raw("UPDATE rent_statuses SET book_status_id = $status->id WHERE renting_id = $id"));
        DB::select(DB::raw("UPDATE books SET total = $new_book_total WHERE id = $book->id"));
    
    
        /* foreach($niz as $clan){
        $rent=Rent::findOrFail($clan);
        $rent->rent_status()->sync([$status->id]);
    } */
        return redirect('/rented/'.$rent->book_id);

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
    $status2=DB::table("book_statuses")->where("name","=","U prekoracenju")->get()->first();
    $status3=DB::table("book_statuses")->where("name","=","Vraceno sa prekoracenjem")->get()->first();
    $rent=Rent::findOrFail($id);
    $rent_status=DB::table("rent_statuses")->where("renting_id","=",$rent->id)->get()->first();

    if($rent_status->book_status_id==$status2->id){

        DB::select(DB::raw("UPDATE rent_statuses SET book_status_id = $status3->id WHERE renting_id = $id"));
    }
    else{
        DB::select(DB::raw("UPDATE rent_statuses SET book_status_id = $status->id WHERE renting_id = $id"));
    }



    $user_id = Auth()->user()->id;
  
    
    
    DB::select(DB::raw("UPDATE rents SET user_who_received_back_id = $user_id WHERE id = $id"));
    DB::select(DB::raw("UPDATE rent_statuses SET updated_at = now() WHERE renting_id = $id"));
    /* foreach($niz as $clan){
    $rent=Rent::findOrFail($clan);
    $rent->rent_status()->sync([$status->id]);
} */


    return redirect('/rented/'.$rent->book_id);
    } 

   
    public function return_book_index($book){
        $book=Book::findOrFail($book);
        $status=DB::table("book_statuses")->where("name","=","Izdato")->get();
    $status_id = $status[0]->id;
    $rented=DB::table("rent_statuses")->where("book_status_id","=",$status_id)->get(); 
    $rented_book_info = [];
     foreach ($rented as $rent) {
        /* $rented_book_info =  DB::select(DB::raw("SELECT * FROM rents WHERE id = $value->renting_id AND book_id = $book->id;"));  */
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
        $students=Users::all()->where("user_type_id","=",2);
        return view("vratiKnjigu",compact("book","students","rented","rented_book_info","preko"));
    }




    public function rent_from_reservation(Reservation $reservation)
    {
        $deadline=GlobalVariable::where('variable','=','Returnment_deadline')->get()->first();
        $status=StatusesOfReservations::where('name','=','Izdato')->get()->first();
      
        $reservation->status()->sync($status->id);
          
        $rent_date = Carbon::now();
        $return_date=Carbon::now()->addDays($deadline->value);
        $rent=Rent::create([
            "rent_date"=>$rent_date,
            "return_date"=>$return_date
        ]);


         $librarian=Users::findOrFail(auth()->user()->id);
         $librarian->userWhoRentedOut()->save($rent);

         $student=Users::findOrFail($reservation->foruser_id);
         $book=Book::findOrFail($reservation->book_id);
         $book->rented++;
         $book->save();
         
         $student->userWhoRented()->save($rent);
         $book->rent()->save($rent);
        $status=DB::table("book_statuses")->where("name","=","Izdato")->get()->first();

         $rent->rent_status()->attach($status->id);

     
       return redirect("/rent");
    

    }

}
