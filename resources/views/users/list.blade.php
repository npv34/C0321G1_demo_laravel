@extends('welcome')
@section('content')

    <div class="card mt-2">
        <div class="card-header">
            <div class="row">
                <div class="col-12 col-md-4">
                    <p>Danh sách người dùng</p></div>
                <div class="col-12 col-md-8">
                    <form action="{{ route('users.search') }}">
                        @csrf
                        <div class="form-group row">
                            <input type="text" name="keyword" class="form-control col-12 col-md-8">
                            <button type="submit" class="btn btn-success ml-2">Tìm kiếm</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $key => $user)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td><a href="{{ route('users.show', $user['id']) }}">{{ $user['username'] }}</a></td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td><a href="{{ route('users.update', ['id' => $user['id']]) }}"
                               class="btn btn-primary">Chỉnh sửa</a></td>
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
