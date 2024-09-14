@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-3">
    <div class="row">

        <div class="col-md-4">
            <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon"> <i class="bx bxl-mailchimp"></i> </div>
                        <div class="ms-2 c-details">
                            <h6 class="mb-0">Mailchimp</h6> <span>1 day ago</span>
                        </div>
                    </div>
                    <div class="badge"> <span>Design</span> </div>
                </div>
                <div class="mt-5">
                    <a href="#" class="heading-link">
                        <p class="heading">
                            Business Idea: Lorem ipsum dolor sit amet, consectetur adipiscing elit.

                        </p>
                    </a>
                    <div class="mt-4">
                        <h6>User Description:</h6>
                        <p class="user-description">
                            Aliquam erat volutpat. Phasellus in ipsum et lorem pellentesque luctus.
                            Praesent volutpat arcu nec augue condimentum, a tincidunt erat tincidunt.
                            Sed consectetur nulla nec ipsum lacinia, et sodales lacus gravida.
                        </p>
                    </div>
                    <div class="mt-5 d-flex justify-content-center gap-3">
                        <button class="btn btn-outline-danger rounded-circle" title="Reject">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<footer class="bg-dark text-white text-center py-3 fixed-bottom">
    <p class="mb-0">Made with ❤️ by BicS</p>
</footer>
@endsection
