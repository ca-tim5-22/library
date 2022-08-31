<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Book;
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
        $book=Book::findOrFail($book);
        $status1=StatusesOfReservations::where("name","=","Rezervisano")->get()->first();
        $status2=StatusesOfReservations::where("name","=","Odbijeno")->get()->first();
        $active=$book->test()->where("reservation_status_id","=",$status1->id)->orWhere("reservation_status_id","=",$status2->id)->get();

        dd($active);
        return view("rent.iznajmljivanjeAktivne",compact('book','active'));
    }
}
