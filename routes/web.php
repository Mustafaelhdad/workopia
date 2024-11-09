<?php

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

Route::get('/jobs', function () {
    return 'available jobs';
})->name('jobs');

Route::match(['get', 'post'],'/submit', function () {
    return 'submitted';
});

Route::get('/test', function() {
    $url = route('jobs');
    return "<a href='$url'>click here</a>";
});

Route::get('/api/users', function() {
    return [
        'name' => 'John Smith',
        'email' => 'john@smith.com',
    ];
});

Route::get('/posts/{id}', function(string $id) {
    return 'Post ' . $id;
});

Route::get('/posts/{id}/comments/{commentId}', function(string $id, string $commentId) {
    return 'Post ' . $id . ' comments ' . $commentId;
});