@extends("layout")

@section('title', 'Create User')
@section('contents')
<form method="POST" class="mt-5"
    action="{{ route('admin.users.update', [ 'id' => $data->id ]) }}">
    @csrf
    <div class="mt-3">
        <label>Name</label>
        <input class="mt-3 form-control"
            type="text" value="{{ $data->name }}" name="name" />
    </div>
    <div class="mt-3">
        <label>Email</label>
        <input class="mt-3 form-control"
            type="email" value="{{ $data->email }}" name="email" />
    </div>
    <div class="mt-3">
        <label>Address</label>
        <input class="mt-3 form-control"
            type="text" value="{{ $data->address }}" name="address" />
    </div>
    <div class="mt-3">
        <label>Gender</label>
        <select class="mt-3 form-control" name="gender">
            <option {{ $data->gender == 1 ? "selected" : "" }} value="1">Male</option>
            <option {{ $data->gender == 0 ? "selected" : "" }} value="0">Female</option>
        </select>
    </div>
    <div class="mt-3">
        <label>Role</label>
        <select class="mt-3 form-control" name="role">
            <option {{ $data->role == 0 ? "selected" : "" }} value="0">User</option>
            <option {{ $data->role == 1 ? "selected" : "" }} value="1">Admin</option>
        </select>
    </div>

    <button class="mt-3 btn btn-primary">Update</button>
</form>
@endsection
