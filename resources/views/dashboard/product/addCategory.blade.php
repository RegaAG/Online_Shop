@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid m-2">
        <h3>Add Category</h3>
        <div class="row">
            <div class="col-md-5">
                <form action="{{ route('addCategory') }}" method="POST">
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
                    <button class="btn btn-outline-primary"> Submit </button>
                </form>
            </div>
        </div>
    </div>
@endsection
