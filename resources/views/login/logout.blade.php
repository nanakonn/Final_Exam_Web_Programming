@extends('layout.index')

@section('content')
    <div class="container-fluid">
        <div class="py-5"></div>
        <div class="py-5"></div>
        <div class="container py-5">
            <div class="card py-5 mx-auto w-50">
                <div class="card-body text-center">
                    <h1 class="card-title">Log Out Success!</h1>
                </div>
            </div>
        </div>
        <div class="py-5"></div>
        <div class="py-5"></div>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = "{{ url('/') }}";
        }, 3000);
    </script>

@endsection
