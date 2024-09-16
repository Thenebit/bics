@extends('layouts.adminapp')

@section('content')

<div class="container mt-5 mb-3">

    <div class="bg-white p-4 rounded-lg shadow-md mb-4">
        <div class="d-flex flex-row align-items-center">
            <div class="icon">
                @php
                    $name = $idea->user->name;
                    $nameParts = explode(' ', $name);
                    $initials = strtoupper(substr($nameParts[0], 0, 1) . (isset($nameParts[1]) ? substr($nameParts[1], 0, 1) : ''));
                @endphp
                <div class="initials-circle">{{ $initials }}</div>
            </div>
            <div class="ms-2 c-details">
                <h6 class="mb-0">{{ $idea->user->name }}</h6> <span>{{ $idea->created_at->diffForHumans() }}</span>
            </div>
        </div>
        <p class="mt-3 mb-4">
            {{ $idea->description }}
        </p>
        <!-- Comments Section -->
        <div class="bg-gray-100 p-3 rounded">

            <form action="{{ route('forum.save', $idea->id) }}" method="POST">
                @csrf
                <textarea class="w-full p-2 mt-2 rounded border" name="comment" rows="2" placeholder="Add a comment..."></textarea>
                <button type="submit" class="mt-2 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                    Comment
                </button>
            </form>

            <h6 class="font-semibold">Comments</h6>
            @if($idea->comments->isEmpty())
            <div class="col-md-12 text-center">
                <p class="alert alert-info">There is no feedback to the business idea yet!</p>
            </div>
            @else
            @foreach ($idea->comments as $comment)
            @php
                $commentAuthor = $comment->user->name;
                $commentNameParts = explode(' ', $commentAuthor);
                $commentInitials = strtoupper(substr($commentNameParts[0], 0, 1) . (isset($commentNameParts[1]) ? substr($commentNameParts[1], 0, 1) : ''));
            @endphp
            <div class="mt-2">
                <div class="d-flex mb-2">
                    <div class="initials-circle me-2">{{ $commentInitials }}</div>
                    <div>
                        <strong>{{ $commentAuthor }}</strong>
                        <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                <p>{{ $comment->content }}</p>
            </div>
            @endforeach
            @endif

        </div>
    </div>
</div>
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
    });
</script>
@endsection
