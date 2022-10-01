<?php

use App\Http\Controllers\AlphabetController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BindingController;
use App\Http\Controllers\BookAuthorController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookGenreController;
use App\Http\Controllers\BookStatusController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\GlobalVariableController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ReasonForClosingReservationController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\RentStatusController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationStatusController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\StatusesOfReservationsController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserTypeController;
use App\Models\ReasonForClosingReservation;
use App\Models\StatusesOfReservations;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StudentController;
use App\Models\Book;
use App\Models\BookStatus;
use App\Models\GlobalVariable;
use App\Models\Reservation;
use App\Models\Student;
use App\Models\User;
use App\Models\Users;
use App\Models\UserType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/baza', function () {
    $categories=[ "Action and adventure","Art/architecture","Alternate history","Autobiography","Anthology","Biography","Chick lit","Business/economics","Children's","Crafts/hobbies","Classic","Cookbook","Comic book","Diary","Coming-of-age","Dictionary","Crime","Encyclopedia","Drama","Guide","Fairytale","Health/fitness","Fantasy","History","Graphic novel","Home and garden","Historical fiction","Humor","Horror","Journal","Mystery","Math","Paranormal romance","Memoir","Picture book","Philosophy","Poetry","Prayer","Political thriller","Religion, spirituality, and new age","Romance","Textbook","Satire","True crime","Science fiction","Review","Short story","Science","Suspense","Self help","Thriller","Sports and leisure","Western","Travel","Young adult","True crime"];

foreach ($categories as $category) {
    DB::select(DB::raw("INSERT INTO `categories` (`id`, `name`, `icon`, `description`, `created_at`, `updated_at`) VALUES (NULL, \"$category\", NULL, 'Category', '2022-08-13 00:00:00', '2022-08-13 00:00:00');
"));
} 

$genres=["Poetry","Drama/Play","Essay","Short story","Novel"];
foreach ($genres as $genre) {
    DB::select(DB::raw("INSERT INTO `genres` (`id`, `name`, `icon`, `description`, `created_at`, `updated_at`) VALUES (NULL, \"$genre\", NULL, 'Genre', '2022-08-13 00:00:00', '2022-08-13 00:00:00');
"));
      
    } 



   $formats=[ "Small Square( 18x18 cm )","Standard Portrait( 20x25 cm )","Standard Landscape( 25x20 cm )","Large Landscape( 33x28 cm )","Large Square( 30x30 cm )"];

   foreach ($formats as $format) {
    DB::select(DB::raw("INSERT INTO `formats` (`id`, `name`, `created_at`, `updated_at`) VALUES (NULL, \"$format\",'2022-08-13 00:00:00', '2022-08-13 00:00:00');
"));} 


$bindings=[ "Saddle stitch binding","PUR binding","Hardcover or case binding","Singer sewn binding","Section sewn binding","Coptic stitch binding","Wiro, comb or spiral binding","Interscrew binding","Japanese binding","Solander boxes and slipcases"];

   foreach ($bindings as $binding) {
    DB::select(DB::raw("INSERT INTO `bindings` (`id`, `name`, `created_at`, `updated_at`) VALUES (NULL, \"$binding\",'2022-08-13 00:00:00', '2022-08-13 00:00:00');
"));} 


 $publishers=[
 "Alchemy Press Book of Horrors","Alfresco Press","Anchor Book Press","Anthem Press","Arbordale Publishing","Arcade Publishing"	,"Arcadia Publishing"	,"Arkham House"	,"Armida Publications"	,"August House Publishers"	,"Autumn House Press"	,"B & W Publishing"	,"Balboa Press"	,"Beacon Publishing"	,"Biblio Publishing"	,"Bloomsbury"	,"Blossom Spring Publishing"	,"Blue manatee press"	,"Blue Swan Publishing"	,"BookPress Publishing"	,"Brick Cave Media"	,"Capstone Publishers"	,"Chelsea Green Publishing"
   ];
    foreach ($publishers as $publisher) {
     DB::select(DB::raw("INSERT INTO `publishers` (`id`, `name`, `created_at`, `updated_at`) VALUES (NULL, \"$publisher\",'2022-08-13 00:00:00', '2022-08-13 00:00:00');
 "));}
 
 $user_type=UserType::find(1); 
 if(is_null($user_type)){
     UserType::create([
         "name" => "bibliotekar",
     ]);
     UserType::create([
         "name" => "ucenik",
     ]);}

  $global_variables= GlobalVariable::find(1); 

 if(is_null($global_variables)){
     GlobalVariable::create([
         "variable" => "Reservation_deadline",
         "value" => 1,
     ]);
     GlobalVariable::create([
         "variable" => "Returnment_deadline",
         "value" => 1,
     ]);
     GlobalVariable::create([
         "variable" => "Conflict_deadline",
         "value" => 1,
     ]);
 }
     $book_statuses= BookStatus::find(1); 

     if(is_null($book_statuses)){
         BookStatus::create([
             "name"=>"Rezervisano"
         ]);
         BookStatus::create([
             "name"=>"Izdato"
         ]);
         BookStatus::create([
             "name"=>"Vraceno"
         ]);
         BookStatus::create([
             "name"=>"U prekoracenju"
         ]);
         BookStatus::create([
             "name"=>"Otpisano"
         ]);
     
 }

 Users::create([
    "user_type_id"=>1,
    "first_and_last_name"=>"Admin",
    "email"=>"admin@gmail.com",
    "username"=>"Admin",
    "PIN"=>1231234,
    "password"=>Hash::make("admin"),
]);

$book_statuses= StatusesOfReservations::find(1); 

if(is_null($book_statuses)){
    StatusesOfReservations::create([
        "name"=>"Rezervisano"
    ]);
    StatusesOfReservations::create([
        "name"=>"Odbijeno"
    ]);
    StatusesOfReservations::create([
        "name"=>"Rezervacija istekla"
    ]);
    StatusesOfReservations::create([
        "name"=>"Izdato"
    ]);
    StatusesOfReservations::create([
        "name"=>"Rezervacija otkazana"
    ]);

}






});





Route::get('/', function () {
    return redirect()->route("login");
});

Auth::routes();

 Route::group(['middleware' => 'auth'], function(){
   
Route::get("book/newBookSpecification",function(){
    $bindings=DB::select(DB::raw("SELECT * FROM `bindings`"));
    $bindings = (object) $bindings;
    $alphabets=DB::select(DB::raw("SELECT * FROM `alphabets`"));
    $alphabets = (object) $alphabets;
    $formats=DB::select(DB::raw("SELECT * FROM `formats`"));
    $formats = (object) $formats;
    return view("create.novaknjigaSpecifikacija",compact("bindings","alphabets","formats"));
});

Route::get("book/newBookMultimedia",function(){
    
    return view("create.novaKnjigaMultimedija");
});

Route::get('dashboard',function(){
    $all= DB::select(DB::raw("SELECT rent_statuses.renting_id,rent_statuses.book_status_id,rents.id,rents.book_id,rents.user_who_rented_out_id,rents.user_who_rented_id,rents.user_who_received_back_id,rents.rent_date,rents.return_date,rent_statuses.created_at FROM rents INNER JOIN rent_statuses ON rents.id = rent_statuses.renting_id WHERE rent_statuses.book_status_id = 3 OR rent_statuses.book_status_id = 4 OR rent_statuses.book_status_id = 2 ORDER BY rent_statuses.created_at DESC LIMIT 10;"));
    $user_type=UserType::find(1); 
    if(is_null($user_type)){
        UserType::create([
            "name" => "bibliotekar",
        ]);
        UserType::create([
            "name" => "ucenik",
        ]);}

     $global_variables= GlobalVariable::find(1); 

    if(is_null($global_variables)){
        GlobalVariable::create([
            "variable" => "Reservation_deadline",
            "value" => 1,
        ]);
        GlobalVariable::create([
            "variable" => "Returnment_deadline",
            "value" => 1,
        ]);
        GlobalVariable::create([
            "variable" => "Conflict_deadline",
            "value" => 1,
        ]);
    }
        $book_statuses= BookStatus::find(1); 

        if(is_null($book_statuses)){
            BookStatus::create([
                "name"=>"Rezervisano"
            ]);
            BookStatus::create([
                "name"=>"Izdato"
            ]);
            BookStatus::create([
                "name"=>"Vraceno"
            ]);
            BookStatus::create([
                "name"=>"U prekoracenju"
            ]);
            BookStatus::create([
                "name"=>"Otpisano"
            ]);
            BookStatus::create([
                "name"=>"Vraceno sa prekoracenjem"
            ]);
    


    }
    

     
    $student=DB::select(DB::raw("SELECT * FROM `users` WHERE user_type_id=2"));
    $student = (object) $student;
    $librarian= DB::select(DB::raw("SELECT * FROM `users` WHERE user_type_id=1"));
    $librarian = (object) $librarian;
    $rented_books = DB::select(DB::raw("SELECT COUNT(id) as rent FROM rent_statuses WHERE `book_status_id` = 2;"));
    $rented_books = (object) $rented_books;
    $u_preko = DB::select(DB::raw("SELECT COUNT(id) as u_preko FROM rent_statuses WHERE `book_status_id` = 4;"));
    $u_preko = (object) $u_preko;
    $muski = DB::select(DB::raw("SELECT * FROM genders WHERE name =\"Muski\";"));
    $muski = (object) $muski;
    $zenski = DB::select(DB::raw("SELECT * FROM genders WHERE name =\"Zenski\";"));
    $zenski = (object) $zenski;
    $books=Book::all();


    foreach($u_preko as $u_preko){
        $u_preko = $u_preko->u_preko;
    }
    foreach($rented_books as $rent){
        $rented = $rent->rent;
    }
    
    
   
    return view('dashboard.dashboard',compact("student","librarian","rented","u_preko","all","books","muski","zenski"));
})->name("dashboard");

Route::get('dashboardaktivnost',function(){
    $all= DB::select(DB::raw("SELECT rent_statuses.renting_id,rent_statuses.book_status_id,rents.id,rents.book_id,rents.user_who_rented_out_id,rents.user_who_rented_id,rents.user_who_received_back_id,rents.rent_date,rents.return_date,rent_statuses.created_at FROM rents INNER JOIN rent_statuses ON rents.id = rent_statuses.renting_id WHERE rent_statuses.book_status_id = 3 OR rent_statuses.book_status_id = 4 OR rent_statuses.book_status_id = 2 ORDER BY rent_statuses.created_at DESC;"));
      $books=Book::all();
    $student=DB::select(DB::raw("SELECT * FROM `users` WHERE user_type_id=2"));
    $student = (object) $student;
    $librarian= DB::select(DB::raw("SELECT * FROM `users` WHERE user_type_id=1"));
    $librarian = (object) $librarian;
    $muski = DB::select(DB::raw("SELECT * FROM genders WHERE name =\"Muski\";"));
    $muski = (object) $muski;
    $zenski = DB::select(DB::raw("SELECT * FROM genders WHERE name =\"Zenski\";"));
    $zenski = (object) $zenski;
   
    return view('dashboard.dashboardAktivnost',compact("all","student","librarian","muski","zenski","books"));
});
Route::resource('alphabet',AlphabetController::class);
Route::resource('author',AuthorController::class);
Route::resource('binding',BindingController::class);
Route::resource('bookauthor',BookAuthorController::class);
Route::resource('bookcategory',BookCategoryController::class);
Route::resource('book',BookController::class);
Route::resource('bookgenre',BookGenreController::class);
Route::resource('bookstatus',BookStatusController::class);
Route::resource('category',CategoryController::class);
Route::resource('format',FormatController::class);
Route::resource('gallery',GalleryController::class);
Route::resource('genre',GenreController::class);
Route::resource('globalvariable',GlobalVariableController::class);
Route::resource('language',LanguageController::class);
Route::resource('publisher',PublisherController::class);
Route::resource('reasonforclosingreservation',ReasonForClosingReservationController::class);
Route::resource('rent',RentController::class);
Route::resource('rentstatus',RentStatusController::class);
Route::resource('reservation',ReservationController::class);
Route::resource('reservationstatus',ReservationStatusController::class);
Route::resource('statusesofreservations',StatusesOfReservationsController::class);
Route::resource('userlogin',UserLoginController::class);
Route::resource('users',UsersController::class);
Route::resource('usertype',UserTypeController::class);
Route::resource("student",StudentController::class);
Route::resource('librarian',LibrarianController::class);
Route::resource('resetpassword',ResetPassword::class);




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("genresort",[GenreController::class,"sort"])->name("genre.sort");

Route::get("publishersort",[PublisherController::class,"sort"])->name("publisher.sort");

Route::get("categorysort",[CategoryController::class,"sort"])->name("category.sort");

Route::get("alphabetsort",[AlphabetController::class,"sort"])->name("alphabet.sort");

Route::get("bindingsort",[BindingController::class,"sort"])->name("binding.sort");

Route::get("authorsort",[AuthorController::class,"sort"])->name("author.sort");

Route::get("formatsort",[FormatController::class,"sort"])->name("format.sort");

Route::get("librariansort",[LibrarianController::class,"sort"])->name("librarian.sort");

Route::get("studentsort",[StudentController::class,"sort"])->name("student.sort");

Route::get("booksort",[BookController::class,"sort"])->name("book.sort");

Route::get("languagesort",[LanguageController::class,"sort"])->name("language.sort");

Route::get("newrent/{book}",[RentController::class,"new"])->name("rent.new");

Route::get("newreservation/{book}",[ReservationController::class,"new"])->name("reservation.new");

Route::get("rented/{book}",[RentController::class,"rented_books"])->name("rent.rented");

Route::get("returned/{book}",[RentController::class,"returned_books"])->name("rent.returned");

Route::get("returned",[RentController::class,"returned_index"])->name("rent.returned_index");

Route::get("overdue/{book}",[RentController::class,"overdue_books"])->name("rent.overdue");

Route::get("abandon/{id}",[RentController::class,"abandon_book"])->name("rent.abandon");

Route::get("returnbook/{book}",[RentController::class,"return_book"])->name("rent.returnbook");

Route::get("overdue",[RentStatusController::class,"overdue_index"])->name("overdue_index");

Route::get("returnbookindex/{book}",[RentController::class,"return_book_index"])->name("return_index");

Route::get("reservation/active/{book}",[ReservationController::class,"active_reservations"])->name("reservation.active");

Route::get("reservation/archive/{book}",[ReservationController::class,"reservations_archive"])->name("reservation.archive");

Route::get("reservations/active",[ReservationController::class,"active_reservation"])->name("active");

Route::get("reservations/archive",[ReservationController::class,"reservation_archive"])->name("archive");

Route::get("student/rented/{student}",[StudentController::class,"rented"])->name("student.rented");

Route::get("student/overdue/{student}",[StudentController::class,"overdue"])->name("student.overdue");

Route::get("student/returned/{student}",[StudentController::class,"returned"])->name("student.returned");

Route::get("student/archive/{student}",[StudentController::class,"archive"])->name("student.archive");

Route::get("student/active/{student}",[StudentController::class,"active"])->name("student.active");

Route::get("rent/reservation/{reservation}",[RentController::class,"rent_from_reservation"])->name("rent.reservation");



/*-------------------------------------------------------------------------------------------*/

Route::get("bookspec",[BookController::class,"spec"])->name("book.spec");
 }); 