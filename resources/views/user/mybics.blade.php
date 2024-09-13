@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-3">
    <div class="row">
        @forelse ($bicdeas as $idea)
        <div class="col-md-4">
            <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon">
                            @php
                                // Displaying user's initials
                                $name = $idea->user->name;
                                $nameParts = explode(' ', $name);
                                $initials = strtoupper(substr($nameParts[0], 0, 1) . (isset($nameParts[1]) ? substr($nameParts[1], 0, 1) : ''));
                            @endphp
                            <div class="initials-circle">{{ $initials }}</div>
                        </div>
                        <div class="ms-2 c-details">
                            <h6 class="mb-0">{{ $idea->user->name }}</h6>
                            <span>{{ $idea->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="badge">
                        <span>{{ ucfirst($idea->importance) }}</span>
                    </div>
                </div>
                <div class="mt-5">
                    <a href="#" class="heading-link">
                        <p class="heading">
                            {{ Str::limit($idea->description, 250) }}
                        </p>
                    </a>
                    <div class="mt-5 d-flex justify-content-center gap-3">
                        <button class="btn btn-outline-primary rounded-circle">
                            <i class="bx bx-edit"></i>
                        </button>
                        <button class="btn btn-outline-danger rounded-circle">
                            <i class="bx bx-trash"></i>
                        </button>
                    </div>
                    <div class="mt-3 d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-users"></i>
                            <span class="ms-2">32</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bx bxs-comment"></i>
                            <span class="ms-2">10</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">
                You haven't shared any ideas yet.
            </div>
        </div>
        @endforelse
    </div>
</div>
<div class="spacer"></div>

<footer class="bg-dark text-white text-center py-3 fixed-bottom">
    <p class="mb-0">Made with ❤️ by BicS</p>
</footer>
@endsection
