<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\FrontedEndControllerr;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UpdateProfileController;
use App\Models\Domain;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/category', [CategoryController::class, 'index'])->name("category.list");
Route::get('/category/create', [CategoryController::class, 'create'])->name("category.create");
Route::post('/category', [CategoryController::class, 'store'])->name("category.store");
Route::get("/category/{categoryId}/edit", [CategoryController::class, 'edit'])->name('category.edit');
Route::put("/category/{categoryId}", [CategoryController::class, 'update'])->name('category.update');
Route::delete("/category/{categoryId}", [CategoryController::class, 'destroy'])->name('category.delete');
Route::get('/category/{cateId}', [CategoryController::class, 'show'])->name("category.show");


Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product',[ProductController::class,'store'])->name('product.store');
Route::get('/product/{product}',[ProductController::class,'show'])->name('product.show');
Route::delete('/product/{product}',[ProductController::class,'destroy'])->name('product.destroy');
Route::get('/product/{product}/edit',[ProductController::class,'edit'])->name('product.edit');
Route::put('/product/{product}',[ProductController::class,'update'])->name('product.update');

Route::get('/', [FrontedEndControllerr::class, 'index']);
Route::get('/list',[FrontedEndControllerr::class,'list']);
Route::get('/show/{id}',[FrontedEndControllerr::class,'show']);
Route::get('/search', [FrontedEndControllerr::class,'getBySearch']);
Route::get('/frontend/{category?}', [FrontedEndControllerr::class,'getByCategory']);

Route::get('/domain', [DomainController::class, 'index'])->name('domain.index');
Route::get('/domain/create',[DomainController::class,'create'])->name('domain.create');
Route::post('/domain',[DomainController::class,'store'])->name('domain.store');
Route::get('/domain/{domain}',[DomainController::class,'show'])->name('domain.show');
Route::delete('/domain/{domain}',[DomainController::class,'destroy'])->name('domain.destroy');
Route::get('/domain/{domain}/edit',[DomainController::class,'edit'])->name('domain.edit');
Route::put('/domain/{domain}',[DomainController::class,'update'])->name('domain.update');

// login and register
Route::get('/login', [AuthController::class, 'index'])->name('login.page');
Route::post('/post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('/registration', [AuthController::class, 'registration'])->name('register');
Route::post('/post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.page');

//update password
Route::get('/change-password', [ChangePasswordController::class, 'index'])->name('form.password');
Route::post('/change-password', [ChangePasswordController::class, 'store'])->name('change.password');

// update profile
Route::get('/update-profile/{user}',  [UpdateProfileController::class, 'editProfile'])->name('profile.edit');
Route::patch('/update-profile/{user}',  [UpdateProfileController::class, 'updateProfile'])->name('profile.update');
