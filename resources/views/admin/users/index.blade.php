@extends("layout")

@section('title')
    Quản lý user
@endsection

@section('contents')

    <div class="row mt-4">
        <div class="col-6">
            <a class="btn btn-success"
                href="{{ route('admin.users.create') }}">Create</a>
        </div>

        <div class="col-6"></div>
    </div>
    @if (!empty($data))
        <table class="table table-striped mt-4">
            <thead class="table-dark">
                <tr>
                    <td>Id</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Address</td>
                    <td>Gender</td>
                    <td>Role</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->gender }}</td>
                        <td>{{ $item->role }}</td>
                        <td>
                            <a
                                class="btn btn-primary"
                                href="{{ route('admin.users.edit', [ 'id' => $item->id ]) }}">
                                Update
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-danger" role="button" data-toggle="modal" data-target="#confirm_delete_{{ $item->id }}">Delete</button>

                            <div class="modal fade" id="confirm_delete_{{ $item->id }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Xác nhận xóa bản ghi này?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                                        <form method="POST" action="{{ route('admin.users.delete', [ 'id' => $item->id ]) }}">
                                            @csrf
                                            <button type="button" class="btn btn-danger">Xóa</button>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h2>Không có dữ liệu</h2>
    @endif

@endsection
