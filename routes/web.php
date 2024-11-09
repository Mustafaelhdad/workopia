<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// Route::get('/test', function(Request $request) {
//     return [
//         'method' => $request->method(),
//         'url' => $request->url(),
//         'path' => $request->path(),
//         'fullUrl' => $request->fullUrl(),
//         'ip' => $request->ip(),
//         'userAgent' => $request->userAgent(),
//         'header' => $request->header(),
//     ];
// });

// Route::get('/users', function(Request $request) {
//     return $request->except(['name']);
// });

Route::get('/test', function () {
    return response()->json(['name' => 'Sayed'])->cookie('name', 'John Doe');
});

Route::get('/notfound', function () {
    return response('page not found', 404);
});

Route::get('/read-cookie', function(Request $request) {
    $cookieValue = $request->cookie('name');
    return response()->json(['cookie'=>$cookieValue]);
});