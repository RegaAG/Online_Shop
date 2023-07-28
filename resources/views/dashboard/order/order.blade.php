@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid m-2">
        <h3>Order Request</h3>
        <div class="row">
            <div class="col-md-5">
                @if (session()->has('info'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('info') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name Product</th>
                        <th scope="col">Pembeli</th>
                        <th scope="col">Address</th>
                        <th scope="col">No HP</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tr>
                </tbody>
            </table>
        </div>
        {{ $datas->links() }}
    </div>
@endsection
