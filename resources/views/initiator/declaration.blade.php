@extends('layouts.app')
@section('content')
    <!-- Header Starts -->
    @include('initiator.layouts.header')
    <!-- Header Ends -->

    <!--Declaration Section Starts -->
    <div class="container-fluid reg-bg2">
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
                            <li class="d-flex align-items-center review">
                                <span class="verticalLine"></span>
                                <small class="round"></small>
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
                            <div class="row mb-5">
                                    <div class="d-flex justify-content-between justify-content-center">
                                        <div class="form-group proceed-btn">
                                            <input type="submit" value="Edit" class="btn btn-third" onclick="window.location.href = 'declaration-edit';">
                                        </div>
                                        <span>Date: 02/05/2023</span>
                                    </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-12 declration-content">
                                    <h2 class="mb-4">Please go through the information furnished and confirm to proceed with the registration.</h2>

                                    <table class="table table-bordered reg-info-tbl">
                                        <tbody>
                                          <tr>
                                            <th scope="row">Company Name</th>
                                            <td>Miracle Trading LLC</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Company Address </th>
                                            <td>Adil Farad, 1st Block 1st Cross, Doha, 560016</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Operation Regions</th>
                                            <td>
                                                Al Rayyan<br>
                                                Al-Shahaniya<br>
                                                Umm Salal<br>
                                                Al Wakrah<br>
                                                Doha
                                            </td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Company Website </th>
                                            <td>
                                                www.miracle.com
                                            </td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Company Fax </th>
                                            <td>
                                                +974 555 222 6665
                                            </td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Company Logo </th>
                                            <td>
                                                <img src="images/company-logo.png" alt="">
                                            </td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Business Categories</th>
                                            <td>
                                                Airconditioning & Refrigeration<br>
                                                AC Contractors & AC Rentals<br>
                                                AC Equipment & AC System Repairs<br>
                                                Air Cleaning & Air Purifying Systems
                                            </td>
                                          </tr>
                                          <tr>
                                            <th scope="row">CR License</th>
                                            <td>
                                                CR License No: 10524585<br>
                                                Expiry Date: 02/05/2024
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="license-preview d-flex align-items-center justify-content-center">
                                        QR License Preview
                                    </div>
                                    <div class="read-declaration">
                                        Please read the <a href="#"> declaration</a> and select agree to proceed.
                                        <label class="cust-checkbox agree-txt">Agree
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <div class="form-group proceed-btn">
                                <input type="submit" value="Edit" class="btn btn-third" onclick="window.location.href = 'declaration-edit';">
                            </div>
                            <div class="form-group proceed-btn">
                                <input type="submit" value="Proceed" class="btn btn-secondary" onclick="window.location.href = 'review-verification';">
                            </div>
                        </div>
                    </section>

                </section>
            </div>
        </section>
    </div>
    <!--Declaration Section Ends -->
@endsection