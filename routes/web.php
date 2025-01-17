<?php

use App\Http\Controllers\HouseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HouseController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

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
    Route::post('/create_house', [HouseController::class, 'createHouse'])->name('house.create');
    Route::get('/house_edit_form/{id}',[HouseController::class, 'formEditHouse'])->name('house.edit.form');
    Route::put('/house/edit/{id}', [HouseController::class, 'editHouse'])->name('house.edit');

    Route::get('/detail_house/{id}', [HouseController::class, 'displayDetail'])->name('house.detail');
    Route::get('/create_house_detail_form/{id}', [HouseController::class, 'formCreateDetail'])->name('house.detail.create.form');
    Route::put('/create_house_detail/{id}', [HouseController::class, 'createDetail'])->name('house.detail.create');
    Route::put('/house/detail/edit/{id}', [HouseController::class, 'editDetail'])->name('house.detail.edit');
    Route::put('/house/detail/delete/{id}', [HouseController::class, 'destroyDetail'])->name('house.detail.delete');

    Route::get('/house/room/detail/{id}', [HouseController::class, 'displayRoomDetail'])->name('house.room.detail');
    Route::put('/house/room/edit/{id}', [HouseController::class, 'editRoom'])->name('house.room.edit');
    Route::post('/house/room/create', [HouseController::class, 'createRoom'])->name('house.room.create');
    Route::post('/house/room/picUp/{id}',[HouseController::class, 'createRoomPic'])->name('house.room.pic.create');
    Route::delete('/house/room/picDel/{id}',[HouseController::class, 'destroyRoomPic'])->name('house.room.pic.delete');
    
    Route::get('/house_address_create/{id}', [HouseController::class, 'formCreateAddress'])->name('house.address.create.form');
    Route::patch('/house/add_address/{id}',[HouseController::class, 'createAddress'])->name('house.address.create');
    Route::delete('/house/address/delete/{id}', [HouseController::class, 'destroyAddress'])->name('house.address.delete');

    Route::post('/house/pic/upload/{id}', [HouseController::class, 'createHousePic'])->name('house.pic.create');
    Route::delete('/house/pic/delete/{id}', [HouseController::class, 'destroyHousePic'])->name('house.pic.delete');

});


require __DIR__.'/auth.php';
