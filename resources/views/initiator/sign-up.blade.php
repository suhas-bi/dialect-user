@extends('layouts.app')
@section('content')
    <!-- Header Starts -->
    @include('initiator.layouts.header')
    <!-- Header Ends -->

    <!--Sign Up Sections Starts -->
    <div class="container-fluid reg-bg">
        <section class="container">
            <div class="row registration">
                <h1>Registration</h1>
                <section class="reg-content-main">
                    <div class="reg-navigation-main">
                        <ul class="d-flex align-items-center">

                            <li class="d-flex align-items-center active-first">
                                <small class="reg-nav-count-active d-flex align-items-center justify-content-center">1</small>
                                Signup
                            </li>

                            <li class="d-flex align-items-center">
                                <small class="reg-nav-count d-flex align-items-center justify-content-center">2</small>
                                Company<br>Information
                            </li>

                            <li class="d-flex align-items-center">
                                <small class="reg-nav-count d-flex align-items-center justify-content-center">3</small>
                                Business<br>Category
                            </li>
                            <li class="d-flex align-items-center">
                                <small class="reg-nav-count d-flex align-items-center justify-content-center">4</small>
                                Declaration
                            </li>
                            <li class="d-flex align-items-center review">
                                <span class="verticalLine"></span>
                                <small class="round"></small>
                                Review<br>Verification
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
                        <form action="{{ route('sign-up.store') }}" method="post">
                            @csrf
                            <div class="signup-fields">
                                <div class="row mb-3">
                                    <div class="col-md-12"><span class="mandatory">*All fields are mandatory!</span></div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Company Name <span class="mandatory">*</span></label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Company Name">
                                        <small id="name-error" class="text-danger">@error('name'){{ $message }}@enderror</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email <span class="mandatory">*</span></label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address">
                                        <small id="email-error" class="text-danger">@error('email'){{ $message }}@enderror</small>
                                    </div>
                        
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>PO Box No <span class="mandatory">*</span></label>
                                                <input id="pobox" type="text" class="form-control @error('pobox') is-invalid @enderror" name="pobox" placeholder="PO Box No">
                                                <small id="pobox-error" class="text-danger">@error('pobox'){{ $message }}@enderror</small>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Location</label>
                                                <input id="country_id" type="text" class="form-control @error('country_id') is-invalid @enderror" name="country_id" placeholder="Location">
                                                <small id="country_id-error" class="text-danger">@error('country_id'){{ $message }}@enderror</small>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="col-md-6">
                                        <label>Mobile <span class="mandatory">*</span></label>
                                        <div class="d-flex">
                                            <input type="text" placeholder="+974" class="form-control mobile-code" readonly>
                                            <input type="text" placeholder="Mobile" class="form-control mobile-number">
                                        </div>
                                        <small id="email-error" class="text-danger">@error('email'){{ $message }}@enderror</small>
                                    </div>
                                </div>
                              
                        </div>

                        <div class="d-flex justify-content-between justify-content-center">
                            <div class="already-signup">
                                Already registered? <a href="{{ url('/') }}">Click here</a> to login
                            </div>

                            <div class="form-group proceed-btn">
                                <button type="submit" value="Proceed" class="btn btn-secondary">Proceed</button>
                            </div>

                        </div>
                        </form> 
                    </section>

                </section>
            </div>
        </section>
    </div>
    <!--Sign Up Section Ends -->
@endsection