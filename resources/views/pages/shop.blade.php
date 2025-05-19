@extends('layouts.app')
@section('content')
   <!-- Mini Banner Section -->
<section class="jarallax py-5">
    
    <div class="hero-content py-0 py-md-5">
        <div class="container-lg d-flex flex-column d-md-block align-items-center">
        <nav class="breadcrumb">
          <a class="breadcrumb-item nav-link" href="{{ route('home')}}">Home</a>
          <p class="breadcrumb-item nav-link" >Pages</p>
          <span class="breadcrumb-item active" aria-current="page">Shop</span>
        </nav>
        <h1>Shop</h1>
      </div>
    </div>
  <div style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; z-index: -100; clip-path: polygon(0px 0px, 100% 0px, 100% 100%, 0px 100%);" id="jarallax-container-0"><img src="{{ asset('assets/images/banner-1.jpg')}}" class="jarallax-img" style="object-fit: cover; object-position: 50% 50%; max-width: none; position: fixed; top: 0px; left: 0px; width: 1903px; height: 423.5px; overflow: hidden; pointer-events: none; transform-style: preserve-3d; backface-visibility: hidden; will-change: transform, opacity; margin-top: 63.75px; transform: translate3d(0px, -21.25px, 0px);"></div></section>

<div class="py-4">
      <div class="container-lg">
        <div class="row g-5">
          <aside class="col-md-2">
            <div class="sidebar">
              <div class="widget-menu">
                <div class="widget-search-bar">
                  <form role="search" method="get" class="d-flex position-relative">
                    
                      <input class="form-control form-control-lg rounded-2 bg-light" type="email" placeholder="Search here" aria-label="Search here">
                      <button class="btn bg-transparent position-absolute end-0" type="submit"><svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#search"></use></svg></button>
                    </form>
                  
                </div>
              </div>
              <div class="widget-product-categories pt-5">
                <h5 class="widget-title">Categories</h5>
                <ul class="product-categories sidebar-list list-unstyled">
                  <li class="cat-item">
                    <a href="/collections/categories">All</a>
                  </li>
                    @foreach ( $categories as $cat )
                    <li class="cat-item">
                        <a href="#" class="nav-link">{{ $cat->name}}</a>
                    </li>
                    </li>
                    @endforeach
                </ul>
              </div>
              <div class="widget-product-tags pt-3">
                <h5 class="widget-title">Tags</h5>
                <ul class="product-tags sidebar-list list-unstyled">
                  <li class="tags-item">
                    <a href="#" class="nav-link">White</a>
                  </li>
                  <li class="tags-item">
                    <a href="#" class="nav-link">Cheap</a>
                  </li>
                  <li class="tags-item">
                    <a href="#" class="nav-link">Mobile</a>
                  </li>
                  <li class="tags-item">
                    <a href="#" class="nav-link">Modern</a>
                  </li>
                </ul>
              </div>
              <div class="widget-product-brands pt-3">
                <h5 class="widget-title">Brands</h5>
                <ul class="product-tags sidebar-list list-unstyled">
                  <li class="tags-item">
                    <a href="#" class="nav-link">Apple</a>
                  </li>
                  <li class="tags-item">
                    <a href="#" class="nav-link">Samsung</a>
                  </li>
                  <li class="tags-item">
                    <a href="#" class="nav-link">Huwai</a>
                  </li>
                </ul>
              </div>
              <div class="widget-price-filter pt-3">
                <h5 class="widget-titlewidget-title">Filter By Price</h5>
                <ul class="product-tags sidebar-list list-unstyled">
                  <li class="tags-item">
                    <a href="#" class="nav-link">Less than $10</a>
                  </li>
                  <li class="tags-item">
                    <a href="#" class="nav-link">$10- $20</a>
                  </li>
                  <li class="tags-item">
                    <a href="#" class="nav-link">$20- $30</a>
                  </li>
                  <li class="tags-item">
                    <a href="#" class="nav-link">$30- $40</a>
                  </li>
                  <li class="tags-item">
                    <a href="#" class="nav-link">$40- $50</a>
                  </li>
                </ul>
              </div>
            </div>
          </aside>

          <main class="col-md-10">
            <div class="filter-shop d-flex justify-content-between">
              <div class="showing-product">
                <p>Showing 1–10 of 25 results</p>
              </div>
              <div class="sort-by">
                <select id="input-sort" class="form-control" data-filter-sort="" data-filter-order="">
                  <option value="">Default sorting</option>
                  <option value="">Name (A - Z)</option>
                  <option value="">Name (Z - A)</option>
                  <option value="">Price (Low-High)</option>
                  <option value="">Price (High-Low)</option>
                  <option value="">Rating (Highest)</option>
                  <option value="">Rating (Lowest)</option>
                  <option value="">Model (A - Z)</option>
                  <option value="">Model (Z - A)</option>   
                </select>
              </div>
            </div>
            
            <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5">
                  @foreach ($products as $product )
                                  <div class="col">
                <div class="product-item">
                  <figure>
                    <a href="single-product.html" title="{{ $product->name}}">
                      <img src="{{ asset('uploads/products')}}/{{ $product->image }}" alt="{{ $product->name}}" class="tab-image">
                    </a>
                  </figure>
                  <div class="d-flex flex-column text-center">
                    <h3 class="fs-6 fw-normal">{{ $product->name }}</h3>
                    <div>
                      <span class="rating">
                        <svg width="18" height="18" class="text-warning"><use xlink:href="#star-full"></use></svg>
                        <svg width="18" height="18" class="text-warning"><use xlink:href="#star-full"></use></svg>
                        <svg width="18" height="18" class="text-warning"><use xlink:href="#star-full"></use></svg>
                        <svg width="18" height="18" class="text-warning"><use xlink:href="#star-full"></use></svg>
                        <svg width="18" height="18" class="text-warning"><use xlink:href="#star-half"></use></svg>
                      </span>
                      <span>(222)</span>
                    </div>
                    <div class="d-flex justify-content-center align-items-center gap-2">
                        @if ($product->discount_percent)
                            <del>${{ round($product->regular_price, 0)  }}</del>
                            <span class="text-dark fw-semibold">${{ round($product->regular_price * (1 - $product->discount_percent / 100)) }}</span>
                            <span class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">{{ $product->discount_percent}}% OFF</span>
                        @else
                        <span class="text-dark fw-semibold">${{ $product->regular_price  }}</span>
                        @endif
                      
                    </div>
                    <div class="button-area p-3 pt-0">
                      <div class="row g-1 mt-2">
                        <div class="col-3"><input type="number" name="quantity" class="form-control border-dark-subtle input-number quantity" value="1"></div>
                        <div class="col-7"><a href="#" class="btn btn-primary rounded-1 p-2 fs-7 btn-cart"><svg width="18" height="18"><use xlink:href="#cart"></use></svg> Add to Cart</a></div>
                        <div class="col-2"><a href="#" class="btn btn-outline-dark rounded-1 p-2 fs-6"><svg width="18" height="18"><use xlink:href="#heart"></use></svg></a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>                     
                  @endforeach

   
            </div>
            <!-- / product-grid -->

            <nav class="text-center py-4" aria-label="Page navigation">
              <div class="mt-4">
              {{ $products->links() }}
              </div>
            </nav>

          </main>
          
        </div>
      </div>
    </div> 
@endsection