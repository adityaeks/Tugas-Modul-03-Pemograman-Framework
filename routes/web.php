<?php

use App\Http\Controllers\RouteController;
use Illuminate\Support\Facades\Route;

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
});

Route::get('/routing', function() {
    return view('routing');
});

Route::get('/basic_routing', function() {
    return 'Hello World';
});

// 4.2
Route::view('/view_route', 'view_route');
Route::view('/view_route', 'view_route', ['name' => 'Purnama']);

// 4.3
Route::get('/controller_route', [RouteController::class, 'index']);

// 4.4
Route::redirect('/', '/routing');

//4.5
Route::get('/user/{id}', function($id) {
    return "User Id: ".$id;
});
Route::get('/posts/{post}/comments/{comment}', function($postId, $commentId) {
    return "Post Id: ".$postId.", Comment Id: ".$commentId;
});

//4.6
Route::get('username/{name?}', function($name = null) {
    return 'Username: '.$name;
});

//4.7 title pada where seharusnya tulisannya harus sesuai seperti pada return yang dimana t nya huruf besar
Route::get('/title/{title}', function($title) {
    return "Title: ".$title;
})->where('Title', '[A-Za-z]+');

// 4.8
Route::get('/profile/{profileId}', [RouteController::class, 'profile'])->name('profileRouteName');

// 4.9 soal
// Route::get('/route_priority/{rpId}', function($rpId) {
//     return "This is Route One";
// });
Route::get('/route_priority/user', function() {
    return "This is Route 1";
});
Route::get('/route_priority/user', function() {
    return "This is Route 2";
});

// 4.10
Route::fallback(function() {
    return 'This is Fallback Route';
});

//4.11
Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/dashboard', function() {
        return "This is admin dashboard";
    })->name('dashboard');
    Route::get('/users', function() {
        return "This is user data on admin page";
    })->name('users');
    Route::get('/items', function() {
        return "This is item data on admin page";
    })->name('items');
});
