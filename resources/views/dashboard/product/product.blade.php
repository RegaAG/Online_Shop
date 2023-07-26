@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid m-2">
        <h3>My Product</h3>
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
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $no => $data)
                        <tr>
                            <th>{{ $no + $datas->firstItem() }}</th>
                            <td>{{ $data->name }}</td>
                            <td>Rp. {{ number_format($data->price) }}</td>
                            <td>{{ $data->category->name }}</td>
                            <td>{{ Str::words($data->description, 10) }}</td>
                            <td><img src="{{ url('image/' . $data->image) }}" style="width: 50px" height="50px"></td>
                            <td>
                                <button href="" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editProduct{{ $data->id }}"> Edit </button>
                                <button href="" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteProduct{{ $data->id }}"> Delete </button>
                            </td>
                        </tr>
                    @endforeach
                    </tr>
                </tbody>

                <!-- Modal Edit-->
                @foreach ($datas as $data)
                    <div class="modal fade" id="editProduct{{ $data->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $data->name }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('editProduct', ['id' => $data->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <img src="{{ url('image/' . $data->image) }}" style="width: 100%">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Name Product</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name" value="{{ $data->name }}"
                                                autocomplete="off">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Price</label>
                                            <input type="number" class="form-control @error('price') is-invalid @enderror"
                                                id="price" name="price" value="{{ $data->price }}"
                                                autocomplete="off">
                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Deskripsi</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                                rows="3"> {{ $data->description }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Category</label>
                                            <select class="form-select" name="category">
                                                <option value="{{ $data->category->id }}">{{ $data->category->name }}
                                                </option>
                                                @foreach ($category as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Image</label>
                                            <input class="form-control @error('image') is-invalid @enderror" type="file"
                                                name="image">
                                            @error('image')
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

                <!-- Modal Delete-->
                @foreach ($datas as $data)
                    <div class="modal fade" id="deleteProduct{{ $data->id }}" data-bs-backdrop="static"
                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $data->name }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this data?</p>
                                    <form action="{{ route('deleteProduct', ['id' => $data->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger"> Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </table>
        </div>
        {{ $datas->links() }}
    </div>
@endsection
