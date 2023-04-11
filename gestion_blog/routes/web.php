<?php

use App\Models\Post;
use App\Models\User;
use App\Models\category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Controllers\PostCommentController;

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

Route::get('/', [PostController::class,'index'])->name('home');

Route::get('/posts/{post:slug}',[PostController::class,'show'])->name('show.post');

Route::post('/posts/{post:slug}/comments',[PostCommentController::class,'store'])->name('store.comment');

Route::get('/register', [RegisterController::class,'create'])->name('register.create')->middleware('guest');
Route::post('/register', [RegisterController::class,'store'])->name('register.store')->middleware('guest');
Route::get('/logout', [SessionController::class,'destroy'])->name('sessions.logOut')->middleware('auth');
Route::get('/login', [SessionController::class,'create'])->name('sessions.create')->middleware('guest');
Route::post('/login', [SessionController::class,'store'])->name('sessions.store')->middleware('guest');

// Route::get('/categories/{category:slug}',function ( category $category){
//     // dd(request('category')->name);
//    
//     return view('posts.index',[
//         'posts'=>$category->posts ,
//         'categories' => category::all(),
//         'currentCategory'=>$category ,
//         ]);
// })->name('show.postsCategory');

// Route::get('/authors/{auther:name}',function ( User $auther){
//     // dd(request('category')->name);
//    
//     return view('posts.index',[
//         'posts'=>$auther->posts ,
//         ]);
// })->name('show.autherPosts');