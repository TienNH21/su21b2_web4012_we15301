<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;

class UserController extends Controller
{
    public function index(Request $request) {
        $listUser = null;
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            // SELECT * FROM users WHERE email LIKE '%keyword%'
            $listUser = User::where('email', 'LIKE', "%$keyword%")->get();
        } else {
            $listUser = User::all();
        }

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

        if ($request->ajax() == true) {
            return response()->json([
                'status' => 200,
                'message' => 'ok'
            ]);
        }

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
