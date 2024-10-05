<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* Custom CSS */
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .welcome-text {
            margin-top: 10px;
            font-size: 1.2em;
        }

        .sign-out-icon {
            width: 30px;
            height: 30px;
            cursor: pointer;
        }

        .dashboard-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-around;
            margin-top: 20px;
        }

        .dashboard-button {
            padding: 20px;
            background-color: #e7f3ff;
            text-align: center;
            border-radius: 10px;
            width: 150px;
        }

        .dashboard-button:hover {
            background-color: #d0e6ff;
        }

        .latest-ideas {
            margin-top: 40px;
        }

        .idea-card {
            background-color: #e7f3ff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .view-all-btn {
            text-align: center;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .dashboard-buttons {
                flex-direction: column;
                align-items: center;
            }

            .dashboard-button {
                width: 100%;
                max-width: 300px;
            }

            .dashboard-header h2 {
                font-size: 1.5em;
            }

            .welcome-text {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <h2>Dashboard</h2>
            <ul style="list-style: none">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @else
                    <li>
                        <a  href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                            <i class="fas fa-sign-out-alt fa-2x"></i>

                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </li>
                @endguest

            </ul>
        </div>
        <div class="welcome-text text-center">
            <p>Welcome, {{ ucfirst(Auth::user()->name) }}</p>
        </div>

        <div class="dashboard-buttons">
            <div class="dashboard-button">
                <a href="{{ route('home') }}" class="text-decoration-none text-dark">
                    <p>View</p>
                    <p>All Ideas</p>
                </a>
            </div>
            <div class="dashboard-button">
                <a href="{{ route('share') }}" class="text-decoration-none text-dark">
                    <p>Share</p>
                    <p>Your Ideas</p>
                </a>
            </div>
            <div class="dashboard-button">
                <a href="{{ route('mybics') }}" class="text-decoration-none text-dark">
                    <p>View</p>
                    <p>My Ideas</p>
                </a>
            </div>
            <div class="dashboard-button">
                <a href="{{ route('requestsbics') }}" class="text-decoration-none text-dark">
                    <p>View</p>
                    <p>Request</p>
                </a>
            </div>
            <div class="dashboard-button">
                <a href="{{ route('contributorbics') }}" class="text-decoration-none text-dark">
                    <p>View</p>
                    <p>Collaborators</p>
                </a>
            </div>
            <div class="dashboard-button">
                <a href="{{ route('contribics') }}" class="text-decoration-none text-dark">
                    <p>View</p>
                    <p>Contributions</p>
                </a>
            </div>
        </div>

        <!-- Latest Ideas Section -->
        <div class="latest-ideas">
            <h3>Latest Ideas</h3>
            @foreach ($data as $idea)
                <div class="idea-card d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h4>Title: {{ $idea->title }}</h4>
                        <p>Description: {{ $idea->description }}<a href="{{ route('commentbics', $idea->id)}}"> READ MORE</a></p>
                        <p>Author: {{ ucfirst($idea->user->name) }}</p>
                        <span class="text-muted ms-auto">{{ $idea->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            @endforeach
            <div class="view-all-btn">
                <a href="{{ route('home') }}" class="btn btn-outline-primary">View All</a>
            </div>
        </div>
        <div style="height: 80px;"></div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
