@extends('layouts.app')

@section('title', 'Urban Wood - Premium Wooden Furniture Online India')
@section('meta_description', 'Shop premium Sheesham and Mango wood furniture online. Beds, sofas, dining tables, and custom furniture with 3-year warranty. Free shipping above ₹10,000.')

@section('content')

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="hero-title">Premium Wooden Furniture for Your Dream Home</h1>
                <p class="hero-subtitle mb-4">
                    Handcrafted from finest Sheesham and Mango wood. 3-year warranty. 
                    Free shipping across India on orders above ₹10,000.
                </p>
                <div class="hero-buttons">
                    <a href="{{ route('products.index') }}" class="btn btn-light btn-lg me-3">
                        <i class="bi bi-arrow-right me-2"></i>Shop Now
                    </a>
                    <a href="{{ route('pages.about') }}" class="btn btn-outline-light btn-lg">
                        Learn More
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="{{ asset('images/hero-furniture.jpg') }}" alt="Premium Wooden Furniture" 
                     class="img-fluid rounded shadow" style="max-height: 400px;">
            </div>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
@if($featuredProducts->count() > 0)
<section class="py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="mb-3">Featured Products</h2>
                <p class="text-muted">Discover our handpicked premium furniture collection</p>
            </div>
        </div>
        <div class="row">
            @foreach($featuredProducts as $product)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="product-card card h-100">
                    <div class="position-relative">
                        <img src="{{ $product->main_image_url }}" class="card-img-top" alt="{{ $product->name }}">
                        @if($product->discount_percentage > 0)
                            <span class="discount-badge">{{ $product->discount_percentage }}% OFF</span>
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text flex-grow-1">{{ Str::limit($product->short_description, 100) }}</p>
                        <div class="price-section mb-3">
                            <span class="product-price">{{ $product->formatted_price }}</span>
                            @if($product->compare_price)
                                <span class="product-compare-price ms-2">{{ $product->formatted_compare_price }}</span>
                            @endif
                        </div>
                        <div class="card-actions">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-primary w-100">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Categories Section -->
@if($mainCategories->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="mb-3">Shop by Category</h2>
                <p class="text-muted">Explore our wide range of furniture categories</p>
            </div>
        </div>
        <div class="row">
            @foreach($mainCategories as $category)
            <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                <a href="{{ route('categories.show', $category) }}" class="text-decoration-none">
                    <div class="category-card card text-center h-100">
                        <img src="{{ $category->image_url }}" class="card-img" alt="{{ $category->name }}" 
                             style="height: 150px; object-fit: cover;">
                        <div class="card-img-overlay">
                            <h5 class="card-title">{{ $category->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('categories.index') }}" class="btn btn-outline-primary">
                View All Categories
            </a>
        </div>
    </div>
</section>
@endif

<!-- Popular Products Section -->
@if($popularProducts->count() > 0)
<section class="py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="mb-3">Best Sellers</h2>
                <p class="text-muted">Most loved furniture by our customers</p>
            </div>
        </div>
        <div class="row">
            @foreach($popularProducts->take(8) as $product)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="product-card card h-100">
                    <div class="position-relative">
                        <img src="{{ $product->main_image_url }}" class="card-img-top" alt="{{ $product->name }}">
                        @if($product->discount_percentage > 0)
                            <span class="discount-badge">{{ $product->discount_percentage }}% OFF</span>
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title">{{ $product->name }}</h6>
                        <div class="price-section mb-2">
                            <span class="product-price fs-6">{{ $product->formatted_price }}</span>
                            @if($product->compare_price)
                                <span class="product-compare-price small ms-2">{{ $product->formatted_compare_price }}</span>
                            @endif
                        </div>
                        <div class="card-actions mt-auto">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-outline-primary w-100">
                                Quick View
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center">
            <a href="{{ route('products.index') }}" class="btn btn-primary">View All Products</a>
        </div>
    </div>
</section>
@endif

<!-- Deals Section -->
@if($dealsOfDay->count() > 0)
<section class="py-5 bg-warning bg-opacity-10">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="mb-3 text-warning">🔥 Special Deals</h2>
                <p class="text-muted">Limited time offers on premium furniture</p>
            </div>
        </div>
        <div class="row">
            @foreach($dealsOfDay as $product)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="product-card card h-100 border-warning">
                    <div class="position-relative">
                        <img src="{{ $product->main_image_url }}" class="card-img-top" alt="{{ $product->name }}">
                        <span class="discount-badge bg-warning text-dark">{{ $product->discount_percentage }}% OFF</span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title">{{ $product->name }}</h6>
                        <div class="price-section mb-2">
                            <span class="product-price fs-6">{{ $product->formatted_price }}</span>
                            <span class="product-compare-price small ms-2">{{ $product->formatted_compare_price }}</span>
                        </div>
                        <div class="text-success small mb-2">
                            <i class="bi bi-check-circle"></i> Save ₹{{ number_format($product->compare_price - $product->price, 0) }}
                        </div>
                        <div class="card-actions mt-auto">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-warning w-100">
                                Grab Deal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- New Arrivals Section -->
@if($newArrivals->count() > 0)
<section class="py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="mb-3">New Arrivals</h2>
                <p class="text-muted">Latest additions to our furniture collection</p>
            </div>
        </div>
        <div class="row">
            @foreach($newArrivals->take(6) as $product)
            <div class="col-lg-2 col-md-4 col-sm-6 mb-4">
                <div class="product-card card h-100">
                    <div class="position-relative">
                        <img src="{{ $product->main_image_url }}" class="card-img-top" alt="{{ $product->name }}">
                        <span class="badge bg-success position-absolute" style="top: 10px; left: 10px;">New</span>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h6 class="card-title small">{{ $product->name }}</h6>
                        <div class="price-section">
                            <span class="product-price small">{{ $product->formatted_price }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Why Choose Us Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="mb-3">Why Choose Urban Wood?</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 text-center">
                <div class="feature-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                     style="width: 60px; height: 60px;">
                    <i class="bi bi-tree fs-4"></i>
                </div>
                <h5>Premium Wood</h5>
                <p class="text-muted">Only finest Sheesham and Mango wood for durability and beauty</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 text-center">
                <div class="feature-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                     style="width: 60px; height: 60px;">
                    <i class="bi bi-tools fs-4"></i>
                </div>
                <h5>Handcrafted</h5>
                <p class="text-muted">Expert artisans craft each piece with precision and passion</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 text-center">
                <div class="feature-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                     style="width: 60px; height: 60px;">
                    <i class="bi bi-truck fs-4"></i>
                </div>
                <h5>Free Shipping</h5>
                <p class="text-muted">Free delivery across India on orders above ₹10,000</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 text-center">
                <div class="feature-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                     style="width: 60px; height: 60px;">
                    <i class="bi bi-shield-check fs-4"></i>
                </div>
                <h5>3 Year Warranty</h5>
                <p class="text-muted">Comprehensive warranty on all our furniture products</p>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h3 class="mb-3">Stay Updated with Latest Offers</h3>
                <p class="mb-4">Get exclusive deals and new arrivals directly in your inbox</p>
                <form class="row g-2 justify-content-center">
                    <div class="col-auto">
                        <input type="email" class="form-control form-control-lg" placeholder="Enter your email" required>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-light btn-lg">
                            <i class="bi bi-envelope me-2"></i>Subscribe
                        </button>
                    </div>
                </form>
            </div>
        </div>