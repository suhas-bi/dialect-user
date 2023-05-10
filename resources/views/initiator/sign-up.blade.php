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
                        <form id="sign-up-form" action="{{ route('sign-up.store') }}" method="post">
                            @csrf
                            <div class="signup-fields">
                                <div class="row mb-3">
                                    <div class="col-md-12"><span class="mandatory">*All fields are mandatory!</span></div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Company Name <span class="mandatory">*</span></label>
                                        <input id="name" type="text" class="form-control" name="name" placeholder="Company Name">
                                        <small class="invalid-feedback"></small>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email <span class="mandatory">*</span></label>
                                        <input id="email" type="email" class="form-control" name="email" placeholder="Email Address">
                                        <small class="invalid-feedback"></small>
                                    </div>
                        
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>PO Box No <span class="mandatory">*</span></label>
                                                <input id="pobox" type="text" class="form-control" name="pobox" placeholder="PO Box No">
                                                <small class="invalid-feedback"></small>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Location</label>
                                                <input id="country_id" type="text" class="form-control" name="country_id" placeholder="Location">
                                                <small class="invalid-feedback"></small>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="col-md-6">
                                        <label>Mobile <span class="mandatory">*</span></label>
                                        <div class="d-flex">
                                            <input type="text" class="form-control mobile-code" name="country_code" value="+974" readonly>
                                            <input type="text" class="form-control mobile-number" name="mobile" placeholder="Mobile">
                                        </div>
                                        <small class="invalid-feedback"></small>
                                    </div>
                                </div>
                              
                        </div>

                        <div class="d-flex justify-content-between justify-content-center">
                            <div class="already-signup">
                                Already registered? <a href="{{ url('/') }}">Click here</a> to login
                            </div>

                            <div class="form-group proceed-btn">
                                <button type="submit" value="Proceed" class="btn btn-secondary">
                                    <i class="fa fa-repeat fa-spin text-white loader"></i>
                                    <span class="text-white">Proceed</span>
                                </button>
                            </div>

                        </div>
                        </form> 
                    </section>

                </section>
            </div>
        </section>
    </div>
    <!--Sign Up Section Ends -->
@push('scripts')
<script>
    $(document).ready(function() {
        $('.loader').hide();
        $('#sign-up-form').submit(function(e) {
            e.preventDefault(); 
            var formData = $(this).serialize(); 
            var action = $(this).attr('action');
            $.ajax({
                url: action,
                type: "POST",
                data: formData,
                beforeSend: function() {
                    $('.loader').show();
                },
                success: function(data) {
                    if(data.status === true){
                        localStorage.setItem('data', JSON.stringify(data.user));
                        window.location.href = '/sign-up/verify';
                    }
                    else{
                        alert('Something went wrong! Try Again');
                    }
                },
                error: function(xhr, status, error) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.errors) {
                        $.each(response.errors, function(field, errors) {
                            if(field === 'mobile'){
                                var minput = $('input[name="' + field + '"]');
                                var mfeedback = minput.parent().next('.invalid-feedback');
                                mfeedback.html(errors[0]);
                            }
                            var input = $('input[name="' + field + '"]');
                            input.addClass('is-invalid');
                            var feedback = input.siblings('.invalid-feedback');
                            feedback.text(errors[0]);
                        });
                    }
                },
                complete: function(data) {
                    $('.loader').hide();
                }
            });
        });
    });
</script>
@endpush
@endsection