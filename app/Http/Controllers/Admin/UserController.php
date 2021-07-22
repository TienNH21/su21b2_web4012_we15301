<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        // Eager Loading: https://laravel.com/docs/8.x/eloquent-relationships#eager-loading
        // (N + 1) queries problems
        // (n + 1) queries -> 2 queries

        /*
         * Trước khi gọi tới quan hệ trong vòng for
         * ===> PHẢI DÙNG EAGER LOADING
         */

        // SELECT * FROM users;
        $listUser = User::all();

        // SELECT * FROM invoices WHERE user_id IN (...);
        $listUser->load([
            'invoices',
        ]);

        return view('admin/users/index', [
            'data' => $listUser,
        ]);
    }

    public function show($id) {
        $user = User::find($id);
        // dd($user);

        return view('admin/users/show', [
            'user' => $user,
        ]);
    }

    public function create() {
        return view('admin/users/create');
    }

    public function store() {
        // request()->all(): lấy toàn bộ dữ liệu được gửi lên
        $data = request()->except('_token');
        $data['password'] = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

        $result = User::create($data);

        return redirect()->route('admin.users.index');
    }

    public function edit($id) {
        $data = User::find($id);

        return view('admin/users/edit', [
            'data' => $data,
        ]);
    }

    public function update($id) {
        // nhận dữ liệu gửi lên & lưu vào db
        $data = request()->except('_token');
        $user = User::find($id);
        $user->update($data);

        return redirect()->route('admin.users.index');
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
