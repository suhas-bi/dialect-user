@extends('layouts.app')
@section('content')
<div class="container-fluid p-0 login-bg">

        <header class="navbar">
            <div class="header container-fluid navbar-default d-flex align-items-center">
                <div class="logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo.png') }}" alt="XCHANGE"></a>
                </div>
                <div class="header-right-btn">
                    <a href="#" class="btn btn-primary float-right ms-2">Signup as Guest </a>
                    <a href="{{ route('sign-up') }}" class="btn btn-primary float-right">Signup as Company </a>
                </div>
            </div>
        </header>


        <section class="container-fluid d-flex align-items-center login-sec">
            <div class="login-box">
                <div class="container mt-2 mb-2 px-0">
                    <!-- Main Heading -->

                    <h1 class="justify-content-center d-flex align-items-center">Login</h1>

                    <div class="p-4">
                        <form class="form-horizontal">
                            <!-- Email Input -->
                            <div class="form-group row px-3 position-relative">
                                <i class="email-ico"></i>
                                <input type="text" placeholder="Email Address"
                                    class="form-control border-info placeicon">
                            </div>

                            <!-- Password Input -->
                            <div class="form-group row px-3 position-relative">
                                <i class="password-ico"></i>
                                <input type="password" placeholder="Password"
                                    class="form-control border-info placeicon">
                                <i class="eye-ico"></i>
                            </div>

                            <!-- CheckBox Remember Me-->
                            <div class="form-group row justify-content-center px-1">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input id="customCheck1" type="checkbox" class="custom-control-input ">
                                    <label for="customCheck1" class="custom-control-label">Remember Me</label>
                                </div>
                            </div>

                            <!-- Log in Button -->
                            <div class="form-group row justify-content-center">
                                <input type="submit" value="Login" class="btn btn-primary">
                            </div>

                            <!-- Forgot Password Link -->
                            <div class="row">
                                <a href="#" class="forgot-pass">Forgot Password?</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>


        <footer id="footer">
            Copyright © 2022 dialectb2b.com. All rights reserved
        </footer>

    </div>
@endsection