<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="/">TecnoNusantara Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Category</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">All Products</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        @foreach ($categories as $cat)
                            <li><a class="dropdown-item" href="#!">{{ $cat->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                @can('is_admin')
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                @endcan
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0 ms-lg-4">
                @if (Auth::check())
                    <li class="nav-item mx-3">
                        <a class="btn btn-danger" href="{{ route('logout') }}"> Logout </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success" href="/cart"> <i class="bi bi-cart3"></i> </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-success" href="{{ route('loginPage') }}"> Login </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
