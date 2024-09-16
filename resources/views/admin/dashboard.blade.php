@extends('layouts.adminapp')

@section('content')

<div class="flex flex-grow px-10 mt-4 space-x-6 overflow-auto">

    @include('admin.users')

    @include('admin.fast')

    @include('admin.foe')

    @include('admin.fbms')

    @include('admin.fhas')

    @include('admin.fbne')

    @include('admin.report')
    
    <div class="flex-shrink-0 w-6"></div>
</div>

@endsection
