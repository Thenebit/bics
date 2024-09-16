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
</style>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css'>
<link rel="stylesheet" href="./style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

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
                <a class="mx-2 text-sm font-semibold text-indigo-700" style="text-decoration: none"  href="#">Dashboard</a>
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
