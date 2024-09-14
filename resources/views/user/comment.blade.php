@extends('layouts.app')

@section('content')
<div class="card">
    <h3 class="text-center mb-4">Business Idea Details</h3>

    <!-- Business Idea Description -->
    <div class="idea-details mb-4">
        <h5><strong>Business Idea by:</strong> <span id="idea-author">John Doe</span></h5>
        <p id="idea-description">Here goes the description of the business idea that the user clicked on.</p>
    </div>

    <!-- Comments & Collaborators Section -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Comments Count -->
        <div>
            <i class="bx bx-comment"></i>
            <span id="comments-count">12 Comments</span>
        </div>
        <!-- Collaborators -->
        <div class="collaborators d-flex">
            <img src="avatar1.jpg" alt="Collaborator 1" class="rounded-circle collaborator-avatar me-2">
            <img src="avatar2.jpg" alt="Collaborator 2" class="rounded-circle collaborator-avatar me-2">
            <img src="avatar3.jpg" alt="Collaborator 3" class="rounded-circle collaborator-avatar">
        </div>
    </div>

    <!-- Comment Textarea -->
    <div class="textarea-container mb-4">
        <textarea class="form-control" rows="3" name="comment" required placeholder="Add your comment here..."></textarea>
        <button class="btn btn-primary btn-submit mt-3">Submit Comment</button>
    </div>

    <!-- Display Comments -->
    <div class="comments-section">
        <h5 class="mb-3">User Comments</h5>

        <!-- Example Comment -->
        <div class="comment mb-3">
            <strong>Jane Doe:</strong>
            <p>This is a comment made by another user regarding the business idea.</p>
        </div>

        <div class="comment mb-3">
            <strong>Alex Smith:</strong>
            <p>Interesting idea! I would love to contribute to this project.</p>
        </div>

    </div>

</div>

<footer class="bg-dark text-white text-center py-3 fixed-bottom">
    <p class="mb-0">Made with ❤️ by BicS</p>
</footer>
@endsection
