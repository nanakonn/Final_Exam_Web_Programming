@extends('layout.index')

@section('content')
    <div class="container">
        <div class="py-5"></div>
        <form action="/profile/update" method="post" enctype="multipart/form-data">
            <div class="row">
                @csrf
                @method('put')
                <div class="col-3" style="overflow: hidden;">
                    <img class="img-fluid w-100 h-100" src="{{ asset('storage/profile-picture/' . $user_data->display_picture_link) }}" alt="" style="object-fit: cover">
                </div>
                <div class="col-9">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name:</label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" autofocus value="{{ $user_data->first_name }}">
                                @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name:</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name" value="{{ $user_data->last_name }}">
                                @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $user_data->email }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="role" class="form-label">Role:</label>
                                <select class="form-select" name="role" disabled>
                                    @if ($user_data->role_id == 1)
                                        <option value="1" selected>Admin</option>
                                        <option value="2">User</option>
                                    @else
                                        <option value="1">Admin</option>
                                        <option value="2" selected>User</option>
                                    @endif
                                </select>
                                <input class="d-none" type="number" name="role" value="{{ $user_data->role_id }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender:</label>
                                @if ($user_data->gender_id == 1)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender"
                                            value="1" checked>
                                        <label class="form-check-label" for="gender">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender"
                                            value="2">
                                        <label class="form-check-label" for="gender">Female</label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender"
                                            value="1">
                                        <label class="form-check-label" for="gender">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="gender"
                                            value="2" checked>
                                        <label class="form-check-label" for="gender">Female</label>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="picture" class="form-label">Display Picture:</label>
                                <input class="form-control @error('picture') is-invalid @enderror" type="file" name="picture" id="picture">
                                @error('picture')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="hidden" name="oldImage" value="{{ $user_data->display_picture_link }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password:</label>
                                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" id="confirm_password">
                                @error('confirm_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="py-5"></div>
        <div class="py-5"></div>
    </div>
@endsection
