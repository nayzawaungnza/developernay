@extends('customer.layouts.app')
@section('title','My Account')
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
              <h1>My Account</h1>
              <ul class="page-breadcrumb">
                <li>
                  <a href="#" class="text_hover_animaiton">Home</a>
                </li>
                <li>My Account</li>
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
              
<h1>My Account - you are login. </h1>
<h4>Id - {{ auth()->user()->id }}</h4>
<h6>Role - {{ auth()->user()->role }}</h6>

<form action="{{ route('logout') }}" method="post">
    @csrf
    <input type="submit" class="btn-danger" value="Logout">
</form>
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
    
</script>
@endsection

