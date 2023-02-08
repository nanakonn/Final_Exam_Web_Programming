@extends('layout.index')

@section('content')
    <div class="container">
        <div class="py-3"></div>
        <div class="row row-cols-5">
            @foreach ($item_data as $data)
                <div class="col g-3">
                    <div class="card">
                        <img src="https://cdn-icons-png.flaticon.com/512/2153/2153788.png" class="card-img-top p-5" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->item_name }}</h5>
                            <a href="/detail/{{ $data->id }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex w-100 justify-content-center align-items-center my-5">
                {{ $item_data->links() }}
            </div>
        </div>
        <div class="py-5"></div>
    </div>
@endsection
