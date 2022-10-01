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
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\URL;
class RentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {    
        
        $status=DB::table("book_statuses")->where("name","=","Izdato")->get();
        
        $rented=DB::table("rent_statuses")->where("book_status_id","=",$status[0]->id)->get();

        $rented_book_info = [];
       
        
       
        $books = Book::all();
        $users=Users::all();

        $url= URL::previous();
        if($request->paginate != null){
            $librarians = DB::table("users")->where("user_type_id","=",1)->orderBy("users.first_and_last_name","ASC")->paginate($request->paginate,"*","page");
            foreach ($rented as $one_rent=>$value) {
       
                $rented_book_info[] = DB::table("rents")->join("rent_statuses","rents.id","=","rent_statuses.renting_id")->join("books","rents.book_id","=","books.id")->where("rents.id","=",$value->renting_id)->paginate($request->paginate,"*","page");
                }
            
            session(["currentpag"=>$request->paginate]);
            $currentpag=$request->paginate;

            
          
        }else{
           
            if(session("currentpag") != null){
                $currentpag=session("currentpag");
         
                
            }else{
                $currentpag=2;
            }
            foreach ($rented as $one_rent=>$value) {
       
                $rented_book_info[] = DB::table("rents")->join("rent_statuses","rents.id","=","rent_statuses.renting_id")->join("books","rents.book_id","=","books.id")->where("rents.id","=",$value->renting_id)->paginate($currentpag,"*","page");
                }
            
            
        }
        
        $rented_book_info = (object) $rented_book_info;
      
        return view("izdateKnjige",compact("books","rented","rented_book_info","users"));
    }

    public function sort(Request $request)
    {    
        
        $status=DB::table("book_statuses")->where("name","=","Izdato")->get();
        
        $rented=DB::table("rent_statuses")->where("book_status_id","=",$status[0]->id)->get();

        $rented_book_info = [];
       
        
       
        $books = Book::all();
        $users=Users::all();

        $url= URL::previous();
        if($request->paginate != null){
            
            foreach ($rented as $one_rent=>$value) {
       
                $rented_book_info[] = DB::table("rents")->join("rent_statuses","rents.id","=","rent_statuses.renting_id")->join("books","rents.book_id","=","books.id")->where("rents.id","=",$value->renting_id)->paginate($request->paginate,"*","page");
                }
            
            session(["currentpag"=>$request->paginate]);
            $currentpag=$request->paginate;

            
          
        }else{
           
            if(session("currentpag") != null){
                $currentpag=session("currentpag");
         
                
            }else{
                $currentpag=2;
            }
            foreach ($rented as $one_rent=>$value) {
       
                $rented_book_info[] = DB::table("rents")->join("rent_statuses","rents.id","=","rent_statuses.renting_id")->join("books","rents.book_id","=","books.id")->where("rents.id","=",$value->renting_id)->paginate($currentpag,"*","page");
                }
            
            
        }
        $rented_book_info = (object) $rented_book_info;

      
        
        return view("izdateKnjige",compact("books","rented","rented_book_info","users"));
       
    }


    public function returned_index()
    {    
        
        $status=BookStatus::where("name","=","Vraceno")->get()->first();    
        $returned =$status->rent()->join('users as u1','u1.id','=','rents.user_who_rented_id')
        ->join('users as u2','u2.id','=','rents.user_who_received_back_id')
        ->join('books','books.id','=','rents.book_id')->join('galleries','galleries.book_id','=','rents.book_id')
        ->select('rents.*', 'u1.first_and_last_name as student','u2.first_and_last_name as librarian','rent_statuses.updated_at','books.title','galleries.photo')->get();


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

$date= Carbon::parse($rented[0]->created_at);
                                        
$newdate=$date->format("d-m-Y H:i:s");
$today=date("d-m-Y H:i:s");

$a= strtotime($today) - strtotime($newdate);
$sec = $a;

$a= abs(round($a / 86400));



        return view("izdavanjeDetalji",compact("rent","book","naslovna","librarian","student","newdate","overdue","a","sec"));
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
         
        $reservation_count=$book->reservation_count();
        $overdue_count=$book->overdue_count();
        $rent_count=$book->rent_count()+$overdue_count;


        $users=Users::all();
    
    return view("rent.IznajmljivanjeIzdate",compact('rents','users','book','reservation_count', 'overdue_count' , 'rent_count'));
    }



   public function returned_books($book)
    {
    $book=Book::findOrFail($book);
    $status=DB::table("book_statuses")->where("name","=","Vraceno")->get();
    $status_id = $status[0]->id;
    $rented=DB::select(DB::raw("SELECT * FROM rent_statuses WHERE book_status_id = $status_id ORDER BY rent_statuses.updated_at DESC"));
  
    $rented_book_info = [];
     foreach ($rented as $returned) {
  
       /*  $rented_book_info[] = DB::select(DB::raw("SELECT * FROM rents WHERE id = $value->renting_id AND book_id = $book->id;"));  */

       $one_returned=Rent::findOrFail($returned->renting_id);
        if($book->id==$one_returned->book_id)
         $rented_book_info[]=$one_returned;   
     }

     $reservation_count=$book->reservation_count();
     $overdue_count=$book->overdue_count();
     $rent_count=$book->rent_count()+$overdue_count;
     
     $users=Users::all();

     return view("rent.IznajmljivanjeVracene",compact('rented','users','book',"rented_book_info","reservation_count","overdue_count","rent_count"));
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

         
      
        /*  $u_preko=DB::table("book_statuses")->where("name","=","U prekoracenju")->get();
         $preko=DB::table("rent_statuses")->where("book_status_id","=",$u_preko[0]->id)->get(); 
         $preko=count($preko); */

         return view("rent.IznajmljivanjePrekoracenje",compact('rented','users','book',"overdue_book_info","today","preko","reservation_count","overdue_count","rent_count"));
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
  
          $rent=Rent::findOrFail($id);
    $rent_status=DB::table("rent_statuses")->where("renting_id","=",$rent->id)->get();
    $user_id = Auth()->user()->id;
    DB::select(DB::raw("UPDATE rent_statuses SET book_status_id = $status->id WHERE renting_id = $id"));
    
    
    DB::select(DB::raw("UPDATE rents SET user_who_received_back_id = $user_id WHERE id = $id"));
    DB::select(DB::raw("UPDATE rent_statuses SET updated_at = now() WHERE renting_id = $id"));
    
    
    
   
    /* foreach($niz as $clan){
    $rent=Rent::findOrFail($clan);
    $rent->rent_status()->sync([$status->id]);
} */


    return redirect('/rented/'.$rent->book_id);
    } 

    public function return_more(Request $request){
        
        $status=DB::table("book_statuses")->where("name","=","Vraceno")->get()->first();
        $ids = $request->rent_id;
foreach($ids as $id){
         $rent=Rent::findOrFail($id);
    $rent_status=DB::table("rent_statuses")->where("renting_id","=",$rent->id)->get();
    $user_id = Auth()->user()->id;
    DB::select(DB::raw("UPDATE rent_statuses SET book_status_id = $status->id WHERE renting_id = $id"));
    
    
    DB::select(DB::raw("UPDATE rents SET user_who_received_back_id = $user_id WHERE id = $id"));
    DB::select(DB::raw("UPDATE rent_statuses SET updated_at = now() WHERE renting_id = $id"));
    }
    return redirect('/rented/'.$rent->book_id);
} 
public function abandon_more(Request $request) {
   
    $status=DB::table("book_statuses")->where("name","=","Otpisano")->get()->first();
    $ids = $request->rent_id;
    foreach($ids as $id){
    $rent=Rent::findOrFail($id);
    $rent_status=DB::table("rent_statuses")->where("renting_id","=",$rent->id)->get();
    $book = Book::findOrFail($rent->book_id);
    $new_book_total = $book->total - 1;
    DB::select(DB::raw("UPDATE rent_statuses SET book_status_id = $status->id WHERE renting_id = $id"));
    DB::select(DB::raw("UPDATE books SET total = $new_book_total WHERE id = $book->id"));
}

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


}
