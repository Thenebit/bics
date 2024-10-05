@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-3">
    <div class="row">
        @if($contributors->isEmpty())
            <div class="col-md-12 text-center">
                <p class="alert alert-info">You have no contributors approved to any business ideas yet!</p>
            </div>
        @else
        @foreach ($contributors as $contributor) <!-- Assuming $contributors is passed to the view -->
        <div class="col-md-4">
            <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon">
                            @php
                                $name = $contributor->user->name;
                                $nameParts = explode(' ', $name);
                                $initials = strtoupper(substr($nameParts[0], 0, 1) . (isset($nameParts[1]) ? substr($nameParts[1], 0, 1) : ''));
                            @endphp
                            <div class="initials-circle">{{ $initials }}</div>
                        </div>
                        <div class="ms-2 c-details">
                            <h6 class="mb-0">{{ $contributor->user->name }}</h6>
                            <span>{{ $contributor->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="badge"> <span>{{ ucfirst($contributor->idea->importance) }}</span> </div>
                </div>
                <div class="mt-5">
                    <a href="#" class="heading-link">
                        <h4 class="heading">
                            Title: {{ $contributor->idea->title }}
                        </h4>
                        <p class="heading">
                            Business Idea: {{ Str::limit($contributor->idea->description, 100) }}
                        </p>
                    </a>
                    <div class="mt-4">
                        <h6>User Description:</h6>
                        <p class="user-description">
                            {{ Str::limit($contributor->user->profile->description ?? 'No description available', 200) }}
                        </p>
                    </div>
                    <div class="mt-5 d-flex justify-content-center gap-3">
                        <form method="POST" action="{{ url('rejectcontributor', $contributor->id) }}">
                            @csrf
                            <button class="btn btn-outline-danger rounded-circle" title="Reject">
                                <i class="bx bx-x"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>

<div class="spacer"></div>

<footer class="bg-dark text-white text-center py-3 fixed-bottom">
    <p class="mb-0">Made with ❤️ by BicS</p>
</footer>
@endsection
