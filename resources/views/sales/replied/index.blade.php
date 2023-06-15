@extends('sales.layouts.app')
@section('content')
    <!-- Header Starts -->
    @include('sales.layouts.header')
    <!-- Header Ends -->

    <!-- Main Content Starts -->
    <section class="container-fluid pleft-56">
        <div class="row">
            <div class="col-md-3 pr-0 bid-tap">
                <div class="bid-inbox">
                    <div class="bid-header d-flex align-items-center">
                        <h1 class="mr-auto">Received</h1>
                        <a href="#" class="search-ico  float-right tablinks4"  onclick="openCity4(event, 'search')"></a>
                        <a href="#" class="filter-ico float-right tablinks4"  onclick="openCity4(event, 'filter')"></a>
                    </div>
                    <div id="search" class="tabcontent4" style="display: none;">
                    <div class="my-quotes-search d-flex align-items-center justify-content-between">
                        <div class="account-search-box-main">
                            <input type="text" placeholder="Search" class="form-control">
                        </div>
                    </div>
                    </div>

                    <div id="filter" class="tabcontent4" style="display: none;">
                        <div class="my-quotes-search d-flex align-items-center justify-content-left">
                            
                            <div class="custom-select" style="margin-left: 0;">
                                <select>
                                    <option value="0">Today</option>
                                    <option value="1">Today</option>
                                    <option value="2">Yesterday</option>
                                    <option value="3">Last week</option>
                                    <option value="4">Last month</option>
                                </select>
                            </div>
                        </div>
                        </div>

                        <div>
                            <div class="my-quotes-search d-flex align-items-center justify-content-end border-white-top">
                                
                                <div class="custom-select" style="margin-left: 0;">
                                    <select>
                                        <option value="0">Sort with Date</option>
                                        <option value="1">Today</option>
                                        <option value="2">Yesterday</option>
                                        <option value="3">Last week</option>
                                        <option value="4">Last month</option>
                                    </select>
                                </div>
                            </div>
                            </div>

                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="list-item-inner blue-border">
                                <h2 class="mb-2 round-bullet">Air Conditions & Service</h2>
                                <div class="d-flex w-100 justify-content-between">
                                    <h3>Dulsco Qatar WLL</h3>
                                    
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <div>
                                        <small class="bid-date">Posted: 25 February, 2023</small>
                                        <small class="bid-date">Expiry: 16 March, 2023</small>
                                    </div>
                                    <small class="bid-hours">2 Hours Left</small>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="list-item-inner yellow-border">
                                <h2 class="mb-2 round-bullet">Windows Aircondition</h2>
                                <div class="d-flex w-100 justify-content-between">
                                    <h3>Al Turki Trading WLL</h3>
                                    
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <div>
                                        <small class="bid-date">Posted: 25 February, 2023</small>
                                        <small class="bid-date">Expiry: 16 March, 2023</small>
                                    </div>
                                    <small class="bid-hours">15 Hours Left</small>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="list-item-inner yellow-border">
                                <h2 class="mb-2 bullet-light-blue">Desktop Computers</h2>
                                <div class="d-flex w-100 justify-content-between">
                                    <h3>Star Group WLL</h3>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <div>
                                        <small class="bid-date">Posted: 25 February, 2023</small>
                                        <small class="bid-date">Expiry: 16 March, 2023</small>
                                    </div>
                                    <small class="bid-hours2">3 Days Left</small>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="list-item-inner blue-border">
                                <h2 class="mb-2 bullet-light-blue">Rental</h2>
                                <div class="d-flex w-100 justify-content-between">
                                    <h3>Al Abab Trading & Contracting WLL</h3>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <div>
                                        <small class="bid-date">Posted: 25 February, 2023</small>
                                        <small class="bid-date">Expiry: 16 March, 2023</small>
                                    </div>
                                    <small class="bid-hours2">7 Days Left</small>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="list-item-inner yellow-border">
                                <h2 class="mb-2 bullet-light-blue">Aircondition</h2>
                                <div class="d-flex w-100 justify-content-between">
                                    <h3>Dialtech WLL</h3>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <div>
                                        <small class="bid-date">Posted: 25 February, 2023</small>
                                        <small class="bid-date">Expiry: 16 March, 2023</small>
                                    </div>
                                    <small class="bid-hours2">11 Days Left</small>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

            </div>

            <div class="col-md-6 pl-0 reply-msg-white-bg4" style="display: block;">
                <div class="bid-detail-head reply-msg-white-bg">
                        <div class="d-flex justify-content-between">
                            <h1>Deluxe Electronics LLC</h1>
                            <div class="d-flex date-status">
                                Thu 3/2/2023 4:21 PM
                            </div>
                         </div>

                    <div class="d-flex date-status justify-content-between mt-2">
                        <div class="d-flex">Date <h2>Date :2023-02-05 | Time: 02:37:31</h2></div>
                    </div>
                    
                </div>

                <div class="bid-detail-content reply-msg-white-bg3">
                    <p>Dear Sir,</p>
                    <p>
                        Request for Window AC with onsite installation on monthly rent is QAR 145/-
                        </p>
                        <p>attached more detailes about our service. .</p>


                    <p>Thanks and regards,</p>

                    <p class="mb-0">For Al Abab Trading &amp; Contracting WLL</p>
                    
                    <h3> Sales Department</h3>

                </div>


            <div class="bid-detail-content reply-msg-white-bg3 mt-2">
                
                <div class="d-flex justify-content-between">
                    <h3 class="mb-3">
                    Country :Qatar<br>
                    Region :Al-Shahaniya<br>
                    Reference No :G-M-D12398-36-2023
                    </h3>

                    <div>
                        <div class="d-flex date-status justify-content-end">
                            Expiry:<h2>2023-03-05</h2>
                        </div>

                        <div class="dropdown">
                            <button class="dropbtn">Report</button>
                        </div>
                        <span class="verified">Verified</span>
                    </div>

                </div>
                
                <div class="d-flex justify-content-end">
                    <a href="#" class="view-btn">View</a>
                </div>
                
            </div>


            </div>

            

            <div class="col-md-3 pl-0 questions-ask">
                <div class="last-sec-main">
                    <div class="last-sec-main-inner">

                        <div class="d-flex justify-content-between last-sec-header">
                            <h1>Questions Asked</h1>
                            <div class="form-group">
                                <input type="submit" value="Raise Question" data-toggle="modal" data-target="#raise-question" class="btn btn-third">
                            </div>
                        </div>

                        <div class="d-flex w-100 justify-content-between b-bottom">
                            <!-- Tabs navs -->
                            <ul class="nav nav-tabs tab mb-2" role="tablist2">
                                <li class="nav-item">

                                    <a class="nav-link tablinks2 active" onclick="openCity2(event, 'open')">All</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tablinks2" onclick="openCity2(event, 'closed')">My Questions</a>
                                </li>
                            </ul>
                            <!-- Tabs navs -->
                        </div>

                        <!-- Tabs 1-->

                        <div id="open" class="tabcontent2 scroll-q-asked" style="display: block;">
                            <div class="open-close-list">
                                <h1>Can AC series s used or it be standard
                                    ACXD, or both for durability and  quality?
                                </h1>
                                <h3>AL Ansari Trading & Contracting WLL</h3>
                                <small class="bid-date">24 February, 2023</small>
                            </div>

                            <div class="open-close-list">
                                <h1>Can AC series s used or it be standard
                                    ACXD, or both for durability and  quality?
                                </h1>
                                <h3>AL Ansari Trading & Contracting WLL</h3>
                                <small class="bid-date">24 February, 2023</small>
                            </div>

                        </div>

                        <!-- Tabs 2 -->
                        <div id="closed" class="tabcontent2 scroll-q-asked" style="display: none;">
                            <div class="open-close-list">
                                <h1>Can AC series s used or it be standard
                                    ACXD, or both for durability and quality?
                                </h1>
                                <small class="bid-date">24 February, 2023</small>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Main Content Ends -->
@endsection    