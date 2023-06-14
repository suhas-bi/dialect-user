@extends('procurement.layouts.app')
@section('content')
<header class="navbar">
        <div class="header-signup container-fluid navbar-default d-flex">
            <div class="container">
                <div class="logo">
                    <a href="{{ route('procurement.dashboard') }}"><img src="{{ asset('assets/images/logo-signup.png') }}" alt="XCHANGE"></a>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid reg-bg2">
    <!-- Main Content -->
    <section class="container">
            <div class="row registration">
                <h1>Generate Quote</h1>
                <section class="reg-content-main">
                    <div class="quote-navigation-main">
                        <ul class="d-flex align-items-center">
                            <li class="d-flex align-items-center active-first">
                                <small
                                    class="reg-nav-count-active d-flex align-items-center justify-content-center">1</small>
                                Add Business Category
                            </li>
                            <li class="d-flex align-items-center completion">
                                <small class="reg-nav-count d-flex align-items-center justify-content-center">2</small>
                                Generate Quote
                            </li>

                        </ul>

                    </div>

                    <section class="reg-content-sec">
                        <div class="signup-fields">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Please Choose Category"
                                                class="form-control choose-category">
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

                        <div class="d-flex justify-content-end">

                            <div class="form-group proceed-btn">
                                <input type="submit" value="Proceed" class="btn btn-secondary"
                                    onclick="window.location.href = 'generate-quote.html';">
                            </div>
                        </div>
                    </section>

                </section>
            </div>
        </section>
    <!-- End Main Content -->
</div>
@push('scripts')
    
@endpush
 
@endsection    