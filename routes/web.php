<?php

use App\Http\Controllers\BarberController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GetCommune;
use App\Http\Controllers\IndexServer;
use App\Http\Controllers\LangChange;
use App\Http\Controllers\ReviewsController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/',IndexServer::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/barberProfile',[BarberController::class,'index']);
Route::post('/barberUpdate/{id}',[BarberController::class,'barberUpdate']);
Route::post('/workingTimeUpdate/{id}',[BarberController::class,'workingTimeUpdate']);
Route::post('/deleteBarberService/{id}',[BarberController::class,'deleteBarberService']);
Route::post('/addNewService',[BarberController::class,'addNewService']);
Route::post('/approuveBooking/{id}',[BarberController::class,'approuveBooking']);
Route::post('/dleltBooking/{id}',[BarberController::class,'dleltBooking']);
Route::post('/storeGallery',[BarberController::class,'storeGallery']);
Route::post('/deleltImage/{id}',[BarberController::class,'deleltImage']);
Route::get('/priceListe',[BarberController::class,'priceListe']);
Route::get('/barberUpdateView{id}',[BarberController::class,'barberUpdateView']);
Route::get('/workingTime',[BarberController::class,'workingTime']);
Route::get('/createGallery',[BarberController::class,'createGallery']);

Route::post('/addBooking',[BarberController::class,'addBooking']);
Route::post('/addReview',[BarberController::class,'addReview']);
Route::get('/barberBooking',[BarberController::class,'barberBooking']);
Route::get('/rate',[BarberController::class,'rate']);
Route::get('/booking',[BarberController::class,'booking']);
Route::get('/deletReview{id}',[ReviewsController::class,'deletReview']);
Route::get('/approveReview{id}',[ReviewsController::class,'approveReview']);

Route::get('/barberList',[CustomerController::class,'barberList']);
Route::get('/bookingHistory',[CustomerController::class,'bookingHistory']);
Route::get('/customerCreate',[CustomerController::class,'customerCreate']);
Route::get('/customerProfile',[CustomerController::class,'customerProfile']);
Route::get('/customerRating',[CustomerController::class,'customerRating']);
Route::get('/customerUpdate',[CustomerController::class,'customerUpdate']);
Route::get('/searchBarber',[CustomerController::class,'searchBarber']);

Route::get('/appointmentHistory',[CustomerController::class,'appointmentHistory']);
Route::post('/deletBookingHistory',[CustomerController::class,'deletBookingHistory']);
Route::get('/bookBarber',[CustomerController::class,'bookBarber']);
Route::get('/commune',GetCommune::class);
Route::post('/getBarbersSearched',[CustomerController::class,'getBarbersSearched']);
Route::post('/customer_update',[CustomerController::class,'customer_update']);
// arabic area =========================================================================================================
Route::get('/lang',[CustomerController::class,'lang']);