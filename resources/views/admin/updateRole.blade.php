@extends('layout.index')

@section('content')
    <div class="container">
        <div class="py-5"></div>
        <p>{{ $account->first_name }} {{ $account->last_name }}</p>
        <form action="/admin/update/{{ $account->id }}" method="post">
            @csrf
            @method('put')
            <div class="col-md-4 mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-select">
                    @if ($account->role_id == 1)
                        <option value="1" selected>Admin</option>
                        <option value="2">User</option>
                    @else
                        <option value="1">Admin</option>
                        <option value="2" selected>User</option>
                    @endif
                </select>
            </div>
            <button class="btn btn-warning" type="submit">Save</button>
        </form>
        <div class="py-5"></div>
        <div class="py-5"></div>
    </div>
@endsection
