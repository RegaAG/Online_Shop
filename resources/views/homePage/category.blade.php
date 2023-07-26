@extends('layouts.main')

@section('main')
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">

            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">TecnoNusantara Shop</h1>
                <p class="lead fw-normal text-white-50 mb-0">TeknoNusantara Shop: Menghadirkan Teknologi Nusantara untuk
                    Masa
                    Depanmu!</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            @if (session()->has('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($datas as $data)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ url('image/' . $data->image) }}" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $data->name }}</h5>
                                    <!-- Product price-->
                                    Rp. {{ number_format($data->price) }}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <button type="button" class="btn btn-outline-dark mt-auto" data-bs-toggle="modal"
                                        data-bs-target="#productDetails{{ $data->id }}">
                                        View More
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Modal -->
    @foreach ($datas as $data)
        <div class="modal fade" id="productDetails{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $data->name }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="image">
                            <img class="card-img-top" src="{{ url('image/' . $data->image) }}" />
                        </div>
                        <div class="price text-danger my-2">
                            Rp. {{ number_format($data->price) }}
                        </div>
                        <div class="description">
                            {!! nl2br($data->description) !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        @if (Auth::check())
                            <form action="cart" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="products_id" value="{{ $data->id }}">
                                <button type="submit" class="btn btn-primary">Add To Cart</button>
                            </form>
                        @else
                            <a href="{{ route('loginPage') }}" class="btn btn-success" class="btn btn-succsess">Login For
                                Buy</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
<!-- Header-->
