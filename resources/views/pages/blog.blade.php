@extends('layouts.app')
@section('content')

<!-- Mini Banner Section -->
<section class="jarallax py-5">
    <div class="hero-content py-0 py-md-5">
        <div class="container-lg d-flex flex-column d-md-block align-items-center">
            <nav class="breadcrumb">
                <a class="breadcrumb-item nav-link" href="{{ route('home')}}">Home</a>
                <a class="breadcrumb-item nav-link" href="">Pages</a>
                <span class="breadcrumb-item active" aria-current="page">Blog</span>
            </nav>
            <h1>Blog</h1>
        </div>
    </div>
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; overflow: hidden; z-index: -100; clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);" id="jarallax-container-0">
        <img src="{{ asset('assets/images/banner-1.jpg') }}" class="jarallax-img" style="object-fit: cover; object-position: 50% 50%; width: 100%; height: 100%; position: fixed;">
    </div>
</section>

<!-- Latest Blogs Section -->
    <section id="latest-blog" class="pb-4">
      <div class="container-lg">
        <div class="row">
          <div class="section-header d-flex align-items-center justify-content-between my-4">
            <h2 class="section-title">Our Latest Blog</h2>
          </div>
        </div>
        <div class="row">
          @foreach ($items as $item )
          <div class="col-md-4">
            <article class="post-item card border-0 shadow-sm p-3">
              <div class="image-holder zoom-effect">
                <a href="{{ route('blog-details', $item->slug) }}">
                  <img src="{{ asset('uploads/blogs')}}/{{$item->image}}" alt="post" class="card-img-top">
                </a>
              </div>
              <div class="card-body">
                <div class="post-meta d-flex text-uppercase gap-3 my-2 align-items-center">
                  <div class="meta-date"><svg width="16" height="16"><use xlink:href="#calendar"></use></svg>{{ $item->created_at->format('d F Y h:i A') }}</div>
                  <div class="meta-categories"><svg width="16" height="16"><use xlink:href="#category"></use></svg>{{ $item->blog_category->name}}</div>
                </div>
                <div class="post-header">
                  <h3 class="post-title">
                    <a href="{{ route('blog-details', $item->slug) }}" class="text-decoration-none">{{ $item->title}}</a>
                  </h3>
                  <p>{{ Str::limit(strip_tags($item->description), 150, ' Read more') }}</p>
                </div>
              </div>
            </article>
          </div>            
          @endforeach
        </div>
        <div class="mt-4">
           {{ $items->links() }}
        </div>
      </div>
    </section>
@endsection