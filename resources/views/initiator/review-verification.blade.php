@extends('layouts.app')
@section('content')
    <!-- Header Starts -->
    @include('initiator.layouts.header')
    <!-- Header Ends -->

    <!--Review Verification Section Starts -->
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
                            <li class="d-flex align-items-center">
                                <small class="reg-nav-count d-flex align-items-center justify-content-center">5</small>
                                Account<br>Creation
                            </li>
                            <li class="d-flex align-items-center completion">
                                <small class="reg-nav-count d-flex align-items-center justify-content-center">6</small>
                                Completion
                            </li>

                        </ul>
                        
                    </div>
                    
                    <section class="reg-content-sec">
                        <div class="signup-fields">
                            <div class="row mt-4">
                                <div class="col-md-12 varify-heading">
                                    <h2>That's Great! Thanks for updating your company details</h2>
                                    <h1>We are reviewing, you will hear from us soon</h1>
                                    <p>
                                        Once the verification is completed, all your registered account users will be acknowledged by an email.
                                    </p>

                                    <div class="reivew-status d-flex justify-content-center">
                                        <div class="request-submited active">
                                            <h2>Request Submitted</h2>
                                            <h3>({{ $company->updated_at}})</h3>
                                        </div>

                                        <div class="admin-review">
                                            <h2>Admin Review</h2>
                                            <h3>(SLA: 2 Business days)</h3>
                                        </div>

                                        <div class="admin-approval d-flex align-items-center justify-content-center">
                                            <h2>Admin Approval</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between justify-content-center">
                            <div class="already-signup">
                                <span class="need-help">Need help?</span> <span class="call-expert">Call an expert</span> <span class="expert-number">+974 123456</span>
                            </div>

                            <div class="form-group proceed-btn">
                                <input type="submit" value="Proceed" class="btn btn-secondary" onclick="window.location.href = '/';">
                            </div>

                        </div>
                    </section>

                </section>
            </div>
        </section>
    </div>
    <!--Review Verification Section Ends -->
@endsection