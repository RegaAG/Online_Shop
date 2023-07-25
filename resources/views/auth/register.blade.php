@extends('layouts.main')

@section('main')
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" name="name" autocomplete="off" value="{{ old('name') }}"
                                class="form-control form-control-lg @error('name') is-invalid @enderror" />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Address input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="address">Alamat Lengkap</label>
                            <input type="text" name="address" autocomplete="off" value="{{ old('address') }}"
                                class="form-control form-control-lg @error('address') is-invalid @enderror" />
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Address input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="numberPhone">Number Phone</label>
                            <input type="number" name="numberPhone" autocomplete="off" value="{{ old('numberPhone') }}"
                                class="form-control form-control-lg @error('numberPhone') is-invalid @enderror" />
                            @error('numberPhone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Username input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" name="username" autocomplete="off" value="{{ old('username') }}"
                                class="form-control form-control-lg @error('username') is-invalid @enderror" />
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" name="password"
                                class="form-control form-control-lg @error('password') is-invalid @enderror" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <!-- Register -->
                            <div class="form-check">
                                <label class="form-check-label" for="form1Example3"> Already have an account? </label>
                                <a href="{{ route('loginPage') }}">Login</a>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
