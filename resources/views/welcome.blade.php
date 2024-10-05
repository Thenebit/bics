<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8" />
  <title>BICS</title>

  <!--Meta For No Index-->
  <meta name="robots" content="noindex, Nofollow, Noimageindex">

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <!-- Theme Stylesheet -->
  <link href="landing/css/style.css" rel="stylesheet" />

  <!--Favicon-->
  <link rel="shortcut icon" href="landing/images/favicon.svg" type="image/x-icon" />
  <link rel="icon" href="landing/images/favicon.svg" type="image/x-icon" />
</head>

<body>

<!-- Navbar Start -->
<nav class="main-nav navbar navbar-expand-lg">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand" href="{{ url('/') }}">
      <img class="logo-main" src="landing/images/logo3.png" alt="logo" />
    </a>
    <!-- Toogle Button -->
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#mainNav">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse nav-list" id="mainNav">
      <!-- Navigation Links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/') }}">Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/abt') }}">About </a>
        </li>
        <li class="nav-item"></li>
          <a style="font-size: large; background-color: blue; color: white; border-radius: 10px;" class="nav-link" href="{{ route('login') }}">Login </a>
        </li>
      </ul>

    </div>
  </div>
</nav>
<!-- Navbar End -->

<section class="featured">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <article class="featured-post">
          <div class="featured-post-content">

            <a style="text-decoration: none; color: black;" class="featured-post-title">
              Collaborate on Your Next Big Business Ideas
            </a>
          </div>
          <div class="featured-post-thumb">
            <img src="landing/images/hero.jpg" alt="feature-post-thumb" />
          </div>
        </article>
      </div>
    </div>
  </div>
</section>

<section class="blog">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="blog-section-title">
          <h2>Business Ideas</h2>
          <p>View the latest Business Ideas</p>
        </div>
        <article class="blog-post">
          <div class="blog-post-thumb">
            <img src="landing/images/c1.jpg" alt="blog-thum" />
          </div>
          <div class="blog-post-content">
            <div class="blog-post-title">
              <!-- route to login -->
              <a href="{{ route('login') }}">KTU Alumni Platform</a>
            </div>
            <div class="blog-post-meta">
              <ul>
                <li>By <a>Azubire Raymond</a></li>
                <li>
                  <i class="fa fa-clock-o"></i>
                  September 30, 2020 - 10 min
                </li>
              </ul>
            </div>
            <p>
              A platform where past to can come together to initiate projects,
              start clubs and help current students.
            </p>
            <!-- route to login -->
            <a href="{{ route('login') }}" class="blog-post-action">read more <i class="fa fa-angle-right"></i></a>
          </div>
        </article>
        <article class="blog-post">
          <div class="blog-post-thumb">
            <img src="landing/images/c2.jpg" alt="blog-thum" />
          </div>
          <div class="blog-post-content">
            <div class="blog-post-title">
              <!-- route to login -->
              <a href="{{ route('login') }}">KTU Campus Event Platform</a>
            </div>
            <div class="blog-post-meta">
              <ul>
                <li>By <a>Mary Astor</a></li>
                <li>
                  <i class="fa fa-clock-o"></i>
                  September 30, 2020 - 10 min
                </li>
              </ul>
            </div>
            <p>
              A platform that showcases all event to take place on campus for students to discover,
              keep updated and track all new events.
            </p>
            <!-- route to login -->
            <a href="{{ route('login') }}" class="blog-post-action">read more <i class="fa fa-angle-right"></i></a>
          </div>
        </article>
      </div>
      <div class="col-lg-4">
        <div class="blog-post-widget">
          <div class="latest-widget-title">
            <h2>Trending Ideas</h2>
          </div>
          <div class="latest-widget">
            <div class="latest-widget-thum">
              <!-- route to login -->
              <a href="{{ route('login') }}">
                <img src="landing/images/c3.jpg" alt="blog-thum" /></a>
              <div class="icon">
                <a href="{{ route('login') }}">
                  <img src="landing/images/blog/icon.svg" alt="icon" /></a>
              </div>
            </div>
            <div class="latest-widget-content">
              <div class="content-title">
                <a href="{{ route('login') }}">Campvent</a>
              </div>
              <div class="content-meta">
                <ul>
                  <li>
                    <i class="fa fa-clock-o"></i>
                    September 19, 2024 - 22 min
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="latest-widget">
            <div class="latest-widget-thum">
              <a href="{{ route('login') }}">
                <img src="landing/images/c4.jpg" alt="blog-thum" /></a>
              <div class="icon">
                <a href="{{ route('login') }}">
                  <img src="landing/images/blog/icon.svg" alt="icon" /></a>
              </div>
            </div>
            <div class="latest-widget-content">
              <div class="content-title">
                <a href="{{ route('login') }}">Warehouse Deluxe</a>
              </div>
              <div class="content-meta">
                <ul>
                  <li>
                    <i class="fa fa-clock-o"></i>
                    August 19, 2024 - 32 min
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="latest-widget">
            <div class="latest-widget-thum">
              <a href="{{ route('login') }}">
                <img src="landing/images/c5.jpg" alt="blog-thum" /></a>
              <div class="icon">
                <a href="{{ route('login') }}">
                  <img src="landing/images/blog/icon.svg" alt="icon" /></a>
              </div>
            </div>
            <div class="latest-widget-content">
              <div class="content-title">
                <a href="{{ route('login') }}">Ghana Tours</a>
              </div>
              <div class="content-meta">
                <ul>
                  <li>
                    <i class="fa fa-clock-o"></i>
                    September 29, 2024 - 1 hr
                  </li>
                </ul>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<section class="footer">
  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-12">
        <div class="copy-right">
          <p>© Copyright <span id="copyrightYear"></span> - All Rights Reserved by BICS</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9rV6yesIygoVKTD6QLf_iCa9eiIIHqZ0&libraries=geometry">
</script>
<!-- Vendor JS -->
<script src="landing/vendor/jQuery/jquery.min.js"></script>
<script src="landing/vendor/bootstrap/bootstrap.min.js"></script>
<script src="landing/vendor/slick/slick.min.js"></script>
<script src="landing/vendor/g-map/gmap.js"></script>
<!-- Main JS -->
<script src="landing/js/script.js"></script>
</body>

</html>
