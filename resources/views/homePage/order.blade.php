@extends('layouts.main')

@section('main')
    <div class="container mt-5">
        <h2 class="pt-5"> My Order</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name Product</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                @endforeach
        </table>

    </div>
@endsection
