@extends('layouts.adminapp')

@section('content')

<div class="container mt-5 mb-3">
    <h3>{{ $user->name }}'s : Shared Business Ideas</h3>

    <div class="row">
        @if ($ideas->isEmpty())
            <p><p>No business ideas shared by this user.</p></p>
        @else
        @foreach($ideas as $idea)
            <div class="col-md-4">
                <div class="card p-3 mb-2">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon">
                                @php
                                    $name = $user->name;
                                    $nameParts = explode(' ', $name);
                                    $initials = strtoupper(substr($nameParts[0], 0, 1) . (isset($nameParts[1]) ? substr($nameParts[1], 0, 1) : ''));
                                @endphp
                                <div class="initials-circle">{{ $initials }}</div>
                            </div>
                            <div class="ms-2 c-details">
                                <h6 class="mb-0">{{ $user->name }}</h6>
                                <span>{{ $idea->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <div class="badge"> <span>{{ $idea->importance }}</span> </div>
                    </div>
                    <div class="mt-5">
                        <a href="{{ url('forum', $idea->id) }}" class="heading-link">
                            <p class="heading">
                                {{ Str::limit($idea->description, 140) }}
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
        @endif
    </div>
</div>

@endsection
