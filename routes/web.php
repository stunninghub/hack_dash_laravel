<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller as MainControl;
use App\Http\Controllers\AjaxController as MainAjax;
use App\Http\Controllers\PostController as AddPost;
use App\Http\Controllers\UserMeta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/wel', function () {
//     return view('welcome');
// });

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::any('/ajax_login_attempt', [MainAjax::class, 'hd_login']);
Route::any('/ajax_reg_attempt', [MainAjax::class, 'hd_register']);

Route::get('/logout', [MainControl::class, 'hd_logout']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        $user_name = Auth::user()->name;
        return view('manage', compact('user_name'));
    })->name('home');
    Route::get('/posts', function () {
        $user_name = Auth::user()->name;
        $posts = DB::table('post')->select('*')->orderBy('id', 'DESC')->get();
        return view('posts', compact('posts', 'user_name'));
    })->name('posts');
    Route::get('/users', function () {
        $user_name = Auth::user()->name;
        $meta = Usermeta::get('dummy');
        return view('users', compact('user_name', 'meta'));
    })->name('users');
    Route::get('/settings', function () {
        $user_name = Auth::user()->name;
        return view('settings', compact('user_name'));
    })->name('settings');
    Route::get('/profile', function () {
        $user_name = Auth::user()->name;
        return view('profile', compact('user_name'));
    })->name('profile');
});


Route::any('/add_post', [AddPost::class, 'insert']);
Route::any('/get_posts', [AddPost::class, 'get_posts']);
