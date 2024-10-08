@extends('layouts.app')

@section('content')
<div class="card">
    <h3 class="text-center mb-4">
        {{__('Share Your Business Idea') }}
    </h3>

    <form method="POST" action="{{ route('bic.save') }}">
        @csrf
        <div class="form-group mt-3">
            <label for="title">Business Idea Title:</label>
            <input type="text" class="form-control" id="title" name="title" required placeholder="Enter the title of your business idea">
        </div>
        <div class="textarea-container mt-3">
            <textarea class="form-control" rows="6" name="bicmsg" required placeholder="Describe your business idea here...Add the number of collaborators you want...Add the type of collaborators you want...">
            </textarea>
        </div>
        <div class="form-group mt-3">
            <label>Select Importance Level:</label>
            <select class="form-control" name="bipotance">
                <option value="high">High</option>
            </select>
        </div>

        <!-- Submit button -->
        <button class="btn btn-primary btn-submit mt-3">Submit</button>
    </form>
</div>

<footer class="bg-dark text-white text-center py-3 fixed-bottom">
    <p class="mb-0">Made with ❤️ by BicS</p>
</footer>

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
