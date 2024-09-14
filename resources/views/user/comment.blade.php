@extends('layouts.app')

@section('content')
<div class="card">
    <h3 class="text-center mb-4">Business Idea Details</h3>

    <div class="idea-details mb-4">
        <div class="d-flex align-items-center">
            @php
                $ideaAuthor = $idea->user->name;
                $ideaNameParts = explode(' ', $ideaAuthor);
                $ideaInitials = strtoupper(substr($ideaNameParts[0], 0, 1) . (isset($ideaNameParts[1]) ? substr($ideaNameParts[1], 0, 1) : ''));
            @endphp
            <div class="initials-circle">{{ $ideaInitials }}</div>
            <div class="ms-2">
                <h5 class="mb-0">{{ $ideaAuthor }}</h5>
                <span>{{ $idea->created_at->diffForHumans() }}</span>
            </div>
        </div>
        <p id="idea-description" class="mt-2">{{ $idea->description }}</p>
    </div>

    <div class="mb-3">
        <!-- Comments/collaborator Count -->
        <div class="mb-2">
            <i class="fas fa-users"></i>
            <span id="contributor-count" style="padding-right: 10px;">{{ $idea->contributor->count() }} </span>
            <i class="bx bxs-comment"></i>
            <span id="comments-count">{{ $idea->comments->count() }} Comments</span>
        </div>

        <!-- Collaborators -->
        <div class="collaborators d-flex">
            @foreach($idea->contributor as $collaborator)
                @php
                    $collaboratorName = $collaborator->user->name;
                    $collaboratorNameParts = explode(' ', $collaboratorName);
                    $collaboratorInitials = strtoupper(substr($collaboratorNameParts[0], 0, 1) . (isset($collaboratorNameParts[1]) ? substr($collaboratorNameParts[1], 0, 1) : ''));
                @endphp
                <div class="initials-circle me-2"> {{ $collaboratorInitials }}</div>
            @endforeach

        </div>
    </div>

    <form method="POST" action="{{ url('store', $idea->id) }}">
        @csrf
        <div class="textarea-container mb-4">
            <textarea class="form-control" rows="3" name="comment" required placeholder="Add your comment here..."></textarea>
            <button class="btn btn-primary btn-submit mt-3">Submit Comment</button>
        </div>
    </form>

    <div class="comments-section">
        <h5 class="mb-3">User Comments</h5>
        @if($idea->comments->isEmpty())
            <div class="col-md-12 text-center">
                <p class="alert alert-info">There is no feedback to the business idea yet!</p>
            </div>
        @else

        @foreach($idea->comments as $comment)
            @php
                $commentAuthor = $comment->user->name;
                $commentNameParts = explode(' ', $commentAuthor);
                $commentInitials = strtoupper(substr($commentNameParts[0], 0, 1) . (isset($commentNameParts[1]) ? substr($commentNameParts[1], 0, 1) : ''));
            @endphp
            <div class="comment mb-3">
                <div class="d-flex align-items-center">
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

<div class="spacer"></div>

<footer class="bg-dark text-white text-center py-3 fixed-bottom">
    <p class="mb-0">Made with ❤️ by BicS</p>
</footer>

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
