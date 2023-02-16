<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller as MainControl;
use App\Http\Controllers\AjaxController as MainAjax;
use App\Http\Controllers\PostController as AddPost;
use App\Http\Controllers\UserMeta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector;

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
Route::any('/delete_user', [MainAjax::class, 'delete_user']);

Route::get('/logout', [MainControl::class, 'hd_logout']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        $user_name = Auth::user()->name;
        $recent_posts = AddPost::get_all_posts('desc', 4);
        return view('manage', compact('user_name', 'recent_posts'));
    })->name('home');
    Route::get('/posts', function () {
        $user_name = Auth::user()->name;
        $user_id = Auth::user()->id;
        $posts = AddPost::get_all_posts('asc', -1, $user_id);
        return view('posts', compact('posts', 'user_name'));
    })->name('posts');
    Route::get('/users', function () {
        $user_name = Auth::user()->name;
        $user_id = Auth::user()->id;
        $meta = Usermeta::get();
        $all_usrs = UserMeta::all_users();
        return view('users', compact('user_id', 'user_name', 'meta', 'all_usrs'));
    })->name('users');

    Route::get('/settings/', function () {
        $user_name = Auth::user()->name;
        $subpage = "";
        return view('settings', compact('user_name', 'subpage'));
    })->name('settings');

    Route::get('/settings/{subpage}', function ($subpage) {
        $user_name = Auth::user()->name;
        switch ($subpage) {
            case "profile":
                return view('settings-profile', compact('user_name', 'subpage'));
                break;
            default:
                return view('settings', compact('user_name', 'subpage'));
                break;
        }
        return view('settings', compact('user_name', 'subpage'));
    })->name('settings');

    Route::get('/profile', function () {
        $user_name = Auth::user()->name;
        return view('profile', compact('user_name'));
    })->name('profile');
});


Route::any('/add_post', [AddPost::class, 'insert']);
Route::any('/get_posts', [AddPost::class, 'get_posts']);
