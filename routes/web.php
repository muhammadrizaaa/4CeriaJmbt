<?php

use App\Http\Controllers\HouseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;

Route::get('/profil', [ProfilController::class, 'index'])->name('home');
Route::get('/update-profile', [ProfilController::class, 'update'])->name('updateProfile');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HouseController::class, 'displayMap'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //users
    Route::get('/users_list', [UserController::class, 'display'])->name('users.list');
    Route::get('/user_edit_form/{id}', [UserController::class, 'formEdit'])->name('user.edit.form');
    Route::put('/user-edit/{id}', [UserController::class, 'editUser'])->name('user.edit');

    //houses
    Route::get('/houses_list', [HouseController::class, 'displayAll'])->name('houses-list');
    Route::get('/create_house_form', [HouseController::class, 'formCreateHouse'])->name('house.create.form');
    Route::get('/house_edit_form/{id}',[HouseController::class, 'formEditHouse'])->name('house.edit.form');

    Route::get('/detail_house/{id}', [HouseController::class, 'displayDetail'])->name('house.detail');
    Route::get('/create_house_detail_form/{id}', [HouseController::class, 'formCreateDetail'])->name('house.detail.create.form');
    Route::get('/house/detail/edit/{id}', [HouseController::class, 'formEditDetail'])->name('house.detail.edit.form');
    Route::put('/house/detail/edit/{id}', [HouseController::class, 'editDetail'])->name('house.detail.edit');

    
    Route::get('/house_address_create/{id}', [HouseController::class, 'formCreateAddress'])->name('house.address.create.form');
    Route::post('/create_house_detail', [HouseController::class, 'createDetail'])->name('house.detail.create');
    Route::post('/create_house_address',[HouseController::class, 'createAddress'])->name('house.address.create');
    Route::delete('/house/address/delete/{id}', [HouseController::class, 'destroyAddress'])->name('house.address.delete');

    Route::post('/create_house', [HouseController::class, 'createHouse'])->name('house.create');
    Route::post('/editHouse', [HouseController::class, 'editHouse'])->name('house.edit');

});


require __DIR__.'/auth.php';
