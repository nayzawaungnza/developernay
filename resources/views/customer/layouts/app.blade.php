
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1, target-densitydpi=device-dpi"
    />
    <title>DEVELOPER NAY | @yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('developernay/images/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('developernay/css/font-awesome-pro.css') }}" />
    <link rel="stylesheet" href="{{ asset('developernay/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('developernay/css/scroll_button.css') }}" />
    <link rel="stylesheet" href="{{ asset('developernay/css/plugin.css') }}" />
    <link rel="stylesheet" href="{{ asset('developernay/css/spacing.css') }}" />
    <link rel="stylesheet" href="{{ asset('developernay/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('developernay/css/responsive.css') }}" />
  </head>

  <body>
    <!--================================
        PRELOADER START
    =================================-->
    <div class="preloader">
      <svg viewBox="0 0 1000 1000" preserveAspectRatio="none">
        <path id="svg" d="M0,1005S175,995,500,995s500,5,500,5V0H0Z"></path>
      </svg>
      <h5 class="preloader-text">Loading</h5>
    </div>
    <!--================================
        PRELOADER END
    =================================-->
    <!--================================
        MENU START
    =================================-->
    <nav class="navbar navbar-expand-lg main_menu">
      <div class="container main_menu_bg">
        <a class="navbar-brand" href="{{ route('customer#index') }}">
          <img src="{{ asset('developernay/images/DeveloperNayWhite.png') }}" alt="Developer:NaY" class="img-fluid w-100" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fa-sharp fa-regular fa-bars bar_icon"></i>
          <i class="fa-regular fa-xmark close_icon"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav m-auto">
            <li class="nav-item">
              <a class="nav-link text_hover_animaiton active" href="#"
                >Home <i class="far fa-angle-down"></i
              ></a>
              <ul class="droap_menu">
                <li><a href="index.html">Home 1</a></li>
                <li><a href="index_2.html">Home 2</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link text_hover_animaiton" href="#">about us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text_hover_animaiton" href="#service"
                >services
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text_hover_animaiton" href="#projects"
                >Projects
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text_hover_animaiton" href="blog_list.html"
                >blog <i class="far fa-angle-down"></i
              ></a>
              <ul class="droap_menu">
                <li>
                  <a href="blog_list.html">Blog List</a>
                </li>
                <li><a href="blog_details.html">Blog Details</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link text_hover_animaiton" href="contact.html"
                >contact
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text_hover_animaiton" href="{{ route('customer#myaccount') }}"
                >My Account <i class="far fa-angle-down"></i
              ></a>
              <ul class="droap_menu">
                <li>
                  <a href="{{ route('customer#signup') }}">Sign Up</a>
                </li>
                <li><a href="{{ route('customer#signin') }}">Sign In</a></li>
              </ul>
            </li>
            
          </ul>
          <span
            class="toggle_icon c-pointer"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasRight"
            aria-controls="offcanvasRight"
            ><i
              class="fa-sharp fa-sharp fa-regular fa-bars bar_icon-staggered"
            ></i
          ></span>
        </div>
      </div>
    </nav>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight">
      <div class="offcanvas-header">
        <a class="offcanvas-logo" href="index_2.html">
          <img src="{{ asset('developernay/images/DeveloperNay2.png') }}" alt="Developer:NAY" class="img-fluid w-100" />
        </a>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="offcanvas"
          aria-label="Close"
        >
          <i class="fa-regular fa-xmark"></i>
        </button>
      </div>
      <div class="offcanvas-body">
        <div class="tf__design_form offcanvas_form">
          <div class="offcanvas-content-box">
            <h4 class="offcanvas_title">About us</h4>
            <p>
              Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod
              tempor incididunt ut labore et magna aliqua. Ut enim ad minim
              veniam laboris.
            </p>
          </div>
          <div class="offcanvas_contact_form">
            <h4 class="offcanvas_title">Get In Touch</h4>
            <form action="#">
              <input
                type="text"
                placeholder="Your Name"
                aria-autocomplete="list"
              />
              <input type="email" placeholder="Your Email" />
              <textarea rows="4" placeholder="Message"></textarea>
              <button type="submit" class="common_btn">submit now</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--================================
        MENU END
    =================================-->

   @yield('content')

    
    <!--================================
        SUBSCRIBE START
    =================================-->
    <div class="tf__subscribe" style="background: url({{ asset('developernay/images/bg/subscribe.jpg') }})">
      <div class="tf__subscribe_overlay pt_115 xs_pt_75 pb_120 xs_pb_80">
        <div class="container">
          <div class="row">
            <div class="col-xl-6 col-lg-8 col-md-10 m-auto">
              <div class="tf__subscribe_text">
                <h3 class="has-animation">SUBSCRIBE MY NEWSLETTER</h3>
                <form action="#" class="">
                  <input type="text" placeholder="Enter Your Email" />
                  <button type="submit" class="common_btn">Notify Now</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================================
SUBSCRIBE END
=================================-->

    <!--================================
        FOOTER START
    =================================-->
    <footer class="footer" id="footer">
      <div class="footer-container">
        <div class="pt_120 xs_pt_80 sm_pt_80">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div
                  class="tf__footer_content fade_right"
                  data-trigerId="footer"
                  data-stagger=".25"
                >
                  <div class="icon">
                    <div class="icon-contianer">
                      <img
                        src="{{ asset('developernay/svg/map.svg') }}"
                        alt="footer"
                        class="img-fluid w-100 svg"
                      />
                    </div>
                  </div>
                  <div class="text">
                    <h3>Address</h3>
                    <p>2118 Thornridge Cir. Syracuse, Connecticut 35624</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div
                  class="tf__footer_content fade_right"
                  data-trigerId="footer"
                  data-stagger=".25"
                >
                  <div class="icon">
                    <div class="icon-contianer">
                      <img
                        src="{{ asset('developernay/svg/phone.svg') }}"
                        alt="footer"
                        class="img-fluid w-100 svg"
                      />
                    </div>
                  </div>
                  <div class="text">
                    <h3>Lets talk us</h3>
                    <a href="callto:1234567890">(603) 555-0123</a>
                    <a href="callto:1234567890">(603) 555-0123</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div
                  class="tf__footer_content fade_right"
                  data-trigerId="footer"
                  data-stagger=".25"
                >
                  <div class="icon">
                    <div class="icon-contianer">
                      <img
                        src="{{ asset('developernay/svg/envelope.svg') }}"
                        alt="footer"
                        class="img-fluid w-100 svg"
                      />
                    </div>
                  </div>
                  <div class="text">
                    <h3>Send us email</h3>
                    <a href="mailto:example@gmail.com"
                      >deanna.curtis@example.com</a
                    >
                    <a href="mailto:example@gmail.com">curtis@example.com</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="tf__footer_copyright">
                  <p>© Developer NAY {{ now()->year }} | All Rights Reserved</p>
                  <ul>
                    <li>
                      <a href="#" class="text_hover_animaiton"
                        >Trams & Condition</a
                      >
                    </li>
                    <li>
                      <a href="#" class="text_hover_animaiton"
                        >Privacy Policy</a
                      >
                    </li>
                    <li>
                      <a href="#" class="text_hover_animaiton">Sitemap</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!--================================
  FOOTER END
=================================-->
    <!--================================
        SCROLL BUTTON START
    =================================-->
    <div class="progress active c-pointer">
      <svg
        class="progress-svg"
        width="100%"
        height="100%"
        viewBox="-1 -1 102 102"
      >
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
      </svg>
    </div>
    <!--================================
        SCROLL BUTTON END
    =================================-->

    <!--================================
        CURSOR START
    =================================-->
    <div id="magic-cursor">
      <div id="ball"></div>
    </div>
    <!--================================
        CURSOR END
    =================================-->

    <script src="{{ asset('developernay/js/plugin.js') }}"></script>
    <!--scroll button js-->
    <script src="{{ asset('developernay/js/scroll_button.js') }}"></script>
    <!--sticky sidebar js-->
    <script src="{{ asset('developernay/js/sticky_sidebar.js') }}"></script>
    <!-- Animation -->
    <script src="{{ asset('developernay/js/animation.js') }}"></script>
    <!--main/custom js-->
    <script src="{{ asset('developernay/js/main.js') }}"></script>
  </body>
  @yield('script')
</html>
