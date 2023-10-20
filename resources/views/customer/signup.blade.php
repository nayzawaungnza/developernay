@extends('customer.layouts.app')
@section('title','Sign Up')
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
              <h1>Sign Up</h1>
              <ul class="page-breadcrumb">
                <li>
                  <a href="#" class="text_hover_animaiton">Home</a>
                </li>
                <li>Sign Up</li>
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

                <form class="singin-form" action="{{ route('register') }}" method="post">
                    @csrf
                        @error('terms')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="row">
                            <div class="col-lg-12 form-item">
                              <div class="form-group">
                                <input name="name" id="name" type="text" value="{{ old('name') }}" class=" @error('name') is-invalid @enderror" placeholder="Complate Name*">
                                @error('name')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                              </div>
                            </div>
                            <div class="col-lg-12 form-item">
                              <div class="form-group">
                                <input name="email" id="email" type="email" value="{{ old('email') }}" class=" @error('email') is-invalid @enderror" placeholder="Email Address*">
                                @error('email')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            </div>
                            
                            <div class="col-lg-12 form-item">
                              <div class="form-group">
                                <input name="phone" id="phone"  type="tel" value="{{ old('phone') }}" class=" @error('phone') is-invalid @enderror" placeholder="Phone number*">
                                @error('phone')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            </div>
                            <div class="col-lg-12 form-item">
                                <div class="form-group">
                                    <select name="gender" id="gender" class=" @error('gender') is-invalid @enderror">
                                        <option value="" {{ old('gender') == '' ? 'selected' : '' }}>Select Gender</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('gender')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 form-item">
                              <div class="form-group">
                                <textarea name="address" id="address" rows="1" class=" @error('address') is-invalid @enderror textarea" placeholder="Your address...">{{ old('address') }}</textarea>
                                @error('address')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                              </div>
                            </div>
                            <div class="col-12 form-item">
                                <div class="form-group" >
                                    <div class="input-group" id="show_hide_password">
                                        <input  type="password" class=" @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                        <div class="input-group-addon">
                                            <a href="javascript:void(0);"><i class="far fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                        @error('password')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 form-item">
                                <div class="form-group">
                                    <div class="input-group" id="show_hide_confirm_password">
                                        <input  type="password" class=" @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirm Password">
                                        <div class="input-group-addon">
                                            <a href="javascript:void(0);"><i class="far fa-eye-slash" aria-hidden="true"></i></a>
                                        </div>
                                        @error('password_confirmation')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-sm-12 text-left">
                              <div class="pill-btn mt-4 mb-3">
                                <button type="submit" class="common_btn"> Sign Up</button>
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

        $("#show_hide_confirm_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_confirm_password input').attr("type") == "text"){
                $('#show_hide_confirm_password input').attr('type', 'password');
                $('#show_hide_confirm_password i').addClass( "fa-eye-slash" );
                $('#show_hide_confirm_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_confirm_password input').attr("type") == "password"){
                $('#show_hide_confirm_password input').attr('type', 'text');
                $('#show_hide_confirm_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_confirm_password i').addClass( "fa-eye" );
            }
        });

    });
</script>
@endsection

