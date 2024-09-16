<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>BicS Admin</title>
  <style>
    .rotate-45 {
        --transform-rotate: 45deg;
        transform: rotate(45deg);
    }

    .group:hover .group-hover\:flex {
        display: flex !important;
    }

    .card {
            border: none;
            border-radius: 10px
        }

        .card {
            border: none;
            border-radius: 10px
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

        .text1 {
            font-size: 14px;
            font-weight: 600
        }

        .text2 {
            color: #a5aec0
        }
</style>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css'>
<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css'>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head>
<body>
<!-- partial:index.partial.html -->
<!-- Component Start -->
<div class="flex flex-col w-screen h-screen overflow-auto text-gray-700 bg-gradient-to-tr from-blue-200 via-indigo-200 to-pink-200">

	<div class="flex items-center justify-between w-full h-16 px-10 bg-white bg-opacity-75">
        <div class="flex items-center">
            <svg class="w-8 h-8 text-indigo-600 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
            </svg>
            <div class="ml-10 flex items-center">
                <a class="mx-2 text-sm font-semibold text-indigo-700" style="text-decoration: none"  href="{{ route('admin.dashboard') }}">Dashboard</a>
            </div>
        </div>
        <div class="flex items-center ml-auto">
            @guest
                @if (Route::has('login'))
                    <a class="text-sm font-semibold text-indigo-700 mx-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif

                @if (Route::has('register'))
                    <a class="text-sm font-semibold text-indigo-700 mx-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <form method="POST" action="{{ route('logout') }}" class="flex items-center">
                    @csrf
                    <button type="submit" class="flex items-center justify-center w-8 h-8 overflow-hidden rounded-full cursor-pointer">
                        <div class="flex items-center justify-center w-8 h-8 ml-auto overflow-hidden rounded-full cursor-pointer bg-indigo-600 text-white font-bold flex items-center justify-center">
                            @php
                                $userName = Auth::user()->name;
                                $nameParts = explode(' ', $userName);
                                $initials = strtoupper(substr($nameParts[0], 0, 1) . (isset($nameParts[1]) ? substr($nameParts[1], 0, 1) : ''));
                            @endphp
                            {{ $initials }}
                        </div>
                    </button>
                </form>
            @endguest
        </div>
    </div>

	<div class="px-10 mt-6">
		<h1 class="text-2xl font-bold">BicS Board</h1>
	</div>

	@yield('content')

</div>

</body>
</html>
