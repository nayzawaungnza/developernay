@extends('customer.layouts.app')
@section('title','Sign In')
@section('content')

<!--================================
        BREADCRUMB START
    =================================-->
    <section
      class="tf__breadcrumb banner"
      style="background: url({{ asset('developernay/images/bg/breadcrumb.jpg') }})"
    >
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="tf__breadcrum_text">
              <h1>Sign In</h1>
              <ul class="page-breadcrumb">
                <li>
                  <a href="#" class="text_hover_animaiton">Home</a>
                </li>
                <li>Sign In</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================================
        BREADCRUMB END
    =================================-->

    <!--================================
        CONTACT START
    =================================-->
    <section class="tf__contact pt_110 xs_pt_70 pb_120 xs_pb_80">
        <div class="container">
          
          <div class="row">
            <div class="col-xl-7 col-lg-7">
              <div class="tf__design_form">
                <form class="singin-form" action="{{ route('login') }}" method="post">
                    @csrf
                        @error('terms')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <input name="email" id="email" type="email" value="{{ old('email') }}" class=" @error('email') is-invalid @enderror" placeholder="Email Address*">
                                @error('email')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12">
                                    <div class="" id="show_hide_password">
                                        <input  type="password" class=" @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                        <div class="">
                                            <a href="javascript:void(0);"><i class="far fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                        @error('password')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                            </div>
                            
                            <div class="col-sm-12 text-left">
                              <div class="pill-btn mt-4 mb-3">
                                <button type="submit" class="common_btn"> Sign In</button>
                              </div>
                            </div>
                        </div>
            
                </form>
                
              </div>
            </div>
            <div class="col-xl-5 col-lg-5">
              
            </div>
          </div>
        </div>
      </section>
      <!--================================
          CONTACT END
      =================================-->

      

@endsection
@section('script')
<script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
        });

      

    });
</script>
@endsection

