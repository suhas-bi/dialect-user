@extends('layouts.app')
@section('content')
<div class="container-fluid p-0 login-bg">
    <!-- Header Starts -->
    @include('initiator.layouts.header')
    <!-- Header Ends -->

     <!--Activation Section Starts -->
     <section class="container-fluid d-flex align-items-center login-sec">
            <div class="login-box">
                <div class="container mt-2 mb-2 px-0">
                    <!-- Main Heading -->

                    <h1 class="justify-content-center d-flex align-items-center">Welcome to Dialect B2B</h1>
                    
                    <div class="p-4">
                        <p>You are requested to set your Password. The new Password should be of</p>
                    <p><small> At least 8 characters—the more characters, the better.</small><br>  
                                       <small> A mixture of both uppercase and lowercase letters.</small><br>  
                                       <small> A mixture of letters and numbers.</small><br>  
                                       <small> Inclusion of at least one special character, e.g., ! @ # ? ]</small><br>  
                                       <small> Note: do not use < or > in your password, as both can cause  
                                       problems in Web browsers.</small></p>

                        <form class="form-horizontal" action="{{ route('registration.setPassword') }}" method="post">
                            @csrf
                                @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-warning" role="alert">
                                {{ $error }}
                                </div>
                                @endforeach
                                @endif 
                               <input type="hidden" name="user_id" value="{{ $user->id }}">  
                               <div class="form-group row px-3 position-relative">
                                <i class="password-ico"></i>
                                <input id="password" type="password" placeholder="Password" name="password"
                                    class="form-control border-info placeicon">
                                <i id="show-hide-password" class="eye-ico"></i>    
                            </div>

                            <div class="form-group row px-3 position-relative">
                                <i class="password-ico"></i>
                                <input id="confirm-password" type="password" placeholder="Confirm Password" name="password_confirmation"
                                    class="form-control border-info placeicon">
                                <i id="show-hide-confirm-password" class="eye-ico"></i>
                            </div>
                            <!-- Log in Button -->
                            <div class="form-group row justify-content-center">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
     <!--Activation Section Starts -->
</div>
@push('scripts')
<script>
    $('#show-hide-password').on('click', function() {
         if($('#password').attr('type') === 'password'){
            $('#password').attr('type','text')
         } 
         else{
            $('#password').attr('type','password')
         }
    });
    $('#show-hide-confirm-password').on('click', function() {
         if($('#confirm-password').attr('type') === 'password'){
            $('#confirm-password').attr('type','text')
         } 
         else{
            $('#confirm-password').attr('type','password')
         }
    });
</script>
@endpush
@endsection