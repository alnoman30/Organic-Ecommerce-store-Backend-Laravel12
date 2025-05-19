@extends('layouts.app')

@section('content')
<!-- Mini Banner Section -->
<section class="jarallax py-5">
    
    <div class="hero-content py-0 py-md-5">
        <div class="container-lg d-flex flex-column d-md-block align-items-center">
        <nav class="breadcrumb">
          <a class="breadcrumb-item nav-link" href="{{ route('home') }}">Home</a>
          <a class="breadcrumb-item nav-link" href="#">Pages</a>
          <span class="breadcrumb-item active" aria-current="page">Sign Up</span>
        </nav>
        <h1>Sign Up</h1>
      </div>
    </div>
  <div style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; z-index: -100; clip-path: polygon(0px 0px, 100% 0px, 100% 100%, 0px 100%);" id="jarallax-container-0"><img src="{{ asset('assets/images/banner-1.jpg') }}" class="jarallax-img" style="object-fit: cover; object-position: 50% 50%; max-width: none; position: fixed; top: 0px; left: 0px; width: 1903px; height: 423.5px; overflow: hidden; pointer-events: none; transform-style: preserve-3d; backface-visibility: hidden; will-change: transform, opacity; margin-top: 63.75px; transform: translate3d(0px, -21.25px, 0px);"></div>
</section>

<section class="py-5 my-5">
  <div class="container-sm">
    <div class="row justify-content-center">
      <div class="col-lg-6 d-flex align-items-end">
        <img src="{{ asset('assets/images/img-login.jpg' ) }}" alt="Sign Up" class="img-fluid">
      </div>
      <div class="col-lg-6 p-5 bg-white border shadow-sm">
        <h5 class="text-uppercase mb-4">Sign Up</h5>
        <form id="form" class="form-group flex-wrap" method="POST" action="{{ route('user.register')}}" enctype="multipart/form-data">
            @csrf
          <div class="col-12 pb-3">
            <label class="d-none">Name *</label>
            <input type="text" name="name" placeholder="Name" class="form-control" >
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-12 pb-3">
            <label class="d-none">Email Address *</label>
            <input type="email" name="email" placeholder="Email Address" class="form-control" >
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-12 pb-3">
            <label class="d-none">Password *</label>
            <input type="password" name="password" placeholder="Password" class="form-control" >
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-12 pb-3">
            <label class="d-none">Confirm Password *</label>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" >
            @error('confirm_password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-12 pb-3">
            <label>
              <input type="checkbox" required="">
              <span class="label-body">I agree to the terms and conditions</span>
            </label>
          </div>
          <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary text-uppercase w-100">Sign Up</button>
            <p><a href="{{ route('login')}}">Already have an account? Log in</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection