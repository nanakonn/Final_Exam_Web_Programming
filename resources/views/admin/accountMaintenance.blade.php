@extends('layout.index')

@section('content')
    <div class="container">
        <div class="py-5"></div>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">Account</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accounts as $acc)
                    <tr>
                        <td scope="row">{{ $acc->email }} - {{ $acc->role->role_name }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('update', $acc->id )}}">Update Role</a>
                                <form action="{{ route('delete', $acc->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="link-primary text-decoration-underline bg-body border-0" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="py-5"></div>
        <div class="py-5"></div>
    </div>
@endsection
