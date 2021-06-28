@extends('admin.master')
@section('content')
    <div class="card mt-2">
        <div class="card-header">
            <div class="row">
                <div class="col-12 col-md-4">
                    <p>Danh sách người dùng</p></div>
                <div class="col-12 col-md-8">
                        <div class="form-group">
                            <input type="text" id="search-user" name="keyword" class="form-control col-12 col-md-8">
                            <ul class="list-group col-12 col-md-8" style="position: absolute" id="list-user-search"></ul>
                        </div>
                </div>
            </div>

        </div>
        <div class="card-body">
            <a href="{{ route('users.create') }}" class="btn btn-success mb-2">Them moi</a>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Group</th>
                    <th scope="col">Role</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $key => $user)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @if($user->group)
                            <td>
                                <a href="{{ route('groups.getUsers', $user->group_id) }}">{{ $user->group->name }}</a>
                            </td>
                        @else
                            <td>Chua phan lop</td>
                        @endif
                        <td>
                            @forelse($user->roles as $role)
                                <p>{{ $role->name }}</p>
                            @empty
                                Chua phan quyen
                            @endforelse
                        </td>

                        <td><a href="{{ route('users.update', ['id' => $user->id]) }}"
                               class="btn btn-primary">Chỉnh sửa</a>
                            <a onclick="return confirm('Are you sure?')"
                               href="{{ route('users.delete', ['id' => $user->id]) }}"
                               class="btn btn-danger">Xoa</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No data</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
