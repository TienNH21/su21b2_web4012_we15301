<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

// fake -> 10 records -> categories -> id: 1-10
// products: category_id: random 1-10

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/users', function () {
    // Lấy ra toàn bộ các bản ghi trong bảng users
    $listUser = DB::table('users')->get();
    return view('admin/users/index', [
        'data' => $listUser,
    ]);
});

Route::view('/admin/users/create', 'admin/users/create');

// TODO: route-name
Route::post('/admin/users', function () {
    dd($_REQUEST);
});

// view: trả ra view tương ứng với url
Route::view('/welcome', 'welcome');

/*
- match: mapping url với callback tương ứng, mapping theo nhiều phương thức http đã khai báo
- any: mapping url với callback tương ứng, mapping với tất cả phương thức http
*/
