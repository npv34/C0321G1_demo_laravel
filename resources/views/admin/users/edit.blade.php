@extends('admin.master')
@section('content')

    <div class="card">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('users.edit', $user->id) }}">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input name="name" type="text" value="{{ $user->name }}" class="form-control  @error('name') is-invalid @enderror">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input disabled value="{{ $user->email }}" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address" id="" cols="3" rows="3">{{ $user->address }}</textarea>
                </div>
                <div class="form-group">
                    <label>Group</label>
                    <select name="group_id" class="form-control">
                        <option>Khong phan lop</option>
                        @foreach($groups as $group)
                            <option @if($user->checkGroup($group->id)) selected @endif value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-12 col-md-2">Role</label>
                        <div class="form-check col-12 col-md-10">
                            @foreach($roles as $role)
                                <div class="col-12">
                                    <label class="form-check-label">
                                        <input @if($user->checkRole($role->id)) checked @endif type="checkbox" class="form-check-input" name="role_id[{{ $role->id }}]" value="{{ $role->id }}">{{ $role->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
