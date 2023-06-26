@extends('member.layouts.app')
@section('content')
    <!-- Header Starts -->
    @include('member.layouts.header')
    <!-- Header Ends -->


    <!-- Main Content -->
    <section class="container-fluid pleft-56">

        <div class="row">
            <div class="col-md-12  d-flex align-items-center justify-content-center mt-5 pt-5">
                <img src="{{ asset('assets/images/coming-soon.svg') }}">
            </div>
        </div>

    </section>
    <!-- End Main Content -->
@push('scripts')
    
@endpush
 
@endsection    