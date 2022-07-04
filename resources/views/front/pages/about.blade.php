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
    <!-- ======= Skills Section ======= -->
    {{-- <section id="skills" class="skills">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Skills</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
        <div class="row skills-content">
          <div class="col-lg-6">
            <div class="progress">
              <span class="skill">HTML <i class="val">100%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="progress">
              <span class="skill">CSS <i class="val">90%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="progress">
              <span class="skill">JavaScript <i class="val">75%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="progress">
              <span class="skill">PHP <i class="val">80%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="progress">
              <span class="skill">WordPress/CMS <i class="val">90%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="progress">
              <span class="skill">Photoshop <i class="val">55%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ======= Facts Section ======= -->
    <section id="facts" class="facts">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Facts</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
            <p>Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
            <p>Projects</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
            <p>Hours Of Support</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p>Hard Workers</p>
          </div>

        </div>

      </div>
    </section> --}}
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
