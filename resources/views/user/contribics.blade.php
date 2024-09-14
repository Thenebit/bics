@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-3">
    <div class="row">
        @if($contributors->isEmpty())
            <div class="col-md-12 text-center">
                <p class="alert alert-info">You are not a contributor to any business idea yet!</p>
            </div>
        @else
        @foreach ($contributors as $contribution)
        <div class="col-md-4">
            <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon">
                            @php
                                $name = $contribution->idea->user->name;
                                $nameParts = explode(' ', $name);
                                $initials = strtoupper(substr($nameParts[0], 0, 1) . (isset($nameParts[1]) ? substr($nameParts[1], 0, 1) : ''));
                            @endphp
                            <div class="initials-circle">{{ $initials }}</div>
                        </div>
                        <div class="ms-2 c-details">
                            <h6 class="mb-0">{{ $contribution->idea->user->name }}</h6>
                            <span>{{ $contribution->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="badge"> <span>{{ ucfirst($contribution->idea->importance) }}</span> </div>
                </div>
                <div class="mt-5">
                    <a href="#" class="heading-link">
                        <h6>Business Idea Description:</h6>
                        <p class="heading">
                            {{ Str::limit($contribution->idea->description, 150) }}
                        </p>
                    </a>
                    <div class="mt-5 d-flex justify-content-center gap-3">
                        <form method="POST" action="{{ url('cancel', $contribution->id) }}">
                            @csrf
                            <button class="btn btn-outline-danger rounded-circle" title="Leave">
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

<footer class="bg-dark text-white text-center py-3 fixed-bottom">
    <p class="mb-0">Made with ❤️ by BicS</p>
</footer>
@endsection
