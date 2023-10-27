@extends('customer.layouts.app')
@section('title','Home')
@section('content')

<!--================================
        BANNER START
    =================================-->
    <section
      class="tf__banner banner"
      style="background: url({{ asset('developernay/images/bg/banner.jpg') }})"
    >
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-xl-6 col-lg-8">
            <div class="tf__banner_text">
              <h1>
                Hi, I'm {{ $profile->name }}!<br> {{ $profile->heading }}
                <span class="cd-headline rotate-1">
                  <!-- ANIMATE TEXT VALUES: zoom, rotate-1, letters type, letters rotate-2, loading-bar, slide, clip, letters rotate-3, letters scale, push,  -->
                  <span class="cd-words-wrapper">
                    @php
                      $headline = explode("@", $profile->headline);
                      
                    @endphp
                    @foreach ($headline as $key => $value)
                    <b class="{{ $key == 0 ? 'is-visible' : 'not-visible' }}">{{ $value }}</b>
                    @endforeach
                    
                  </span>
                </span>
              </h1>
              {!! $profile->bio  !!}
              <ul>
                <li>
                  <a class="common_btn" href="#"
                    >Download Cv <i class="fa-solid fa-arrow-down-to-line"></i
                  ></a>
                </li>
                <li>
                  <a
                    class="banner_video_btn play_btn"
                    href="https://www.youtube.com/watch?v=B-ytMSuwbf8"
                    ><i class="fa-sharp fa-solid fa-circle-play"></i> Watch the
                    Video</a
                  >
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-5 col-lg-4">
            <div class="tf__banner_img">
              <div class="img">
                <img
                  src="{{ asset('developernay/images/bannerNay.png') }}"
                  alt="NAY ZAW AUNG"
                  class="img-fluid w-100"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================================
        BANNER END
    =================================-->

<!--  Hero Start  -->

  <!--  Hero End  -->
@endsection
@section('script')
<script>
    
</script>
@endsection

