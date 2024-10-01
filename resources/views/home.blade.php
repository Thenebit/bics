@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-3">

    <h3>Welcome: {{ ucfirst(Auth::user()->name) }} <i>!</i> </h3>

    <div class="row">
        @foreach ($bicdeas as $idea)
        <div class="col-md-4">
            <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon">
                            @php
                                // Displaying users intial(s)
                                $name = $idea->user->name;
                                $nameParts = explode(' ', $name);
                                $initials = strtoupper(substr($nameParts[0], 0, 1) . (isset($nameParts[1]) ? substr($nameParts[1], 0, 1) : ''));
                            @endphp
                        <div class="initials-circle">{{ $initials }}</div>
                        </div>
                        <div class="ms-2 c-details">
                            <h6 class="mb-0">{{ $idea->user->name }}</h6> <!-- Display the user's name -->
                            <span>{{ $idea->created_at->diffForHumans() }}</span> <!-- Time of idea created -->
                        </div>
                    </div>
                    <div class="badge"> <span>{{ ucfirst($idea->importance) }}</span> </div> <!-- Display the importance level -->
                </div>
                <div class="mt-5">
                    <h4 class="heading">
                        Title: {{ $idea->title }}
                    </h4>
                    <h6>Description:</h6>
                    <p class="heading">
                        {{ Str::limit($idea->description, 250) }} <!-- Limiting the idea description to 250 characters -->
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
                                <span class="ms-2">{{ $idea->contributor->count() }}</span> <!-- Contributors count -->
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="bx bxs-comment"></i>
                                <span class="ms-2">{{ $idea->comments->count() }}</span> <!-- Comments count -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- Modal to show success message --}}
@if (session('success'))
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="successModalLabel">Success</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <div class="modal-body">
        {{ session('success') }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endif

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if (session('success'))
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        @endif

        @if (session('error'))
            var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
            errorModal.show();
        @endif

    });
</script>
@endsection
