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
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ReasonForClosingReservationController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\RentStatusController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationStatusController;
use App\Http\Controllers\StatusesOfReservationsController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserTypeController;
use App\Models\ReasonForClosingReservation;
use App\Models\StatusesOfReservations;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view("dashboard.dashboard");
});

Route::get('bibliotekari',function(){
    return view('the_librarian.bibliotekari');
});
Route::get('bibliotekarprofile',function(){
    return view('the_librarian.bibliotekarProfile');
});
Route::get('novibibliotekar',function(){
    return view('create.noviBibliotekar');
});

Route::get('dashboard',function(){
    $student=DB::select(DB::raw("SELECT * FROM `users` WHERE user_type_id=1"));

    return view('dashboard.dashboard',compact("student"));

});
Route::get('dashboardaktivnost',function(){
    return view('dashboard.dashboardAktivnost');
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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("genresort",[GenreController::class,"sort"])->name("genre.sort");

Route::get("publishersort",[PublisherController::class,"sort"])->name("publisher.sort");

Route::get("categorysort",[CategoryController::class,"sort"])->name("category.sort");

Route::get("alphabetsort",[AlphabetController::class,"sort"])->name("alphabet.sort");

Route::get("bindingsort",[BindingController::class,"sort"])->name("binding.sort");
