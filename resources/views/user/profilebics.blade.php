@extends('layouts.app')

@section('content')
<div class="profile-card">
    <h3 class="text-center">Update Profile</h3>
    <form action="{{ url('profile') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ auth()->user()->name }}" disabled>
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <select class="form-control" name="department">
                <option value="FAST">FAST</option>
                <option value="FHAS">FHAS</option>
                <option value="FOE">FOE</option>
                <option value="FBMS">FBMS</option>
                <option value="FBNE">FBNE</option>
                <option value="FSE">FSE</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Tell us about yourself...">{{ $profile->description ?? '' }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">Save Changes</button>
    </form>
</div>

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
