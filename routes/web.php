<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SutdentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Static Route

Route::get('/blogs', function(){
    return "Hello, This is Blog Page";
});

// Dynamic Route

Route::get('/blogs/{id}', function($id){
    return "Hello, This is Blog Detail - $id";
});


// Route Name

Route::get('/dashboard', function(){
    return "Welcome form TPP Program Dashborad!";
})->name("dashboard.tpp");


Route::get('/tpp', function(){
    return redirect()->route('dashboard.tpp');
});


// Group Routes

Route::prefix('dashboard')->group(function(){
    Route::get('/admin', function(){
        return "This is admin dashboard!";
    });

    Route::get('/users', function(){
        return "This is user dashboard!";
    });
});


// Laravel View

Route::get('/', function(){
    return view('index');
});

Route::get('/students', [SutdentController::class, 'index']);

// Categories
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/categories/edit', [CategoryController::class, 'edit'])->name('category.edit');

// Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/{id}', [ProductController::class, 'update'])->name('products.update');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
