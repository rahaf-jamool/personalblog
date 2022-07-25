@extends('welcome')

@section('content')
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>{{__('front.about')}}</h2>
          <p>{{__('front.aboutDesc')}}</p>
        </div>
        <div class="row">
          <div class="col-lg-4">
            @if ($about->photo == '')
              <img src="{{ asset('img/favicon.png') }}" class="img-fluid" />
            @else
              <img src="{{asset('storage/'.$about->photo->src)}}" class="img-fluid" alt="">
            @endif
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content">
            <h3>{{$about->name}}</h3>
            <p class="fst-italic">
              {{$about->short_desc}}
            </p>
            <div class="row">
              <div class="col-lg-7">
                <ul>
                  <li><i class="bi bi-rounded-right"></i> <strong>{{__('front.phone')}}:</strong> {{$about->phone}}</li>
                  <li><i class="bi bi-rounded-right"></i> <strong>{{__('front.twitter')}}:</strong> {{$about->twitter}}</li>
                  <li><i class="bi bi-rounded-right"></i> <strong>{{__('front.facebook')}}:</strong> {{$about->facebook}}</li>
                  <li><i class="bi bi-rounded-right"></i> <strong>{{__('front.instegram')}}:</strong> {{$about->instegram}}</li>
                </ul>
              </div>
              <div class="col-lg-5">
                <ul>
                  <li><i class="bi bi-rounded-right"></i> <strong>{{__('front.address')}}:</strong> {{$about->address}}</li>
                  <li><i class="bi bi-rounded-right"></i> <strong>{{__('front.job')}}:</strong> {{$about->job}}</li>
                  <li><i class="bi bi-rounded-right"></i> <strong>{{__('front.gmail')}}:</strong> {{$about->gmail}}</li>
                </ul>
              </div>
            </div>
            <p>
              {{$about->long_desc}}
            </p>
          </div>
        </div>
      </div>
    </section>
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>{{__('front.testimonials')}}</h2>
          <p>{{__('front.testimonialDesc')}}</p>
        </div>
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            @foreach ($testimonials as $testimonial)
              <div class="swiper-slide">
                  <div class="testimonial-item">
                    <h3>{{$testimonial->name}}</h3>
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      {{$testimonial->desc}}
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                  </div>
              </div>
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
@endsection
