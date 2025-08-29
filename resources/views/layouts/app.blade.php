<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Urban Wood - Premium Wooden Furniture Online')</title>
    <meta name="description" content="@yield('meta_description', 'Buy premium wooden furniture online in India. Sheesham wood furniture, dining tables, beds, sofas and more with customization options.')">
    <meta name="keywords" content="@yield('meta_keywords', 'wooden furniture, sheesham wood, dining table, bed, sofa, furniture online India')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body>
    <!-- Navigation Header -->
    <header>
        <!-- Top Bar -->
        <div class="bg-dark text-white py-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <small>
                            <i class="bi bi-telephone me-2"></i>+91-XXXX-XXXXXX
                            <i class="bi bi-envelope ms-3 me-2"></i>info@urbanwood.in
                        </small>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <small>
                            Free Shipping on Orders Above ₹10,000
                        </small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Urban Wood" height="40" class="me-2">
                    Urban Wood
                </a>

                <!-- Mobile Toggle -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation Menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Main Menu -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Categories
                            </a>
                            <ul class="dropdown-menu">
                                {{-- We'll populate this with categories later --}}
                                <li><a class="dropdown-item" href="#">Bedroom Furniture</a></li>
                                <li><a class="dropdown-item" href="#">Living Room</a></li>
                                <li><a class="dropdown-item" href="#">Dining Room</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('categories.index') }}">All Categories</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pages.about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pages.contact') }}">Contact</a>
                        </li>
                    </ul>

                    <!-- Search Form -->
                    <form class="search-form me-3" action="{{ route('products.search') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search furniture..." 
                                   name="q" value="{{ request('q') }}">
                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>

                    <!-- User Actions -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link position-relative" href="#" id="cartToggle">
                                <i class="bi bi-bag fs-5"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    0
                                </span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person fs-5"></i>
                            </a>
                            <ul class="dropdown-menu">
                                {{-- Authentication links will be added later --}}
                                <li><a class="dropdown-item" href="#">Login</a></li>
                                <li><a class="dropdown-item" href="#">Register</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">My Account</a></li>
                                <li><a class="dropdown-item" href="#">My Orders</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <!-- Company Info -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Urban Wood</h5>
                    <p class="mb-3">Premium wooden furniture crafted with passion. Transform your home with our exquisite collection of Sheesham and Mango wood furniture.</p>
                    <div class="social-links">
                        <a href="#" class="me-3"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="me-3"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="me-3"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="me-3"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('pages.about') }}">About Us</a></li>
                        <li class="mb-2"><a href="{{ route('pages.contact') }}">Contact Us</a></li>
                        <li class="mb-2"><a href="#">Bulk Orders</a></li>
                        <li class="mb-2"><a href="#">Customization</a></li>
                        <li class="mb-2"><a href="#">Track Order</a></li>
                    </ul>
                </div>

                <!-- Categories -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Categories</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">Bedroom</a></li>
                        <li class="mb-2"><a href="#">Living Room</a></li>
                        <li class="mb-2"><a href="#">Dining Room</a></li>
                        <li class="mb-2"><a href="#">Study Room</a></li>
                        <li class="mb-2"><a href="#">Office</a></li>
                    </ul>
                </div>

                <!-- Customer Service -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Customer Service</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">Help Center</a></li>
                        <li class="mb-2"><a href="#">Returns</a></li>
                        <li class="mb-2"><a href="#">Shipping Info</a></li>
                        <li class="mb-2"><a href="{{ route('pages.terms') }}">Terms & Conditions</a></li>
                        <li class="mb-2"><a href="{{ route('pages.privacy') }}">Privacy Policy</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5>Contact Info</h5>
                    <div class="mb-3">
                        <i class="bi bi-geo-alt me-2"></i>
                        <small>123 Furniture Street<br>Delhi, India - 110001</small>
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-telephone me-2"></i>
                        <small>+91-XXXX-XXXXXX</small>
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-envelope me-2"></i>
                        <small>info@urbanwood.in</small>
                    </div>
                    <div class="mb-3">
                        <i class="bi bi-clock me-2"></i>
                        <small>Mon-Sat: 9AM-7PM</small>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="row border-top pt-3">
                <div class="col-md-6">
                    <small>&copy; {{ date('Y') }} Urban Wood. All rights reserved.</small>
                </div>
                <div class="col-md-6 text-md-end">
                    <small>
                        <a href="{{ route('pages.terms') }}" class="me-3">Terms</a>
                        <a href="{{ route('pages.privacy') }}" class="me-3">Privacy</a>
                        <a href="#">Sitemap</a>
                    </small>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>