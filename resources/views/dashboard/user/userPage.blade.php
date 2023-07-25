@extends('dashboard.layouts.main')

@section('content')
    <div class="container-fluid m-2">
        <h3>My User</h3>
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
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Number Phone</th>
                        <th scope="col">Username</th>
                        <th scope="col">Created_at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $no => $user)
                        <tr>
                            <th>{{ $no + $users->firstItem() }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->numberPhone }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
        {{ $users->links() }}
    </div>
@endsection
