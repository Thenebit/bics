@extends('layouts.app')

@section('content')
<div class="card">
    <h3 class="text-center mb-4">
        {{ isset($idea) ? 'Edit Your Business Idea' : 'Share Your Business Idea' }}
    </h3>
    <form method="POST" action="{{ isset($idea) ? url('update', $idea->id) : url('save') }}">
        @csrf
        @if(isset($idea))
            @method('PUT')
        @endif

        <div class="textarea-container">
            <textarea class="form-control" rows="6" name="bicmsg" required placeholder="Describe your business idea here...">{{ old('bicmsg', $idea->description ?? '') }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label for="importance-level">Select Importance Level:</label>
            <select class="form-control" name="bipotance">
                <option value="high" {{ (isset($idea) && $idea->importance == 'high') ? 'selected' : '' }}>High</option>
                <option value="medium" {{ (isset($idea) && $idea->importance == 'medium') ? 'selected' : '' }}>Medium</option>
                <option value="low" {{ (isset($idea) && $idea->importance == 'low') ? 'selected' : '' }}>Low</option>
            </select>
        </div>

        <button class="btn btn-primary btn-submit mt-3">{{ isset($idea) ? 'Update' : 'Submit' }}</button>
    </form>
</div>

<footer class="bg-dark text-white text-center py-3 fixed-bottom">
    <p class="mb-0">Made with ❤️ by BicS</p>
</footer>
@endsection
