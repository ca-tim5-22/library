<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Http\Requests\StoreRentRequest;
use App\Http\Requests\UpdateRentRequest;
use App\Models\Book;
use App\Models\GlobalVariable;
use App\Models\Student;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
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
        $users=Users::all();
        $deadline=GlobalVariable::where('variable','=','b')->get()->first();
        return view("izdajKnjigu",compact('users','deadline'));
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
               
                
             
               return redirect("/book");
            }


    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function show($rent)
    {
        $users=Users::all();
        $deadline=GlobalVariable::where('variable','=','b')->get()->first();
        $book=Book::findOrFail($rent);
        return view("izdajKnjigu",compact('users','deadline','book'));
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
