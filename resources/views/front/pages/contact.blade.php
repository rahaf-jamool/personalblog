@extends('welcome')

@section('content')
    <section id="contact" class="contact mt-5">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>{{__('front.contact')}}</h2>
          <p>{{__('front.contactDesc')}}</p>
        </div>
        <div class="row mt-5">
          <div class="col-lg-4">
            <div class="info">
              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>{{__('front.gmail')}}:</h4>
                <p>{{$about->gmail}}</p>
              </div>
              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>{{__('front.phone')}}:</h4>
                <p>{{$about->phone}}</p>
              </div>
            </div>
          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
            @if (Session::has('success'))
              <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
              </div>
            @endif
            @if (Session::has('error'))
              <div class="alert alert-danger" role="alert">
                {{Session::get('error')}}
              </div>
            @endif
            <form action="{{route('contact.sendMessage')}}" method="POST" class="php-email-form mb-5">
              @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="text-center"><button type="submit">{{__('front.sendMsg')}}</button></div>
            </form>
          </div>
        </div>
      </div>
    </section>
@endsection