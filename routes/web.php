<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AjaxController as AddPost;
use App\Http\Controllers\PostController as AddPost;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('manage');
})->name('home');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/posts', function () {
    $posts = DB::table('post')->select('*')->orderBy('id', 'DESC')->get();
    return view('posts', compact('posts'));
})->name('posts');


Route::any('/add_post', [AddPost::class, 'insert']);
Route::any('/get_posts', [AddPost::class, 'get_posts']);
