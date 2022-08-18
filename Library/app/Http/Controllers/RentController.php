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
        

        return view("rent.IznajmljivanjeIzdate");
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
}
