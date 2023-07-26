@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid m-2">
        <h3>Add Category</h3>
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
        <div class="row">
            <div class="col-md-5">
                <form action="{{ route('addCategory') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name Category</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" autocomplete="off">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-outline-primary"> Submit </button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $data->name }}</td>
                                <td>
                                    <button type="submit" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editCategory{{ $data->id }}"> Edit </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Modal -->
                @foreach ($datas as $data)
                    <div class="modal fade" id="editCategory{{ $data->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Category {{ $data->name }}
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('editCategory', ['id' => $data->id]) }}" method="POST">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Name Category</label>
                                            <input type="text"
                                                class="form-control @error('nameCategory') is-invalid @enderror"
                                                id="nameCategory" name="nameCategory" value="{{ $data->name }}"
                                                autocomplete="off">
                                            @error('nameCategory')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
