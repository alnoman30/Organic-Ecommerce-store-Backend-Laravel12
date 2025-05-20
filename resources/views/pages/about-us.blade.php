@extends('layouts.app')
@section('content')
<section class="jarallax py-5">
    
    <div class="hero-content py-0 py-md-5">
        <div class="container-lg d-flex flex-column d-md-block align-items-center">
        <nav class="breadcrumb">
          <a class="breadcrumb-item nav-link" href="{{ route('home')}}">Home</a>
          <p class="breadcrumb-item nav-link" >Pages</p>
          <span class="breadcrumb-item active" aria-current="page">About Us</span>
        </nav>
        <h1>About Us</h1>
      </div>
    </div>
  <div style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; z-index: -100; clip-path: polygon(0px 0px, 100% 0px, 100% 100%, 0px 100%);" id="jarallax-container-0"><img src="{{ asset('assets/images/banner-1.jpg')}}" class="jarallax-img" style="object-fit: cover; object-position: 50% 50%; max-width: none; position: fixed; top: 0px; left: 0px; width: 1903px; height: 423.5px; overflow: hidden; pointer-events: none; transform-style: preserve-3d; backface-visibility: hidden; will-change: transform, opacity; margin-top: 63.75px; transform: translate3d(0px, -21.25px, 0px);"></div>
</section>

<section class="company-detail py-4">
      <div class="container-lg">
        <div class="row">
          <div class="col-md-12">
            <blockquote>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut cursus leo vel orci malesuada, id sodales em volutpat.</blockquote>
            <p><strong>Vivamus sagittis pulvinar dignissim.</strong> Mauris tempus a lacus eu aliquet. Mauris gravida at ectus quis venenatis. Aenean quis feugiat turpis. Etiam lacinia interdum nibh, non convallis magna lementum vel. Phasellus varius quam ligula, in lobortis risus porttitor ut. Praesent ipsum elit, lobortis n tincidunt Vestibulum ut ros sed enim feugiat lobortis. Suspendisse fermentum nunc in est mattis molestie. Mauris ut placerat isus. Aenean mollis neque libero, ut pellentesque arcu dapibus vel.</p>
            <p>Praesent nec nisl euismod, lacinia tellus eget, bibendum ex. Maecenas imperdiet gravida pulvinar. aecenas feugiat id tellus sed sodales. Praesent maximus ultricies elit eget accumsan. Proin tortor ante, ltrices a aliquet a, facilisis quis sapien. Donec eu turpis at velit scelerisque faucibus id eget dolor. tiam lobortis ante ipsum, sed venenatis ligula facilisis quis. Fusce blandit commodo mauris, sed fringilla isi congue et. Nunc eu eros ex.</p>
          </div>
        </div>
        <div class="row row-cols-2">
          <figure class="py-3">
            <img src="{{ asset('assets/images/sample-image.jpg')}}" alt="sample image" class="img-fluid">
          </figure>
          <figure class="py-3">
            <img src="{{ asset('assets/images/sample-image-2.jpg')}}" alt="sample image" class="img-fluid">
          </figure>
        </div>
        <h2>About Organic Team</h2>
        <div class="row">
          <div class="col-md-4">
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste.</p>
          </div>
          <div class="col-md-4">
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste.</p>
          </div>
          <div class="col-md-4">
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste.</p>
          </div>
        </div>
      </div>
    </section>
    
@endsection