@extends('layouts.app')
@section('content')
    <!-- Header Starts -->
    @include('admin.layouts.onboard-header')
    <!-- Header Ends -->

    <!-- Completion  Starts -->
    <div class="container-fluid reg-bg">
        <section class="container">
            <div class="row registration">
                <h1>Registration</h1>
                <section class="reg-content-main">
                    <div class="reg-navigation-main">
                        <ul class="d-flex align-items-center">

                            <li class="d-flex align-items-center active-first-noradius">
                                <small class="reg-nav-count-active d-flex align-items-center justify-content-center">1</small>
                                Signup
                            </li>

                            <li class="d-flex align-items-center active-noradius">
                                <small class="reg-nav-count-active d-flex align-items-center justify-content-center">2</small>
                                Company<br>Information
                            </li>

                            <li class="d-flex align-items-center active-noradius">
                                <small class="reg-nav-count-active d-flex align-items-center justify-content-center">3</small>
                                Business<br>Category
                            </li>
                            <li class="d-flex align-items-center active">
                                <small class="reg-nav-count-active d-flex align-items-center justify-content-center">4</small>
                                Declaration
                            </li>
                            <li class="d-flex align-items-center review active-review">
                                <div class="bg-purple"></div>
                                <span class="verticalLine-active"></span>
                                <small class="round-active"></small>
                                Review
                                <br>Verification
                            </li>
                            <li class="d-flex align-items-center account-creation active-noradius">
                                <div class="account-corner-bg"></div>
                                <small class="reg-nav-count-active d-flex align-items-center justify-content-center">5</small>
                                Account<br>Creation
                            </li>
                            <li class="d-flex align-items-center completion active-last-noradius">
                                <small class="reg-nav-count-active d-flex align-items-center justify-content-center">6</small>
                                Completion
                            </li>

                        </ul>
                        
                    </div>
                    
                    <section class="reg-content-sec">
                        <div class="signup-fields">
                            <div class="row mt-5 d-flex justify-content-center justify-content-center">
                                <div class="col-md-7 completion-main">
                                    <h2>Registration process completed successfully!</h2>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center justify-content-center">
                            <div class="form-group proceed-btn">
                                <a href="{{ route('admin.dashboard') }}" type="button" class="btn btn-secondary">Back to Home</a>
                            </div>

                        </div>
                    </section>

                </section>
            </div>
        </section>
    </div>
    <!-- Completion  End -->
@endsection    