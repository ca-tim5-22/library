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
     $rented=Rent::all();
     $users=Users::all();
     $book=Book::findOrFail($book);
    return view("rent.IznajmljivanjeIzdate",compact('rented','users','book'));
    }



   public function returned_books($book)
    {
    $rented=Rent::all();
    $users=Users::all();
    $book=Book::findOrFail($book);
    return view("rent.IznajmljivanjeVracene",compact('rented','users','book'));
    } 


    public function overdue_books($book)
    {
    $rented=Rent::all();
    $users=Users::all();
    $book=Book::findOrFail($book);
    return view("rent.IznajmljivanjePrekoracenje",compact('rented','users','book'));
    } 



    public function abandon_show($rent)
    {
    $rent=Rent::findOrFail($rent);
    return view("otpisiKnjigu",compact('rent'));
    } 

    public function abandon_book($niz) {
    $status=DB::table("book_statuses")->where("name","=","Otpisano")->get()->first();

    foreach($niz as $clan){
    $rent=Rent::findOrFail($clan);
    $rent->rent_status()->sync([$status->id]);
}
        return redirect('/book');
    } 



    public function return_show($rent)
    {
    $rent=Rent::findOrFail($rent);
    return view("vratiKnjigu",'rent');
    } 

    public function return_book($niz) {
    $status=DB::table("book_statuses")->where("name","=","Vraceno")->get()->first();

    foreach($niz as $clan){
    $rent=Rent::findOrFail($clan);
    $rent->rent_status()->sync([$status->id]);
}
    return redirect('/book');
    } 




}
