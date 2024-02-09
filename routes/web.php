<?php

use App\Http\Middleware\middleware1;
use App\Http\Middleware\middleware2;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::get('/a', function(){
//     return view('a');
// });

// Route::redirect('/','/a');

// // Route::get('/users/{id?}', function($id = 'aditya'){
// //     return("Hi, $id");
// // })->where('id','.*');

// Route::get('/user/profile', function () {
//     return "named route hit!";
// })->name('profile_route');

// Route::get('/jump',function(){
//     return redirect()->route('profile_route');
// });

// Route::get('/profile',function() {
//     return "jumped";
// });

// Route::get('/user/{id}',function($id){
//     return "$id user";
// })->name('rt')->middleware('m2');

// Route::middleware(['m1','m2'])->group(function(){
//     Route::get('/abc',function(){
//         return "middleware ends";
//     })->name('profile1');
// });

// Route::get('/user/{id}', [UserController::class, 'show'])->middleware('m1');

// Route::resource('/photos',PhotoController::class);

// Route::prefix('admin.')->group(function () {
//     Route::get('/users', function () {
//         return "hi-5";
//     })->name('users');
// });

// Route::get('users/{user}',function(User $user){
//     return $user->email;
// });
/////////////////////////////////////////////////////////////////////////////


Route::group([],function(){
    Route::get('/users',[UserController::class,'index'])->name('users.index'); // all users
    Route::get('/users/{id}',[UserController::class,'show'])->name('users.show'); // single user
    Route::post('/users',[UserController::class,'store'])->name('users.store'); // new user
    Route::delete('/users/{id}',[UserController::class,'destroy'])->name('users.destroy');// delete user
    
    Route::get('/users/edit/{user}',[UserController::class,'edit'])->name('users.edit');
    Route::patch('/users/{id}',[UserController::class,'update'])->name('users.update');
});
