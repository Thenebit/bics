@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-3">

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
                    <a href="{{ url('comment', ['id' => $idea->id]) }}" class="heading-link">
                        <p class="heading">
                            {{ Str::limit($idea->description, 250) }} <!-- Limiting the idea description to 150 characters -->
                        </p>
                    </a>
                    <div class="mt-5">
                        <button class="btn btn-primary w-100">Contributor Request</button>
                        <div class="mt-3 d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-users"></i>
                                <span class="ms-2">32</span> <!-- Contributors count -->
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="bx bxs-comment"></i>
                                <span class="ms-2">10</span> <!-- Comments count -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Footer Section -->
<footer class="bg-dark text-white pt-4">
  <div class="container">
    <div class="row">
      <!-- About Section -->
      <div class="col-md-4">
          <h5>About BicS</h5>
          <p>BicS is a platform that connects students across various faculties and programs to share and collaborate on business ideas. Whether you're looking to contribute or need collaborators, BicS brings innovation together.</p>
      </div>
      <!-- Navigation Links -->
      <div class="col-md-4">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
              <li><a href="index.html" class="text-white text-decoration-none">Inbox</a></li>
              <li><a href="sharebics.html" class="text-white text-decoration-none">Share Idea</a></li>
              <li><a href="mybics.html" class="text-white text-decoration-none">Sent Ideas</a></li>
              <li><a href="requestsbics.html" class="text-white text-decoration-none">Requests</a></li>
              <li><a href="contributorbics.html" class="text-white text-decoration-none">Contributors</a></li>
              <li><a href="contribics.html" class="text-white text-decoration-none">Contributions</a></li>
          </ul>
      </div>
      <!-- Social Media Section -->
      <div class="col-md-4">
          <h5>Follow Us</h5>
          <ul class="list-unstyled d-flex gap-3">
              <li><a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#" class="text-white"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#" class="text-white"><i class="fab fa-instagram"></i></a></li>
              <li><a href="#" class="text-white"><i class="fab fa-linkedin"></i></a></li>
          </ul>
      </div>
    </div>
    <!-- Footer Bottom Section -->
    <div class="text-center pt-3">
      <p class="mb-0">&copy; 2024 BicS. All rights reserved.</p>
    </div>
  </div>
</footer>
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
    });
</script>
@endsection
