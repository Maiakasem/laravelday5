<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/users',[UserController::class,'index'])->name('users.index');
Route::get('/users/create',[UserController::class,'create'])->name('users.create');
Route::get('/users/{id}',[UserController::class,'show'])->name('users.show');
Route::post ('/users',[UserController::class,'store'])->name('users.store ');
Route::get('/users/{id}/edit',[UserController::class,'edit'])->name('users.edit');
Route::put ('/users/{id}',[UserController::class,'update'])->name('users.update');
Route::delete ('/users/{id}',[UserController::class,'delete'])->name('users.delete');

//posts routes 
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{postId}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{postId}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('posts.delete');

Route::fallback(function() {
    return redirect('/');
});
require __DIR__.'/auth.php';
