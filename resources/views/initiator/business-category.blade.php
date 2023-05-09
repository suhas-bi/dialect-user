@extends('layouts.app')
@section('content')
    <!-- Header Starts -->
    @include('initiator.layouts.header')
    <!-- Header Ends -->

    <!-- Busienss Category Section Starts -->
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

                            <li class="d-flex align-items-center active">
                                <small class="reg-nav-count-active d-flex align-items-center justify-content-center">3</small>
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
                        <div class="signup-fields">
                            <div class="row mb-3">
                                <div class="col-md-12 d-flex justify-content-between justify-content-center">
                                    <h1>Add Business Category</h1>
                                    <div class="selected-basket d-flex">
                                        <span>Selected</span>
                                        <a href="#" class="basket-ico" data-toggle="modal" data-target="#selected-categories">
                                            <small class="basket-count d-flex align-items-center justify-content-center">3</small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Please Choose Category" class="form-control choose-category">
                                        </div>
                                        <div class="col-md-12">
                                           <ul class="alphabets d-flex flex-wrap align-items-center">
                                                <li><a href="#">A</a></li>
                                                <li><a href="#">B</a></li>
                                                <li><a href="#">C</a></li>
                                                <li><a href="#">D</a></li>
                                                <li><a href="#">E</a></li>
                                                <li><a href="#">F</a></li>
                                                <li><a href="#">G</a></li>
                                                <li><a href="#">H</a></li>
                                                <li><a href="#">I</a></li>
                                                <li><a href="#">J</a></li>
                                                <li><a href="#">K</a></li>
                                                <li><a href="#">L</a></li>
                                                <li><a href="#">M</a></li>
                                                <li><a href="#">N</a></li>
                                                <li><a href="#">O</a></li>
                                                <li><a href="#">P</a></li>
                                                <li><a href="#">Q</a></li>
                                                <li><a href="#">R</a></li>
                                                <li><a href="#">S</a></li>
                                                <li><a href="#">T</a></li>
                                                <li><a href="#">U</a></li>
                                                <li><a href="#">V</a></li>
                                                <li><a href="#">W</a></li>
                                                <li><a href="#">X</a></li>
                                                <li><a href="#">Y</a></li>
                                                <li><a href="#">Z</a></li>
                                           </ul>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                           <ul class="categories-list d-flex flex-wrap align-items-center">
                                                <li><a href="#">Airconditioning & Refrigeration</a></li>
                                                <li><a href="#">Accounting & Finance</a></li>
                                                <li><a href="#">Advocated & Legal Consultants</a></li>
                                                <li><a href="#">Agricultural & Farm</a></li>
                                                <li><a href="#">Architecture & Architects</a></li>
                                                <li><a href="#">Audio & Video</a></li>
                                                <li><a href="#">Banks & Banking Services</a></li>
                                                <li><a href="#">Bags & Leather Goods</a></li>
                                                <li><a href="#">Boilers & Boiler Parts</a></li>
                                                <li><a href="#">Consultants</a></li>
                                                <li><a href="#">Batteries & Charge Storage Devices</a></li>
                                                <li><a href="#">Banners, Signs & Nameplates</a></li>
                                                <li><a href="#">Construction Materials</a></li>
                                                <li><a href="#">Business Services</a></li>
                                                <li><a href="#">Canopies & Sheds</a></li>
                                                <li><a href="#">Audio & Video</a></li>
                                                <li><a href="#">Cargo & Shipping</a></li>
                                                <li><a href="#">Chemical & Chemical Products</a></li>
                                                <li><a href="#">Glass & Fiberglass</a></li>
                                                <li><a href="#">Contracting Companies</a></li>
                                                <li><a href="#">Doors Windows & Shutters</a></li>
                                                <li><a href="#">Electrical & Electronics</a></li>
                                                <li><a href="#">Engineering & Mechanicals</a></li>
                                                <li><a href="#">Filters & Filtration Systems</a></li>
                                                <li><a href="#">Fire Fighting & Prevention</a></li>
                                                <li><a href="#">Fitness Clubs & Beauty Parlours</a></li>

                                                <li><a href="#">Airconditioning & Refrigeration</a></li>
                                                <li><a href="#">Accounting & Finance</a></li>
                                                <li><a href="#">Advocated & Legal Consultants</a></li>
                                                <li><a href="#">Agricultural & Farm</a></li>
                                                <li><a href="#">Architecture & Architects</a></li>
                                                <li><a href="#">Audio & Video</a></li>
                                                <li><a href="#">Banks & Banking Services</a></li>
                                                <li><a href="#">Bags & Leather Goods</a></li>
                                                <li><a href="#">Boilers & Boiler Parts</a></li>
                                                <li><a href="#">Consultants</a></li>
                                                <li><a href="#">Batteries & Charge Storage Devices</a></li>
                                                <li><a href="#">Banners, Signs & Nameplates</a></li>
                                                <li><a href="#">Construction Materials</a></li>
                                                <li><a href="#">Business Services</a></li>
                                                <li><a href="#">Canopies & Sheds</a></li>
                                                <li><a href="#">Audio & Video</a></li>
                                                <li><a href="#">Cargo & Shipping</a></li>
                                                <li><a href="#">Chemical & Chemical Products</a></li>
                                                <li><a href="#">Glass & Fiberglass</a></li>
                                                <li><a href="#">Contracting Companies</a></li>
                                                <li><a href="#">Doors Windows & Shutters</a></li>
                                                <li><a href="#">Electrical & Electronics</a></li>
                                                <li><a href="#">Engineering & Mechanicals</a></li>
                                                <li><a href="#">Filters & Filtration Systems</a></li>
                                                <li><a href="#">Fire Fighting & Prevention</a></li>
                                                <li><a href="#">Fitness Clubs & Beauty Parlours</a></li>
                                           </ul>
                                        </div>
                                    </div>
                                    
                                    </div>
                                
                                <div class="col-md-4">
                                    <div class="airconditioning">
                                        <h1>(Airconditioning & Refrigeration)</h1>
                                        <ul class="right-categories-list">
                                            <li class="active"><a href="#">AC Contractors & AC Rentals</a></li>
                                            <li><a href="#">AC Equipment & AC System Repairs</a></li>
                                            <li><a href="#">AC Manufacturers</a></li>
                                            <li><a href="#">AC Parts & AC Tools</a></li>
                                            <li class="active"><a href="#">Air Cleaning & Air Purifying Systems</a></li>
                                            <li><a href="#">Cold Storage Accessories & Cold Storage Equipment</a></li>
                                            <li class="active"><a href="#">Dehumidifying Equipment Suppliers</a></li>
                                            <li><a href="#">District Cooling & Heating System</a></li>
                                            <li><a href="#">Duct Manufacturers, Duct Cleaners & Accessories</a></li>
                                            <li><a href="#">HVAC Contractors</a></li>
                                            <li><a href="#">HVAC Products & HVAC Accessories</a></li>
                                            <li><a href="#">Refrigeration Contractors & Refrigeration Equipment</a></li>
                                            
                                       </ul>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="d-flex justify-content-between justify-content-center">
                            <div class="form-group proceed-btn">
                                <input type="submit" value="Back" class="btn btn-third" onclick="window.location.href = 'company-info';">
                            </div>

                            <div class="form-group proceed-btn">
                                <input type="submit" value="Proceed" class="btn btn-secondary" onclick="window.location.href = 'declaration';">
                            </div>
                        </div>
                    </section>

                </section>
            </div>
        </section>
    </div>
    <!-- Business Category Section Ends -->

    <!-- Modal Starts-->
    <div class="modal fade" id="selected-categories" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLongTitle">Selected Categories</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="business-catg-main">
                        <ul class="d-flex flex-wrap">
                            <li class="d-flex justify-content-between justify-content-center heading">Airconditioning & Refrigeration</li>
                            <li class="d-flex justify-content-between justify-content-center">
                                AC Contractors & AC Rentals
                                <a href="#" class="categ-delete"></a>
                            </li>
                            <li class="d-flex justify-content-between justify-content-center">
                                AC Equipment & AC System Repairs
                                <a href="#" class="categ-delete"></a>
                            </li>
                            <li class="d-flex justify-content-between justify-content-center">
                                Air Cleaning & Air Purifying Systems
                                <a href="#" class="categ-delete"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-between justify-content-center">
                        <div class="form-group proceed-btn">
                            <button type="button" class="btn btn-third" data-dismiss="modal">Cancel</button>
                        </div>

                        <div class="form-group proceed-btn">
                            <input type="button" value="OK" class="btn btn-secondary">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Model Ends -->
@push('scripts')
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
@endpush  
@endsection