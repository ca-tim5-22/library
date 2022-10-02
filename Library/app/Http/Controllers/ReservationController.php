<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Book;
use App\Models\BookStatus;
use App\Models\Gallery;
use App\Models\GlobalVariable;
use App\Models\StatusesOfReservations;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReservationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationRequest $request)
    {
        $reservation=Reservation::create([
            "date_of_submission"=>Carbon::now(),
            "date_of_reservation"=>$request->date_of_reservation,
        ]);

         $librarian=Users::findOrFail(auth()->user()->id);
         $student=Users::findOrFail($request->foruser_id);
         $librarian->userWhoReserved()->save($reservation);
         $student->forUser()->save($reservation);

         $book=Book::findOrFail($request->book);
         $book->reservation()->save($reservation);

         
        $status=DB::table("statuses_of_reservations")->where("name","=","Rezervisano")->get()->first();
        $reservation->status()->attach($status->id);

       return redirect("/book");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservationRequest  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }


    public function new($book)
    {
        $users=Users::all();
        $book=Book::findOrFail($book);
        $book_headline=DB::select(DB::raw("SELECT * from galleries WHERE book_id=$book->id;"));
        return view("reservation.rezervisiKnjigu",compact('users','book',"book_headline")); 
    }

    public function active_reservations($book){
        $active=[];
        $users=Users::all();
        $book=Book::findOrFail($book);
        $status1=StatusesOfReservations::where("name","=","Rezervisano")->get()->first();
        $status2=StatusesOfReservations::where("name","=","Odbijeno")->get()->first();
        
        $reservation_count=$book->reservation_count();
        $overdue_count=$book->overdue_count();
        $rent_count=$book->rent_count()+$overdue_count;

        $deadline=GlobalVariable::where('variable','=','Reservation_deadline')->get()->first()->value;

        $status3=BookStatus::where('name','=','Izdato')->get()->first();

        $notifications=$book->rent()->join('rent_statuses','rent_statuses.renting_id','=','rents.id')
        ->join('users as librarians','librarians.id','=','rents.user_who_rented_out_id')
        ->join('users as students','students.id','=','rents.user_who_rented_id')
        ->select('rents.*','rent_statuses.created_at','librarians.id as librarian_id','students.id as student_id','librarians.first_and_last_name as librarian','librarians.gender_id as gender','students.first_and_last_name as student')
        ->whereIn('rent_statuses.book_status_id',[$status3->id])
        ->orderBy("return_date","desc")->get();

        $active =$book->reservation()->join('reservation_statuses', 'reservation_statuses.reservation_id', '=', 'reservations.id') 
        ->select('reservations.*', 'reservation_statuses.reservation_status_id')
        ->whereIn('reservation_statuses.reservation_status_id',[$status1->id,$status2->id])->get();
         $res = DB::select(DB::raw("SELECT * FROM global_variables WHERE id = 1"));
        $res_value = $res[0]->value;
        foreach ($active as $one ) {
            
            $date = Carbon::createFromFormat("Y-m-d",$one->date_of_submission)->addDays($res_value)->format("Y-m-d");
         
            $one->datum_isteka = $date;

        $photo=Gallery::where('book_id','=',$book->id)->get()->first()->photo;


        return view("rent.iznajmljivanjeAktivne",compact('users','photo','deadline','notifications','book','active','reservation_count','reservation_count','overdue_count','rent_count'));
    }}

    public function reservations_archive($book){
        $users=Users::all();
        $book=Book::findOrFail($book);
        
        $status3=StatusesOfReservations::where("name","=","Rezervacija istekla")->get()->first();
        $status4=StatusesOfReservations::where("name","=","Izdato")->get()->first();
        $status5=StatusesOfReservations::where("name","=","Rezervacija otkazana")->get()->first();
       
        $reservation_count=$book->reservation_count();
        $overdue_count=$book->overdue_count();
        $rent_count=$book->rent_count()+$overdue_count;

        $deadline=GlobalVariable::where('variable','=','Reservation_deadline')->get()->first()->value;


        $status4=BookStatus::where('name','=','Izdato')->get()->first();
        $notifications=$book->rent()->join('rent_statuses','rent_statuses.renting_id','=','rents.id')
        ->join('users as librarians','librarians.id','=','rents.user_who_rented_out_id')
        ->join('users as students','students.id','=','rents.user_who_rented_id')
        ->select('rents.*','rent_statuses.created_at','librarians.id as librarian_id','students.id as student_id','librarians.first_and_last_name as librarian','librarians.gender_id as gender','students.first_and_last_name as student')
        ->whereIn('rent_statuses.book_status_id',[$status4->id])
        ->orderBy("return_date","desc")->get();
       

        $archive =$book->reservation()->join('reservation_statuses', 'reservation_statuses.reservation_id', '=', 'reservations.id') ->select('reservations.*', 'reservation_statuses.reservation_status_id')
        ->whereIn('reservation_statuses.reservation_status_id',[$status3->id,$status4->id,$status5->id])->get();
        $res = DB::select(DB::raw("SELECT * FROM global_variables WHERE id = 1"));
        $res_value = $res[0]->value;
        foreach ($archive as $one ) {
            
            $date = Carbon::createFromFormat("Y-m-d",$one->date_of_submission)->addDays($res_value)->format("Y-m-d");
         
            $one->datum_isteka = $date;

            
        }

        $photo=Gallery::where('book_id','=',$book->id)->get()->first()->photo;

        return view("rent.iznajmljivanjeArhivirane",compact('users','photo','deadline','notifications','book','archive','reservation_count','overdue_count','rent_count'));
    }


    public function active_reservation(){
     
        $status1=StatusesOfReservations::where("name","=","Rezervisano")->get()->first();
        $status2=StatusesOfReservations::where("name","=","Odbijeno")->get()->first();
        
        $deadline=GlobalVariable::where("variable","=","Reservation_deadline")->get()->first()->value; 
           
        $active =Reservation::join('reservation_statuses', 'reservation_statuses.reservation_id', '=', 'reservations.id')
        ->join('users','users.id','=','reservations.foruser_id')
        ->join('books','books.id','=','reservations.book_id')
        ->join('galleries','galleries.book_id','=','reservations.book_id')
        ->select('reservations.*', 'reservation_statuses.reservation_status_id as status','users.photo as student_img','users.first_and_last_name as student','books.title','galleries.photo')
        ->whereIn('reservation_statuses.reservation_status_id',[$status1->id,$status2->id])->get();

        $students=Users::where("user_type_id","=",2)->get();

        return view("reservation.aktivneRezervacije",compact('active','deadline',"students"));

    }

    public function reservation_archive(){
     
        $status1=StatusesOfReservations::where("name","=","Rezervacija istekla")->get()->first();
        $status2=StatusesOfReservations::where("name","=","Izdato")->get()->first();
        $status3=StatusesOfReservations::where("name","=","Rezervacija otkazana")->get()->first();
        
        $deadline=GlobalVariable::where('variable','=','Reservation_deadline')->get()->first()->value;
        $students=Users::where("user_type_id","=",2)->get();
        $archive =Reservation::join('reservation_statuses', 'reservation_statuses.reservation_id', '=', 'reservations.id')
        ->join('users','users.id','=','reservations.foruser_id')
        ->join('books','books.id','=','reservations.book_id')
        ->join('galleries','galleries.book_id','=','reservations.book_id')
        ->select('reservations.*', 'reservation_statuses.reservation_status_id as status','users.photo as student_img','users.first_and_last_name as student','books.title','galleries.photo')
        ->whereIn('reservation_statuses.reservation_status_id',[$status1->id,$status2->id,$status3->id])->get();


        return view("reservation.arhiviraneRezervacije",compact('archive','deadline',"students"));

    }



}
