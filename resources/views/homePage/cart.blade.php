@extends('layouts.main')

@section('main')
    <section class="vh-100">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <p><span class="h2">Shopping Cart </span></p>
                    <div class="card mb-4">
                        <div class="card-body p-4">
                            @if ($datas->isNotEmpty())
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <p class="small text-muted mb-4 pb-2">Images</p>
                                    </div>
                                    <div class="col-md-2">
                                        <p class="small text-muted mb-4 pb-2">Name</p>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center">
                                        <div>
                                            <p class="small text-muted mb-4 pb-2">Qty</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center">
                                        <div>
                                            <p class="small text-muted mb-4 pb-2">Price</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-center">
                                        <div>
                                            <p class="small text-muted mb-4 pb-2">Total</p>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $grandTotal = 0;
                                @endphp
                                @foreach ($datas as $data)
                                    <div class="row align-items-center">
                                        <div class="col-md-2 my-2">
                                            <img src="{{ $data->product->image }}" class="img-fluid"
                                                alt="{{ $data->product->name }}">
                                        </div>
                                        <div class="col-md-2">
                                            <p class="lead fw-normal mb-0">{{ $data->product->name }}</p>
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-center">
                                            <div>
                                                <p class="lead fw-normal mb-0"> {{ $qty = 1 }} </p>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-center">
                                            <div>
                                                <p class="lead fw-normal mb-0">Rp.
                                                    {{ number_format($data->product->price) }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-center">
                                            <div>
                                                <p class="lead fw-normal mb-0">
                                                    {{ number_format($qty + $data->product->price) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $grandTotal += $data->product->price;
                                    @endphp
                                @endforeach
                            @else
                                <p>No data available.</p>
                            @endif
                        </div>
                    </div>
                    <div class="card mb-5">
                        <div class="card-body p-4">
                            <div class="float-end">
                                <p class="mb-0 me-5 d-flex align-items-center">
                                    <span class="small text-muted me-2">Order total:</span> <span
                                        class="lead fw-normal">{{ number_format($grandTotal) }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('homePage') }}" class="btn btn-light btn-lg me-2">Continue shopping</a>
                        <button type="button" class="btn btn-primary btn-lg">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
