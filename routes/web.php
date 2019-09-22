<?php
use App\product;
use Illuminate\Support\Facades\Input;
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

// Route::get('/', function () {
//   return view('welcome');
// })->name('home');
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resources([
  'bookingPurposes'       =>  'BookingPurposeController',
  'bookingTypes'          =>  'BookingTypeController',
  'companies'             =>  'CompanyController',
  'countries'             =>  'CountryController',
  'dishTypes'             =>  'DishTypeController',
  'equipment'             =>  'EquipmentController',
  'identificationTypes'   =>  'IdentificationTypeController',
  'onlinePlateforms'      =>  'OnlinePlateformController',
  'rooms'                 =>  'RoomController',
  'roomSizes'             =>  'RoomSizeController',
  'titles'                =>  'TitleController',
  'users'                 =>  'UserController',
  'userTypes'             =>  'UserTypeController',
  'vipCards'              =>  'VipCardController',
  'bookings'              =>  'BookingController'
]);


Route::resource('dishes', 'DishController')->except(['show']);
Route::resource('customerMessages', 'CustomerMessageController')->only(['index', 'store', 'destroy']);


Route::patch('dishes/{dish}/discard_picture', 'DishController@discardPicture')->name('dishes.discardPicture');

Route::get('login', 'LoginController@login')->name('login');
Route::post('login', 'LoginController@authenticate')->name('login.authenticate');
Route::get('logout', 'LoginController@logout')->name('login.logout');

Route::get('/forbidden', function () {
  return view('forbidden');
})->name('forbidden');

