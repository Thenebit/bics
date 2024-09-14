@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-3">
    <div class="row">
        @if($requests->isEmpty())
            <div class="col-md-12 text-center">
                <p class="alert alert-info">There's no requests to any business idea yet!</p>
            </div>
        @else
        @foreach ($requests as $request)
        <div class="col-md-4">
            <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon">
                            @php
                                $name = $request->user->name;
                                $nameParts = explode(' ', $name);
                                $initials = strtoupper(substr($nameParts[0], 0, 1) . (isset($nameParts[1]) ? substr($nameParts[1], 0, 1) : ''));
                            @endphp
                            <div class="initials-circle">{{ $initials }}</div>
                        </div>
                        <div class="ms-2 c-details">
                            <h6 class="mb-0">{{ $request->user->name }}</h6>
                            <span>{{ $request->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="badge"> <span>{{ ucfirst($request->idea->importance) }}</span> </div>                 </div>
                <div class="mt-5">
                    <a href="#" class="heading-link">
                        <p class="heading">
                            Business Idea: {{ Str::limit($request->idea->description, 100) }}
                        </p>
                    </a>
                    <div class="mt-4">
                        <h6>User Description:</h6>
                        <p class="user-description">
                            {{ Str::limit($request->user->profile->description ?? 'No description available', 200)  }}
                        </p>
                    </div>
                    <div class="mt-5 d-flex justify-content-center gap-3">
                        <form method="POST" action="{{ url('approvereq', $request->id) }}">
                            @csrf
                            <button class="btn btn-outline-success rounded-circle" title="Approve">
                                <i class="bx bx-check"></i>
                            </button>
                        </form>
                        <form method="POST" action="{{ url('rejectreq', $request->id) }}">
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
