@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-3">
    <h3>Shared Business Ideas From: {{ ucfirst($user->name) }}</h3> <!-- Displaying the user's name -->

    <div class="row">
        @if ($ideas->isEmpty())
            <p>No business ideas shared by this user.</p>
        @else
        @foreach ($ideas as $idea)
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
                    <div class="badge">
                        <span>{{ ucfirst($idea->importance) }}</span>
                    </div>
                </div>
                <div class="mt-5">
                    <h4 class="heading">
                        Title: {{ $idea->title }}
                    </h4>
                    <h6>Description:</h6>
                    <p class="heading">
                        {{ Str::limit($idea->description, 250) }}
                        <a href="{{ url('comment', ['id' => $idea->id]) }}" style="color: red" class="heading-link">
                            Read more
                        </a>
                    </p>
                    <div class="mt-5">
                        <form method="POST" action="{{ url('savereq', $idea->id) }}">
                            @csrf
                            <button class="btn btn-primary w-100">Collaborator</button>
                        </form>
                        <div class="mt-3 d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-users"></i>
                                <span class="ms-2">{{ $idea->contributor->count() }}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="bx bxs-comment"></i>
                                <span class="ms-2">{{ $idea->comments->count() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    <a href="javascript:history.back()" class="float-button">
        <i class="bx bx-arrow-back"></i>
    </a>
</div>



@endsection

