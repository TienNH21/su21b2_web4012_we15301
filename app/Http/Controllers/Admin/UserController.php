<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;

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

    public function show(User $user) {
        // https://laravel.com/docs/8.x/routing#route-model-binding

        return view('admin/users/show', [
            'user' => $user,
        ]);
    }

    public function create() {
        return view('admin/users/create');
    }

    // TODO: Upload Image
    public function store(StoreRequest $request) {
        $data = $request->except('_token');

        $result = User::create($data);

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user) {
        return view('admin/users/edit', [
            'data' => $user,
        ]);
    }

    public function update(UpdateRequest $request, User $user) {
        // nhận dữ liệu gửi lên & lưu vào db
        $data = $request->except('_token');
        $user->update($data);

        return redirect()->route('admin.users.index');
    }

    public function delete(User $user) {
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
