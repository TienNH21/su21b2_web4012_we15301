<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/users', function () {
    // Lấy ra toàn bộ các bản ghi trong bảng users
    $listUser = DB::table('users')->get();
    return view('admin/users/index', [
        'data' => $listUser,
    ]);
})->name('admin.users.index');

Route::view('admin/users/create', 'admin/users/create')
    ->name('admin.users.create');

Route::post('admin/users/store', function () {

    return redirect()->route('admin.users.index');
})->name('admin.users.store');

Route::get('admin/users/edit/{id}', function ($id) {
    $data = DB::table('users')->find($id);

    return view('admin/users/edit', [
        'data' => $data,
    ]);
})->name('admin.users.edit');

Route::post('admin/users/update/{id}', function () {
    // nhận dữ liệu gửi lên & lưu vào db

    return redirect()->route('admin.users.index');
})->name('admin.users.update');

Route::post('admin/users/delete/{id}', function () {
    // xóa dữ liệu theo id
    return redirect()->route('admin.users.index');
})->name('admin.users.delete');
