@extends('layout.index')

@section('content')
    <div class="container-fluid">
        <div class="py-5"></div>
        <div class="py-5"></div>
        <div class="container py-5">
            <div class="card py-5 mx-auto w-50">
                <div class="card-body text-center">
                    <h1 class="card-title">Success!</h1>
                    <p class="card-text">We will contact you in 1x24 hours.</p>
                    <a href="{{ route('home') }}">Click here to "Home"</a>
                </div>
            </div>
        </div>
        <div class="py-5"></div>
        <div class="py-5"></div>
    </div>
@endsection
