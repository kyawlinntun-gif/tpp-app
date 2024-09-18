<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SutdentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

Route::get('/dashboards', function() {
    return view('index');
})->name('dashboards');


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

// Route::get('/', function(){
//     return view('index');
// });

Route::get('/students', [SutdentController::class, 'index']);

// Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categoreis.store');

Route::get('/categories/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');

Route::post('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/{id}', [ProductController::class, 'update'])->name('products.update');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

// Users
Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/users/{id}', [UserController::class, 'edit'])->where(['id' => '[0-9]+'])->name('users.edit');
Route::match(['put', 'patch'], '/users/{id}', [UserController::class, 'update'])->where(['id', '[0-9]+'])->name('users.update');

// Roles
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');

Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');

Route::delete('/users/{id}', [UserController::class, 'destroy'])->where(['id', '[0-9]+'])->name('users.destroy');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');