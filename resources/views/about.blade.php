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
      <img class="logo-main" src="landing/images/BiC.png" alt="logo" />
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

<section class="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- <div class="about-me"><img src="images/about/actior.png" alt="image"> -->
          <h3>Welcome to BICS: Business Ideas Collaboration System</h3>
          <p>Our Business Idea Collaboration System is a platform designed to
            foster innovation and teamwork among university students across different faculties.
            The system enables students to share their unique business ideas, collaborate with peers
            from other departments, and bring their creative concepts to life. </p>
          <div class="banner">
            <div class="about-shape-right-top">
              <img src="landing/images/about/blob1.svg" alt="svg">
            </div>
            <div class="about-shape-left-bottom">
              <img src="landing/images/about/blob2.svg" alt="svg">
            </div>
            <img src="landing/images/c6.jpg" height="520px" width="1170px" alt="banner">
          </div><br><br>
          <h3>Here's the advantages that you can do with us:</h3><br>
          <p>Idea Sharing: Students can post their business ideas, providing descriptions and categorizing them by department or interest area.<br><br>
            Collaboration Requests: Users can request to join projects they are interested in, offering their expertise to help develop and execute ideas.<br><br>
            Commenting & Feedback: Ideas can be discussed openly with peers, allowing constructive feedback through comments and ratings.<br><br>
            Profile Management: Each user can update their profile with information about their academic background and skill set, making it easier to connect with like-minded individuals.<br><br>
            And More!
          </p>
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
