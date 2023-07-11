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
                                        <div class="form-group position-relative">
                                            <label for="name">Company Name <span class="mandatory">*</span></label>
                                            <input id="name" type="text" name="name" class="form-control" placeholder="Company Name" maxlength="255">
                                            <div class="invalid-msg2"> </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label for="email">Business Email <span class="mandatory">*</span></label>
                                            <input id="email" type="text" name="email" class="form-control" placeholder="Business Email" maxlength="255">
                                            <div class="invalid-msg2"> </div>
                                        </div>   
                                    </div>
                        
                                    <div class="col-md-6">
                                        <label>Country <span class="mandatory">*</span></label>
                                        <div class="select-drop3">
                                            <select id="standard-select" name="country_id" class="country">
                                                @foreach($countries as $key => $country)
                                                <option value="{{ $country->id }}" data-phone_code="{{ $country->phonecode }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-msg2"> </div>
                                        </div>
                                    </div>
                        
                                    <div class="col-md-6">
                                        <div class="form-group position-relative">
                                            <label>Mobile <span class="mandatory">*</span></label>
                                            <div class="d-flex">
                                                <input id="country_code" type="text" name="country_code" class="form-control mobile-code"  value="+974"  readonly>
                                                <input type="text" name="mobile" class="form-control mobile-number" placeholder="Mobile" onkeypress="allowNumbersOnly(event)" maxlength="20" pattern="[0-9]+" title="Alphabets and symbols are allowed">
                                            </div>
                                            <div class="invalid-msg2"></div>
                                        </div>    
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between justify-content-center">
                                <div class="already-signup">
                                    Already registered? <a href="{{ url('/') }}">Click here</a> to login
                                </div>

                                <div class="form-group proceed-btn">
                                    <button id="submit" type="submit" value="Proceed" class="btn btn-secondary">
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
        var code = $('.country  option:selected').data('phone_code');
        $('#country_code').val(code);
        $('#sign-up-form').submit(function(e) {
            e.preventDefault(); 
            $('#submit').prop('disabled',true);
            $('.invalid-msg2').hide();
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
                    //console.log(data);
                },
                error: function(xhr, status, error) {
                    $('#submit').prop('disabled',false);
                    if(xhr.responseJSON.status === false){
                        Swal.fire({
                            toast: true,
                            icon: 'warning',
                            title: 'Failed to send OTP. Try again',
                            position: 'top-right',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                    }
                    var response = JSON.parse(xhr.responseText);
                    var firstErrorField = null;
                    if (response.errors) {
                        $('input').removeClass('red-border');
                        $.each(response.errors, function(field, errors) {
                            if(field === 'mobile'){
                                var minput = $('input[name="' + field + '"]');
                                var mfeedback = minput.parent().next('.invalid-msg2');
                                mfeedback.html(errors[0]).show();
                            }
                            var input = $('input[name="' + field + '"]');
                            input.addClass('red-border');
                            var feedback = input.siblings('.invalid-msg2');
                            feedback.text(errors[0]).show();

                            // If it's the first error field, store it and focus on it
                            if (firstErrorField === null) {
                                firstErrorField = input;
                                input.focus();
                            }
                        });
                    }
                },
                complete: function(data) {
                    $('#submit').prop('disabled',false); 
                    $('.loader').hide();
                }
            });
        });
    });

    $('.country').on('change',function(){
        var code = $('.country  option:selected').data('phone_code');
        $('#country_code').val(code);
    });
 
    function allowNumbersOnly(e) {
        var code = (e.which) ? e.which : e.keyCode;
        if (code > 31 && (code < 48 || code > 57)) {
            e.preventDefault();
        }
    }
</script>
@endpush
@endsection