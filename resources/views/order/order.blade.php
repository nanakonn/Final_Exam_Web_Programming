@extends('layout.index')

@section('content')
    <div class="container">
        <div class="py-5"></div>
        <div class="col">
            <div class="d-none">{{ $total = 0 }}</div>
            <h5 class="fw-bold">Cart</h5>
            @if (count($order_data) == 0)
                <div class="card my-5">
                    <div class="card-body">
                        <p class="card-text text-center">Empty...</p>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <h5 class="fw-bold">Total: Rp. {{ $total }}-</h5>
                </div>
                <div class="py-5"></div>
                <div class="py-5"></div>
                <div class="py-5"></div>
            @else
                <div class="pt-5"></div>
                @foreach ($order_data as $data)
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-1">
                                <div class="card-body">
                                    <img class="img-fluid" src="https://cdn-icons-png.flaticon.com/512/2153/2153788.png" alt="">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card-body">
                                    <p class="card-text">{{ $data->item->item_name }}</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card-body">
                                    <p class="card-text">{{ $data->item->price }}</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card-body">
                                    <form action="/order/delete/{{ $data->item_id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="link link-primary bg-body border-0" type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-none">{{ $total += $data->item->price }}</div>
                @endforeach
                <div class="d-flex justify-content-end">
                    <h5 class="fw-bold">Total: Rp. {{ number_format($total,0,'',',') }}-</h5>
                    <form action="{{ route('checkout') }}" method="post">
                        @csrf
                        <button class="btn btn-warning" type="submit">Checkout</button>
                    </form>
                </div>
                <div class="py-5"></div>
                <div class="py-5"></div>
                <div class="py-5"></div>
            @endif
        </div>
        <div class="py-5"></div>
    </div>
@endsection
