@extends("layout")

@section('title', 'Create User')
@section('contents')
<form method="POST" class="mt-5"
    action="{{ route('admin.users.store') }}">
    @csrf
    <div class="mt-3">
        <label>Name</label>
        <input class="mt-3 form-control" type="text" name="name" />
    </div>
    <div class="mt-3">
        <label>Email</label>
        <input class="mt-3 form-control" type="email" name="email" />
    </div>
    <div class="mt-3">
        <label>Address</label>
        <input class="mt-3 form-control" type="text" name="address" />
    </div>
    <div class="mt-3">
        <label>Gender</label>
        <select class="mt-3 form-control" name="gender">
            <option value="1">Male</option>
            <option value="0">Female</option>
        </select>
    </div>
    <div class="mt-3">
        <label>Role</label>
        <select class="mt-3 form-control" name="role">
            <option value="0">User</option>
            <option value="1">Admin</option>
        </select>
    </div>

    <button class="mt-3 btn btn-primary">Create</button>
</form>
@endsection