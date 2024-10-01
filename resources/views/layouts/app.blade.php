<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bics</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet"> -->

    <style>
        body {
            background-color: #eee
        }
        /* Navigation */
        .navbar {
            background-color: #087fff;
        }

        .navbar-brand, .nav-link {
            color: rgb(255, 255, 255);
        }

        .nav-link:hover {
            color: #fffbec;
        }

        .card {
            width: 100%;
            max-width: 600px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
        }

        .textarea-container {
            margin-bottom: 20px;
        }

        .btn-submit {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }

        .profile-card {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
        .form-label {
            font-weight: 600;
        }

        .c-details span {
            font-weight: 300;
            font-size: 13px
        }

        .icon {
            width: 50px;
            height: 50px;
            background-color: #eee;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 39px
        }

        .badge span {
            background-color: #fffbec;
            width: 60px;
            height: 25px;
            padding-bottom: 3px;
            border-radius: 5px;
            display: flex;
            color: #fed85d;
            justify-content: center;
            align-items: center
        }

        .heading-link {
          color: inherit;
          text-decoration: none;
        }

        .heading-link .heading {
          cursor: pointer;
          transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        /* .heading-link .heading:hover {
          transform: translateY(-5px);
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        } */

        .text1 {
            font-size: 14px;
            font-weight: 600
        }

        .text2 {
            color: #a5aec0
        }

        .initials-circle {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            font-size: 16px;
        }

        .spacer {
            height: 80px;
        }

        #back-btn {
            top: 50%;
            left: -50px;
            z-index: 10;
            padding: 10px;
            border-radius: 50%;
            background-color: #007bff;
            color: white;
        }

        #back-btn:hover {
            background-color: #0056b3;
            color: white;
        }

        .btn-floating {
            width: 45px;
            height: 45px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .float-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            border-radius: 50%;
            padding: 15px;
            text-align: center;
            font-size: 24px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            transition: background-color 0.3s ease;
        }

        .float-button:hover {
            background-color: #0056b3;
            color: white;
            text-decoration: none;
        }

    </style>
</head>
<body>

     <!-- Navigation Bar -->
     <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">BicS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">


                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}"><i class="bx bx-envelope"></i> Inbox</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('sharebics')}}"><i class="bx bx-plus-circle"></i> Share Idea</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('mybics')}}"><i class="bx bx-send"></i> Sent Ideas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('requestsbics')}}"><i class="bx bx-message-square-detail"></i> Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('contributorbics')}}"><i class="bx bx-group"></i> Contributors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('contribics')}}"><i class="bx bx-task"></i> Contributions</a>
                        </li>

                        <!-- Notifications will be added later -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('profilebics')}}"><i class="bx bx-user"></i> Profile</a>
                        </li>

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @else
                            <li class="nav-item">
                                <!-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a> -->

                                <a class="nav-link" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="bx bx-log-out"></i> {{__('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </li>
                        @endguest
                </ul>

            </div>
        </div>
    </nav>
    <!-- Card to show business ideas -->
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')

</body>
</html>

