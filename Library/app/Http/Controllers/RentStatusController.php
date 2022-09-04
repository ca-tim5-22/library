<?php

namespace App\Http\Controllers;

use App\Models\RentStatus;
use App\Http\Requests\StoreRentStatusRequest;
use App\Http\Requests\UpdateRentStatusRequest;
use App\Models\Book;
use App\Models\Users;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RentStatusController extends Controller
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
     * @param  \App\Http\Requests\StoreRentStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRentStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RentStatus  $rentStatus
     * @return \Illuminate\Http\Response
     */
    public function show(RentStatus $rentStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RentStatus  $rentStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(RentStatus $rentStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRentStatusRequest  $request
     * @param  \App\Models\RentStatus  $rentStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRentStatusRequest $request, RentStatus $rentStatus)
    {
        //
    }
    public function overdue_index()
    {
        $book=Book::all();
    
        $status=DB::table("book_statuses")->where("name","=","U prekoracenju")->get();
        
        $rented=DB::table("rent_statuses")->where("book_status_id","=",$status[0]->id)->get();
       
        $overdue_book_info = [];
         foreach ($rented as $one_rent=>$value) {
           
            $overdue_book_info[] = DB::table("rents")->where("id","=",$value->renting_id)->get(); 


         }
        
         $overdue_book_info = (object) $overdue_book_info;
         $users=Users::all();
        
                     
      foreach($overdue_book_info as $rent=>$value){
            $date= Carbon::parse( $value[0]->rent_date);
            $newdate=$date->format("d-m-Y");
$value[0]->rent_date= $newdate;
            $date= Carbon::parse( $value[0]->return_date);
            $newdate=$date->format("d-m-Y");
            $value[0]->return_date= $newdate;
            
         }
         
        
         $today=date("d-m-Y");

         $izdato=DB::table("book_statuses")->where("name","=","Izdato")->get();
         $renteda=DB::table("rent_statuses")->where("book_status_id","=",$izdato[0]->id)->get();
        
         $rented_c=count($renteda);
         $u_preko=DB::table("book_statuses")->where("name","=","U prekoracenju")->get();
         $preko=DB::table("rent_statuses")->where("book_status_id","=",$u_preko[0]->id)->get(); 
         $preko=count($preko); 
        
         return view("knjigePrekoracenje",compact('rented','users','book',"overdue_book_info","today","preko","rented_c"));
    } 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RentStatus  $rentStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(RentStatus $rentStatus)
    {
        //
    }
}
