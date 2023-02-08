@extends('layout.index')

@section('content')
    <div class="container">
        <div class="py-5"></div>
        <div class="card mb-3 mx-auto">
            <div class="row">
                <div class="col-md-4">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $item_data->item_name }}</h5>
                        <img src="https://cdn-icons-png.flaticon.com/512/3058/3058995.png" class="img-fluid rounded-start" alt="...">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text fw-bold">Price: Rp. {{ number_format($item_data->price,0,'',',') }}-</p>
                        <p class="card-text">{{ $item_data->item_desc }}</p>
                    </div>
                    <div class="card-body text-end">
                        <form action="" method="post">
                            @csrf
                            <button class="btn btn-warning" type="submit">Buy</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5"></div>
    </div>
@endsection
