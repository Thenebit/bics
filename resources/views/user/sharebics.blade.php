@extends('layouts.app')

@section('content')
<div class="card">
    <h3 class="text-center mb-4">Share Your Business Idea</h3>
    <form method="POST" action="{{ url('save') }}" >
        @csrf
        <div class="textarea-container">
            <textarea class="form-control" rows="6" name="bicmsg" required placeholder="Describe your business idea here..."></textarea>
        </div>

        <div class="form-group mt-3">
            <label for="importance-level">Select Importance Level:</label>
            <select class="form-control" name="bipotance">
                
                <option value="high">High</option>
                <option value="medium">Medium</option>
                <option value="low">Low</option>
            </select>
         </div>
        <button class="btn btn-primary btn-submit mt-3">Submit</button>
    </form>

</div>

<footer class="bg-dark text-white text-center py-3 fixed-bottom">
    <p class="mb-0">Made with ❤️ by BicS</p>
</footer>
@endsection
