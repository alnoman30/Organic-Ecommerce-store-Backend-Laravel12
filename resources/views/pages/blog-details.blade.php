@extends('layouts.app')
@section('content')
@extends('layouts.app')
@section('content')

<!-- Blog Banner -->
<section class="py-5 bg-light text-center">
    <div class="container">
        <h1 class="mb-2">{{ $items->title }}</h1>
        <p class="text-muted">
            Category: <strong>{{ $items->blog_category->name ?? 'Uncategorized' }}</strong> | 
            Posted on: {{ $items->created_at->format('F d, Y') }}
        </p>
    </div>
</section>

<!-- Blog Content -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <!-- Blog Image -->
                @if($items->image)
                    <img src="{{ asset('uploads/blogs/' . $items->image) }}" class="img-fluid rounded mb-4" alt="{{ $items->title }}">
                @endif

                <!-- Blog Description -->
                <div class="blog-description">
                    {!! $items->description !!}
                </div>

                <!-- Back Button -->
                <div class="mt-5">
                    <a href="{{ route('blog') }}" class="btn btn-outline-secondary">
                        ← Back to Blogs
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection

@endsection