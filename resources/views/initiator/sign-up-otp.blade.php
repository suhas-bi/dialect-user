@extends('layouts.app')
@section('content')
    <!-- Header Starts -->
    @include('initiator.layouts.header')
    <!-- Header Ends -->

    <!--Sign Up OTP Sections Starts -->
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
                        <div class="signup-fields d-flex justify-content-center">
                            <div class="email-otp">
                                <h3>An OTP has been sent to your email.<br> Please enter the OTP below.</h3>
                                <span>We've sent you the verification code on<a href="#" id="email"></a></span>
                                <form id="otp-form" action="{{ route('sign-up.verify-otp') }}" method="post" class="digit-group d-flex justify-content-center " data-group-name="digits" data-autosubmit="false" autocomplete="off">
                                    @csrf
                                    <input type="text" id="digit-1" name="digit-1" data-next="digit-2" class="input-key" maxlength="1" autofocus onkeypress="allowNumbersOnly(event)"/>
                                    <input type="text" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" class="input-key" maxlength="1" onkeypress="allowNumbersOnly(event)"/>
                                    <input type="text" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" class="input-key" maxlength="1" onkeypress="allowNumbersOnly(event)"/>
                                    <input type="text" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" class="input-key" maxlength="1" onkeypress="allowNumbersOnly(event)"/>
                                    <input type="text" id="digit-5" name="digit-5" data-next="digit-6" data-previous="digit-4" class="input-key" maxlength="1" onkeypress="allowNumbersOnly(event)"/>
                                    <input type="text" id="digit-6" name="digit-6" data-previous="digit-5" class="input-key" maxlength="1" onkeypress="allowNumbersOnly(event)"/>
                                </form>
                                <span id="timer-zone"> Resend OTP in <span id="timer"></span></span>
                                <span id="msg-zone"></span>
                                <div id="resend-zone"><a href="#" id="resend-otp">Click here</a> to resend OTP</div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between justify-content-center">
                            <div class="already-signup">
                                Already registered? <a href="{{ url('/') }}">Click here</a> to login
                            </div>
                            <div class="form-group proceed-btn">
                                <button id="proceed" type="submit" class="btn btn-secondary">
                                    <i class="fa fa-repeat fa-spin text-white loader"></i>
                                    <span class="text-white">Proceed</span> 
                                </button>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
        </section>
    </div>
<!--Sign Up OTP Section Ends -->
@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('.loader').hide();
        $('#resend-zone').hide();
        var data = JSON.parse(localStorage.getItem('data'));
        var resend_url = 'resend-otp';
        $('#email').text(data.email);
     
        $('#resend-otp').on('click',function(){
            $.ajax({
                url: resend_url,
                type: "POST",
                data: { email:data.email },
                beforeSend: function() {
                    $('#resend-zone').hide();
                    $('#msg-zone').text('Please wait... sending new OTP!')
                },
                success: function(data) {
                    if(data.status === true){
                        Swal.fire({
                                toast: true, 
                                icon: 'success',
                                title: "New OTP has been send",
                                animation: false,
                                position: 'top-right',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            });
                        $('.input-key').val('');
                        $('#digit-1').focus();    
                        $('#msg-zone').text(' ');
                        $('#timer-zone').show();
                        timer(300);
                    }
                    else{
                        alert('Something went wrong! Try Again');
                    }
                },
                error: function(xhr, status, error) {
                    var response = JSON.parse(xhr.responseText);                   
                },
                complete: function(data) {
                    
                }
            });
        });

        $('#proceed').on('click',function(e){
            e.preventDefault();
            $('#proceed').prop('disabled',true);
            var form = $('#otp-form'); 
            var formData = form.serialize(); 
            var action = form.attr('action');
            var digit1 = $('#digit-1').val();
            var digit2 = $('#digit-2').val();
            var digit3 = $('#digit-3').val();
            var digit4 = $('#digit-4').val();
            var digit5 = $('#digit-5').val();
            var digit6 = $('#digit-6').val();
            var otp = digit1+digit2+digit3+digit4+digit5+digit6;
            $.ajax({
                url: action,
                type: "POST",
                data: {otp:otp,email:data.email},
                beforeSend: function() {
                    $('.loader').show();
                },
                success: function(data) {
                    if(data.status === true){
                        localStorage.setItem('company', JSON.stringify(data.company));
                        window.location.href = '/sign-up/company-info';
                    }
                },
                error: function(xhr, status, error) {
                    $('#proceed').prop('disabled',false);
                    var response = JSON.parse(xhr.responseText);
                    if(response.status === false){
                        console.log(response);
                        if(response.type == 1){
                            Swal.fire({
                                title: response.message,
                                text: 'Please restart the registration process!',
                                icon: 'warning',
                                showCancelButton: false,
                                confirmButtonText: 'Restart Process',
                                cancelButtonText: 'Cancel'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/sign-up';
                                }
                            });
                        }
                        else{
                            $('.input-key').val('');
                            $('#digit-1').focus();
                            if(response.message == "validation error"){
                                Swal.fire({
                                    toast: true, 
                                    icon: 'warning',
                                    title: "Please enter given OTP!",
                                    animation: false,
                                    position: 'top-right',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                });
                            }
                            else{
                                Swal.fire('Warning!', response.message, 'warning');
                            }
                        }
                        
                    }
                },
                complete: function(data) {
                    $('#proceed').prop('disabled',false);
                    $('.loader').hide(); 
                }
            });
        });

        const $inp = $(".input-key");

        $inp.on({
            paste(ev) { // Handle Pasting
                const clip = ev.originalEvent.clipboardData.getData('text').trim();
                // Allow numbers only
                if (!/\d{6}/.test(clip)) return ev.preventDefault(); // Invalid. Exit here
                // Split string to Array or characters
                const s = [...clip];
                // Populate inputs. Focus last input.
                $inp.val(i => s[i]).eq(5).focus(); 
            },
            input(ev) { // Handle typing
                const i = $inp.index(this);
                if (this.value) $inp.eq(i + 1).focus();
            },
            keydown(ev) { // Handle Deleting
                const i = $inp.index(this);
                if (!this.value && ev.key === "Backspace" && i) $inp.eq(i - 1).focus();
            }
        });

        timer(300);

    });


    let timerOn = true;
    let timerTimeout;

    function timer(remaining) {
        var m = Math.floor(remaining / 60);
        var s = remaining % 60;
        
        m = m < 10 ? '0' + m : m;
        s = s < 10 ? '0' + s : s;
        document.getElementById('timer').innerHTML = m + ':' + s;
        remaining -= 1;
        
        if(remaining >= 0 && timerOn) {
            setTimeout(function() {
                timer(remaining);
            }, 1000);
            return;
        }

        if(!timerOn) {
            // Do validate stuff here
            return;
        }
        
        // Do timeout stuff here
        $('#timer-zone').hide();
        $('#resend-zone').show();
    }

    function handleVisibilityChange() {
        if (document.visibilityState === 'visible') {
            // Resume the timer
            timerTimeout = setTimeout(function() {
            timer(remaining);
            }, 1000);
        } else {
            // Pause the timer
            clearTimeout(timerTimeout);
        }
    }

    document.addEventListener('visibilitychange', handleVisibilityChange);

    function allowNumbersOnly(e) {
        var code = (e.which) ? e.which : e.keyCode;
        if (code > 31 && (code < 48 || code > 57)) {
            e.preventDefault();
        }
    }

</script>
@endpush
@endsection