@extends('layouts.app')
@section('content')
<section class="jarallax py-5">
    
    <div class="hero-content py-0 py-md-5">
        <div class="container-lg d-flex flex-column d-md-block align-items-center">
        <nav class="breadcrumb">
          <a class="breadcrumb-item nav-link" href="{{ route('home')}}">Home</a>
          <p class="breadcrumb-item nav-link" >Pages</p>
          <span class="breadcrumb-item active" aria-current="page">Contact Us</span>
        </nav>
        <h1>Contact Us</h1>
      </div>
    </div>
  <div style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; z-index: -100; clip-path: polygon(0px 0px, 100% 0px, 100% 100%, 0px 100%);" id="jarallax-container-0"><img src="{{ asset('assets/images/banner-1.jpg')}}" class="jarallax-img" style="object-fit: cover; object-position: 50% 50%; max-width: none; position: fixed; top: 0px; left: 0px; width: 1903px; height: 423.5px; overflow: hidden; pointer-events: none; transform-style: preserve-3d; backface-visibility: hidden; will-change: transform, opacity; margin-top: 63.75px; transform: translate3d(0px, -21.25px, 0px);"></div>
</section>
<!-- Contact Us Page -->
<section class="contact-page py-5">
  <div class="container">
    <h1 class="page-title text-center mb-5">Contact Us</h1>
    <div class="row">
      
      <!-- Contact Info -->
      <div class="col-lg-4 mb-4">
        <div class="contact-info p-4 bg-white rounded shadow-sm">
          <h4 class="mb-3">Get in Touch</h4>
          <p><strong>Address:</strong><br>730 Glenstone Ave 65802, Springfield, US</p>
          <p><strong>Phone:</strong><br>
            <a href="tel:+123987321" class="account-link d-block">+123 987 321</a>
            <a href="tel:+123123654" class="account-link d-block">+123 123 654</a>
          </p>
          <p><strong>Email:</strong><br>
            <a href="mailto:contact@website.com" class="account-link">contact@website.com</a>
          </p>

          <!-- Social Icons -->
          <div class="social-links mt-3">
              <ul class="d-flex list-unstyled gap-2">
                <li>
                  <a href="#" class="btn btn-outline-light">
                    <svg width="16" height="16"><use xlink:href="#facebook"></use></svg>
                  </a>
                </li>
                <li>
                  <a href="#" class="btn btn-outline-light">
                    <svg width="16" height="16"><use xlink:href="#twitter"></use></svg>
                  </a>
                </li>
                <li>
                  <a href="#" class="btn btn-outline-light">
                    <svg width="16" height="16"><use xlink:href="#youtube"></use></svg>
                  </a>
                </li>
                <li>
                  <a href="#" class="btn btn-outline-light">
                    <svg width="16" height="16"><use xlink:href="#instagram"></use></svg>
                  </a>
                </li>
                <li>
                  <a href="#" class="btn btn-outline-light">
                    <svg width="16" height="16"><use xlink:href="#amazon"></use></svg>
                  </a>
                </li>
              </ul>
            </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="col-lg-8 mb-4">
        <div class="contact-form p-4 bg-white rounded shadow-sm">
          <form action="{{ route('messageSubmit')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
              <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Your Name" required name="name">
              </div>
              <div class="col-md-6">
                <input type="email" class="form-control" placeholder="Your Email" required name="email">
              </div>
              <div class="col-12">
                <input type="text" class="form-control" placeholder="Subject" required name="subject">
              </div>
              <div class="col-12">
                <textarea class="form-control" rows="5" placeholder="Message" required name="message"></textarea>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary w-100">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>
<section class="google-map">
      <div class="mapouter">
        <div class="gmap_canvas">
          <iframe width="100%" height="500" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116833.8318789773!2d90.33728815181978!3d23.780975728157546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1747712492361!5m2!1sen!2sbd"  frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
          <a href="https://getasearch.com/fmovies"></a>
          <br>
          <style>
            .mapouter {
              position: relative;
              text-align: right;
              height: 500px;
              width: 100%;
            }
          </style>
          <a href="https://www.embedgooglemap.net">embedgooglemap.net</a>
          <style>
            .gmap_canvas {
              overflow: hidden;
              background: none !important;
              height: 500px;
              width: 100%;
            }
          </style>
        </div>
      </div>
    </section>


@endsection