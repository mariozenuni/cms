<?php
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\VerifyCategoriesCount;
use App\Models\User;
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

Route::get('/login', function () {
    return view('welcome');
});

Auth::routes();




Route::middleware('auth')->group(function (){

Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::middleware(['auth','admin'])->group(function(){
    Route::get('users',[UsersController::class,'index'])->name('users.index');
    Route::get('user/create',[UsersController::class,'create'])->name('users.create');
    Route::post('user/save',[UsersController::class,'store'])->name('users.store');
    Route::get('user/{user}/show',[UsersController::class,'show'])->name('users.show');
    Route::get('user/{user}/edit',[UsersController::class,'edit'])->name('users.edit');
    Route::put('user/{user}/update',[UsersController::class,'update'])->name('users.update');
    Route::delete('user/{user}/delete',[UsersController::class,'delete'])->name('users.delete');


});


Route::get('test', function(){
    return view('viewquiz');
});
Route::get('    ', function(){
    return view('candidates.home');
});

Route::get('profile', function(){
    return view('candidates.profile');
});

