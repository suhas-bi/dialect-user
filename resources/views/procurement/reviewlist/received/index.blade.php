@extends('procurement.layouts.app')
@section('content')
    <!-- Header Starts -->
    @include('procurement.layouts.header')
    <!-- Header Ends -->


    <!-- Main Content -->
    <section class="container-fluid pleft-56">
        <div class="row">
            <div class="col-md-3 pr-0 bid-tap">
                <div class="bid-inbox">
                    <div class="review-list-header d-flex align-items-center">
                        <h1 class="mr-auto">Review List</h1>
                        <a href="#" class="search-ico float-right"></a>
                        <a href="#" class="filter-ico float-right"></a>
                    </div>

                    <div class="d-flex w-100 justify-content-between b-bottom">
                        <!-- Tabs navs -->
                        <ul class="nav nav-tabs tab mb-2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link tablinks3" href="{{ route('procurement.reviewList.send') }}">Sent</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link tablinks3 active" href="{{ route('procurement.reviewList.received') }}">Received</a>
                            </li>
                        </ul>
                        <!-- Tabs navs -->
                    </div>

                    <div class="tabcontent3" id="sent" style="display: block;">
                        <div class="list-group ">

                            <a href="#"
                                class="list-group-item list-group-item-action flex-column align-items-start active">
                                <div class="list-item-inner blue-border">
                                    <div class="d-flex justify-content-between">
                                        <h2 class="mb-2 round-bullet d-flex">238459-39-2023 <i class="flag-ico"></i>
                                        </h2>
                                        <div class="square-alert-main d-flex align-items-center position-relative">
                                            <small class="alert-count2"></small>
                                            <span href="#" class="square-alert-btn">2</span>
                                        </div>

                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <h3>Windows Aircondition on rental basis...</h3>
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <small class="bid-date">25 October, 2022</small>
                                        <small
                                            class="bid-count d-flex align-items-center justify-content-center">5</small>
                                    </div>
                                </div>
                            </a>

                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                                <div class="list-item-inner blue-border">
                                    <div class="d-flex justify-content-between">
                                        <h2 class="mb-2  bullet-light-blue d-flex">238459-39-2023 </h2>
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <h3>Windows Aircondition on rental basis...</h3>
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <small class="bid-date">25 October, 2022</small>
                                        <small
                                            class="bid-count d-flex align-items-center justify-content-center">6</small>
                                    </div>
                                </div>
                            </a>

                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                                <div class="list-item-inner blue-border">
                                    <div class="d-flex justify-content-between">
                                        <h2 class="mb-2  bullet-light-blue d-flex">238459-39-2023 </h2>
                                     
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <h3>Windows Aircondition on rental basis...</h3>
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <small class="bid-date">25 October, 2022</small>
                                        <small
                                            class="bid-count d-flex align-items-center justify-content-center">7</small>
                                    </div>
                                </div>
                            </a>

                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                                <div class="list-item-inner blue-border">
                                    <div class="d-flex justify-content-between">
                                        <h2 class="mb-2  bullet-light-blue d-flex">238459-39-2023 </h2>
                                       
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <h3>Windows Aircondition on rental basis...</h3>
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <small class="bid-date">25 October, 2022</small>
                                        <small
                                            class="bid-count d-flex align-items-center justify-content-center">2</small>
                                    </div>
                                </div>
                            </a>

                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                                <div class="list-item-inner blue-border">
                                    <div class="d-flex justify-content-between">
                                        <h2 class="mb-2  bullet-light-blue d-flex">238459-39-2023 </h2>
                                       
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <h3>Windows Aircondition on rental basis...</h3>
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <small class="bid-date">25 October, 2022</small>
                                        <small
                                            class="bid-count d-flex align-items-center justify-content-center">2</small>
                                    </div>
                                </div>
                            </a>


                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                                <div class="list-item-inner blue-border">
                                    <div class="d-flex justify-content-between">
                                        <h2 class="mb-2  bullet-light-blue d-flex">238459-39-2023 </h2>
                                        
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <h3>Windows Aircondition on rental basis...</h3>
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <small class="bid-date">25 October, 2022</small>
                                        <small
                                            class="bid-count d-flex align-items-center justify-content-center">2</small>
                                    </div>
                                </div>
                            </a>

                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                                <div class="list-item-inner blue-border">
                                    <div class="d-flex justify-content-between">
                                        <h2 class="mb-2  bullet-light-blue d-flex">238459-39-2023 </h2>
                                        
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <h3>Windows Aircondition on rental basis...</h3>
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <small class="bid-date">25 October, 2022</small>
                                        <small
                                            class="bid-count d-flex align-items-center justify-content-center">2</small>
                                    </div>
                                </div>
                            </a>


                        </div>
                    </div>

                    <div class="tabcontent3" id="received" style="display: none;">
                        <div class="list-group">


                            <a href="#"
                                class="list-group-item list-group-item-action flex-column align-items-start active">
                                <div class="list-item-inner yellow-border">
                                    <div class="d-flex justify-content-between">
                                        <h2 class="mb-2 round-bullet d-flex">G-238459-39-2023 <i class="flag-ico"></i>
                                        </h2>
                                                  
                                        <div id="mark-drop">
                                            <button class="dots-ico2"></button>
                                            <ul class="drop">
                                                <li onclick="window.location.href = 'javascript:;'">Mark as Complete</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <h3>Windows Aircondition on rental basis...</h3>
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <small class="bid-date">25 October, 2022</small>
                                        <small
                                            class="bid-count d-flex align-items-center justify-content-center">5</small>
                                    </div>
                                </div>
                            </a>

                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                                <div class="list-item-inner yellow-border">
                                    <div class="d-flex justify-content-between">
                                        <h2 class="mb-2  bullet-light-blue d-flex">G-238459-39-2023 </h2>
                                                  
                                        <div id="mark-drop">
                                            <button class="dots-ico2"></button>
                                            <ul class="drop">
                                                <li onclick="window.location.href = 'javascript:;'">Mark as Complete</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <h3>Windows Aircondition on rental basis...</h3>
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <small class="bid-date">25 October, 2022</small>
                                        <small
                                            class="bid-count d-flex align-items-center justify-content-center">6</small>
                                    </div>
                                </div>
                            </a>

                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                                <div class="list-item-inner yellow-border">
                                    <div class="d-flex justify-content-between">
                                        <h2 class="mb-2  bullet-light-blue d-flex">G-238459-39-2023 </h2>
                                                  
                                        <div id="mark-drop">
                                            <button class="dots-ico2"></button>
                                            <ul class="drop">
                                                <li onclick="window.location.href = 'javascript:;'">Mark as Complete</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <h3>Windows Aircondition on rental basis...</h3>
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <small class="bid-date">25 October, 2022</small>
                                        <small
                                            class="bid-count d-flex align-items-center justify-content-center">6</small>
                                    </div>
                                </div>
                            </a>

                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                                <div class="list-item-inner yellow-border">
                                    <div class="d-flex justify-content-between">
                                        <h2 class="mb-2  bullet-light-blue d-flex">G-238459-39-2023 </h2>
                                                  
                                        <div id="mark-drop">
                                            <button class="dots-ico2"></button>
                                            <ul class="drop">
                                                <li onclick="window.location.href = 'javascript:;'">Mark as Complete</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <h3>Windows Aircondition on rental basis...</h3>
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <small class="bid-date">25 October, 2022</small>
                                        <small
                                            class="bid-count d-flex align-items-center justify-content-center">6</small>
                                    </div>
                                </div>
                            </a>

                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                                <div class="list-item-inner yellow-border">
                                    <div class="d-flex justify-content-between">
                                        <h2 class="mb-2  bullet-light-blue d-flex">G-238459-39-2023 </h2>
                                                  
                                        <div id="mark-drop">
                                            <button class="dots-ico2"></button>
                                            <ul class="drop">
                                                <li onclick="window.location.href = 'javascript:;'">Mark as Complete</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <h3>Windows Aircondition on rental basis...</h3>
                                    </div>
                                    <div class="d-flex w-100 justify-content-between">
                                        <small class="bid-date">25 October, 2022</small>
                                        <small
                                            class="bid-count d-flex align-items-center justify-content-center">6</small>
                                    </div>
                                </div>
                            </a>




                        </div>
                    </div>


                </div>

            </div>

            <div class="col-md-6 pl-0 pr-0 scnd-section-main">
                <div class="mid-sec-main">
                    <div class="mid-sec-header d-flex justify-content-between  justify-content-center">
                        <div class="first-sec d-flex align-items-center">
                            <div class="completed-screening d-flex align-items-center">
                                <small>Completed<br>Screening</small>
                                <h1><span class="green">12</span><span class="grey">/</span>16</h1>
                            </div>
                            <div class="completed-screening d-flex align-items-center">
                                <a href="#" class="share-with" data-toggle="modal" data-target="#share-popup">
                                    Shared with<br>
                                    <span class="name">Muhammed.S...</span>
                                </a>
                            </div>
                        </div>
                        <div class="scond-sec d-flex align-items-center">

                            
                            
                            <div class="completed-screening d-flex align-items-center position-relative">
                                <small class="alert-count d-flex align-items-center justify-content-center">3</small>

                                <a href="#" class="alert-btn"></a>
                                <div id="mark-drop3">
                                <a href="#" class="dummy-btn d-flex"></a>
                                    <ul class="drop-notf">
                                        <li onclick="window.location.href = 'javascript:;'">
                                            New Bid request from Al Abab...
                                            <span class="time">5 minutes ago</span>
                                        </li>
                                        <li onclick="window.location.href = 'javascript:;'">
                                            New Bid request from Dulsco Q...
                                            <span class="time">15 minutes ago</span>
                                        </li>
                                    </ul>
                                </div>
                                
                            </div>

                            <div class="d-flex align-items-center position-relative">
                                <a href="#" class="more-dots"></a>
                            </div>
                        </div>
                    </div>

                    <div class="mid-second-sec">
                        <div class="d-flex w-100 justify-content-between">
                            <h2>Windows Air Condition on rental basis...</h2>
                            <small class="created-date"><span>Created on:</span><br>25 January, 2023</small>
                            <a href="#" class="question-asked">Questions Asked</a>
                        </div>
                        <h3>Quote For: Al Nazer Mohammed, Admin IHRDS </h3>
                        <div class="position-relative msg-expand-main" id="msg-expand">
                            <p>Looking forward for installing 20 Air Conditioners in the 4th floor of our building, the lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                            <span>Al Nazer Mohammed</span> <br>
                            <span>Admin, IHRDS</span>
                            <a href="#" class="read-more">Read More</a>
                            <a href="#" class="read-less">Read Less</a>
                        </div>
                    </div>

                    <div class="mid-third-sec">
                        <div class="d-flex w-100 justify-content-between b-bottom">
                            <!-- Tabs navs -->
                            <ul class="nav nav-tabs tab mb-2" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link tablinks active" onclick="openCity(event, 'all-bids')">All
                                        Bids</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tablinks"
                                        onclick="openCity(event, 'shortlisted')">Shortlisted</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link tablinks" onclick="openCity(event, 'selected')">Selected</a>
                                </li>
                            </ul>
                            <!-- Tabs navs -->

                        </div>

                        <!-- Tabs 1-->

                        <div id="all-bids" class="tabcontent" style="display: block;">

                            <div class="row bid-list-head d-flex align-items-center justify-content-center">
                                <div class="col-md-6"><a href="#"> Company Name <i class="ic_sort"><img
                                                src="images/ic_sort.svg"></i></a></div>
                                <div class="col-md-3 d-flex align-items-center justify-content-center"><a href="#">Date
                                        <i class="ic_sort"><img src="images/ic_sort.svg"></i></a></div>
                                <div class="col-md-3 d-flex align-items-center justify-content-center"><a
                                        href="#">Review Status <i class="ic_sort"><img src="images/ic_sort.svg"></i></a>
                                </div>
                            </div>
                            <ul class="all-bid-ul">
                                <li>
                                    <div class="row all-bid-list d-flex align-items-center justify-content-center">
                                        <div class="col-md-6">
                                            <a href="#" class="bid-detail"> Al Abab Trading & Contracting WLL</a>
                                            <p>Quotation for 15 Nos. Window ACs with
                                                onsite installation. Also the warranty...</p>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="date">27 Jan, 2022</span></div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="status-yellow">Pending Review</span></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row all-bid-list d-flex align-items-center justify-content-center">
                                        <div class="col-md-6 pl-5">
                                            <a href="#"> Dulsco Qatar WLL</a>
                                            <p>Quotation for 15 Nos. Window ACs with
                                                onsite installation. Also the warranty...</p>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="date">27 Jan, 2022</span></div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="status-green">Shortlisted</span></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row all-bid-list d-flex align-items-center justify-content-center">
                                        <div class="col-md-6 pl-5">
                                            <a href="#"> Al Turki Trading WLL</a>
                                            <p>Quotation for 15 Nos. Window ACs with
                                                onsite installation. Also the warranty...</p>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="date">27 Jan, 2022</span></div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="status-red">Hold</span></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row all-bid-list d-flex align-items-center justify-content-center">
                                        <div class="col-md-6">
                                            <a href="#"> AL Ansari Trading & Contracting WLL</a>
                                            <p>Quotation for 15 Nos. Window ACs with
                                                onsite installation. Also the warranty...</p>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="date">27 Jan, 2022</span></div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="status-yellow">Pending Review</span></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row all-bid-list d-flex align-items-center justify-content-center">
                                        <div class="col-md-6 pl-5">
                                            <a href="#"> Star Group WLL</a>
                                            <p>Quotation for 15 Nos. Window ACs with
                                                onsite installation. Also the warranty...</p>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="date">27 Jan, 2022</span></div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="status-green">Shortlisted</span></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row all-bid-list d-flex align-items-center justify-content-center">
                                        <div class="col-md-6 pl-5">
                                            <a href="#">Dialtech WLL</a>
                                            <p>Quotation for 15 Nos. Window ACs with
                                                onsite installation. Also the warranty...</p>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="date">27 Jan, 2022</span></div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="status-red">Hold</span></div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row all-bid-list d-flex align-items-center justify-content-center">
                                        <div class="col-md-6">
                                            <a href="#"> Al Arab Trading Co WLL</a>
                                            <p>Quotation for 15 Nos. Window ACs with
                                                onsite installation. Also the warranty...</p>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="date">27 Jan, 2022</span></div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="status-yellow">Pending Review</span></div>
                                    </div>
                                </li>

                                <li>
                                    <div class="row all-bid-list d-flex align-items-center justify-content-center">
                                        <div class="col-md-6">
                                            <a href="#"> Al Arab Trading Co WLL</a>
                                            <p>Quotation for 15 Nos. Window ACs with
                                                onsite installation. Also the warranty...</p>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="date">27 Jan, 2022</span></div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="status-yellow">Pending Review</span></div>
                                    </div>
                                </li>


                                <li>
                                    <div class="row all-bid-list d-flex align-items-center justify-content-center">
                                        <div class="col-md-6">
                                            <a href="#"> Al Arab Trading Co WLL</a>
                                            <p>Quotation for 15 Nos. Window ACs with
                                                onsite installation. Also the warranty...</p>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="date">27 Jan, 2022</span></div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="status-yellow">Pending Review</span></div>
                                    </div>
                                </li>


                                <li>
                                    <div class="row all-bid-list d-flex align-items-center justify-content-center">
                                        <div class="col-md-6">
                                            <a href="#"> Al Arab Trading Co WLL</a>
                                            <p>Quotation for 15 Nos. Window ACs with
                                                onsite installation. Also the warranty...</p>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="date">27 Jan, 2022</span></div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="status-yellow">Pending Review</span></div>
                                    </div>
                                </li>

                            </ul>


                        </div>

                        <!-- Tabs 2 -->
                        <div id="shortlisted" class="tabcontent">
                            <div class="row bid-list-head d-flex align-items-center justify-content-center">
                                <div class="col-md-6"><a href="#"> Company Name <i class="ic_sort"><img
                                                src="images/ic_sort.svg"></i></a></div>
                                <div class="col-md-3 d-flex align-items-center justify-content-center"><a href="#">Date
                                        <i class="ic_sort"><img src="images/ic_sort.svg"></i></a></div>
                                <div class="col-md-3 d-flex align-items-center justify-content-center"><a
                                        href="#">Review Status <i class="ic_sort"><img src="images/ic_sort.svg"></i></a>
                                </div>
                            </div>

                            <ul class="all-bid-ul">
                                <li>
                                    <div class="row all-bid-list d-flex align-items-center justify-content-center">
                                        <div class="col-md-6">
                                            <a href="#"> Al Abab Trading & Contracting WLL</a>
                                            <p>Quotation for 15 Nos. Window ACs with
                                                onsite installation. Also the warranty...</p>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="date">27 Jan, 2022</span></div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center">
                                            <span class="status-yellow">Pending Review</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row all-bid-list d-flex align-items-center justify-content-center">
                                        <div class="col-md-6 pl-5">
                                            <a href="#"> Dulsco Qatar WLL</a>
                                            <p>Quotation for 15 Nos. Window ACs with
                                                onsite installation. Also the warranty...</p>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="date">27 Jan, 2022</span></div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="status-green">Shortlisted</span></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row all-bid-list d-flex align-items-center justify-content-center">
                                        <div class="col-md-6 pl-5">
                                            <a href="#"> Al Turki Trading WLL</a>
                                            <p>Quotation for 15 Nos. Window ACs with
                                                onsite installation. Also the warranty...</p>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="date">27 Jan, 2022</span></div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center">
                                            <span class="status-yellow">Pending Review</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>


                        <!-- Tabs 3 -->
                        <div id="selected" class="tabcontent">
                            <div class="row bid-list-head d-flex align-items-center justify-content-center">
                                <div class="col-md-6"><a href="#"> Company Name <i class="ic_sort"><img
                                                src="images/ic_sort.svg"></i></a></div>
                                <div class="col-md-3 d-flex align-items-center justify-content-center"><a href="#">Date
                                        <i class="ic_sort"><img src="images/ic_sort.svg"></i></a></div>
                                <div class="col-md-3 d-flex align-items-center justify-content-center"><a
                                        href="#">Review Status <i class="ic_sort"><img src="images/ic_sort.svg"></i></a>
                                </div>
                            </div>

                            <ul class="all-bid-ul">
                                <li>
                                    <div class="row all-bid-list d-flex align-items-center justify-content-center">
                                        <div class="col-md-6">
                                            <a href="#"> Al Abab Trading & Contracting WLL</a>
                                            <p>Quotation for 15 Nos. Window ACs with
                                                onsite installation. Also the warranty...</p>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="date">27 Jan, 2022</span></div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center">
                                            <span class="status-yellow">Pending Review</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row all-bid-list d-flex align-items-center justify-content-center">
                                        <div class="col-md-6 pl-5">
                                            <a href="#"> Dulsco Qatar WLL</a>
                                            <p>Quotation for 15 Nos. Window ACs with
                                                onsite installation. Also the warranty...</p>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="date">27 Jan, 2022</span></div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="status-green">Shortlisted</span></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row all-bid-list d-flex align-items-center justify-content-center">
                                        <div class="col-md-6 pl-5">
                                            <a href="#"> Al Turki Trading WLL</a>
                                            <p>Quotation for 15 Nos. Window ACs with
                                                onsite installation. Also the warranty...</p>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="date">27 Jan, 2022</span></div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center">
                                            <span class="status-yellow">Pending Review</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row all-bid-list d-flex align-items-center justify-content-center">
                                        <div class="col-md-6">
                                            <a href="#"> Al Abab Trading & Contracting WLL</a>
                                            <p>Quotation for 15 Nos. Window ACs with
                                                onsite installation. Also the warranty...</p>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="date">27 Jan, 2022</span></div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center">
                                            <span class="status-yellow">Pending Review</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row all-bid-list d-flex align-items-center justify-content-center">
                                        <div class="col-md-6 pl-5">
                                            <a href="#"> Dulsco Qatar WLL</a>
                                            <p>Quotation for 15 Nos. Window ACs with
                                                onsite installation. Also the warranty...</p>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="date">27 Jan, 2022</span></div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="status-green">Shortlisted</span></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row all-bid-list d-flex align-items-center justify-content-center">
                                        <div class="col-md-6 pl-5">
                                            <a href="#"> Al Turki Trading WLL</a>
                                            <p>Quotation for 15 Nos. Window ACs with
                                                onsite installation. Also the warranty...</p>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="date">27 Jan, 2022</span></div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center">
                                            <span class="status-yellow">Pending Review</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>

                    </div>

                </div>
            </div>

            <div class="col-md-6 pl-0 bid-open">
                <div class="bid-detail-head">
                    <div class="d-flex">
                        <h1>Al Abab Trading & Contracting WLL</h1>
                        <span class="verified">Verified</span>
                    </div>
                    <div class="d-flex date-status">
                        Date <h2>25 October, 2022</h2> <span class="status">Pending Review</span>
                    </div>
                    <div class="d-flex mt-3 justify-content-between">
                        <div class="add-hold-btn d-flex">
                            <a href="#" class="add-shortlist">Add to Shortlist</a>
                            <a href="#" class="hold-btn" data-toggle="modal" data-target="#hold-popup">Hold</a>
                            <a href="#" class="tooltip-msg">
                                <span class="tooltiptext">
                                    <span class="tooltip-arrow"></span>
                                    Please look in to this proposal.
                                </span>
                            </a>
                            <div class="dropdown">
                                <button class="dropbtn">Report</button>
                            </div>
                        </div>
                        <a href="#" class="question-asked">Questions Asked</a>


                    </div>
                    <a href="#" class="cross-second"></a>
                </div>

                <div class="bid-detail-content">
                    <p>Dear Sir,</p>

                    <p>Pleased to inform our rate for one Window AC with onsite installation on monthly rent is QAR
                        145/-</p>

                    <p>attached more detailes about our service. .</p>

                    <p>Thanks and regards,</p>

                    <p>For Al Abab Trading & Contracting WLL<br>
                        Sales Department</p>

                    <h1 class="mt-2">Attachments</h1>
                    <div class="d-flex flex-column align-items-left float-start">
                        <a href="#" class="attachmets-list">Proposal - Quotation-AC...XV.PDF</a>
                        <a href="#" class="attachmets-list">Proposal - Quotation-AC-Dummy...XV.PDF</a>
                        <a href="#" class="attachmets-list">Proposal - Quotation-AC...XV.PDF</a>
                    </div>

                </div>
            </div>

            <div class="col-md-3 pl-0 questions-ask">
                <div class="last-sec-main">
                    <div class="last-sec-main-inner">

                        <div class="d-flex justify-content-between last-sec-header">
                            <h1>Questions Asked</h1>
                            <a href="#" class="cross"></a>
                        </div>

                        <div class="d-flex w-100 justify-content-between b-bottom">
                            <!-- Tabs navs -->
                            <ul class="nav nav-tabs tab mb-2" role="tablist2">
                                <li class="nav-item">

                                    <a class="nav-link tablinks2 active" onclick="openCity2(event, 'open')">Open</a>
                                    <small
                                        class="tab-notf-count d-flex align-items-center justify-content-center">2</small>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tablinks2" onclick="openCity2(event, 'closed')">Closed</a>
                                    <small
                                        class="tab-notf-count d-flex align-items-center justify-content-center">2</small>
                                </li>
                            </ul>
                            <!-- Tabs navs -->
                        </div>

                        <!-- Tabs 1-->

                        <div id="open" class="tabcontent2 scroll-q-asked" style="display: block;">
                            <div class="open-close-list">
                                <h1>Can AC series s used or it be standard
                                    ACXD, or both for durability and quality?
                                </h1>
                                <small class="bid-date">24 February, 2023</small>

                                <div class="d-flex w-100 justify-content-between">
                                    <div class="respo-skip-btn">
                                        <a href="#" class="respond">Respond</a>
                                        <a href="#" class="skip">Skiped</a>
                                    </div>
                                    <div class="dropdown">
                                        <button onclick="myFunction()" class="dropbtn">Report</button>
                                        <div id="myDropdown" class="dropdown-content">
                                            <a href="#">Spam</a>
                                            <a href="#">Illegal activity</a>
                                            <a href="#">Advertisement</a>
                                            <a href="#">Cyberbullying</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="open-close-list">
                                <h1>Can AC series s used or it be standard
                                    ACXD, or both for durability and quality?
                                </h1>
                                <small class="bid-date">24 February, 2023</small>

                                <div class="d-flex w-100 justify-content-between">
                                    <div class="respo-skip-btn">
                                        <span class="skiped-status">Skiped</span>
                                    </div>
                                    <div class="dropdown">
                                        <button onclick="myFunction()" class="dropbtn">Report</button>
                                        <div id="myDropdown" class="dropdown-content">
                                            <a href="#">Spam</a>
                                            <a href="#">Illegal activity</a>
                                            <a href="#">Advertisement</a>
                                            <a href="#">Cyberbullying</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="open-close-list">
                                <h1>Can AC series s used or it be standard
                                    ACXD, or both for durability and quality?
                                </h1>
                                <small class="bid-date">24 February, 2023</small>

                                <div class="d-flex w-100 justify-content-between">
                                    <div class="respo-skip-btn">
                                        <span class="skiped-status">Skiped</span>
                                    </div>
                                    <div class="dropdown">
                                        <button onclick="myFunction()" class="dropbtn">Report</button>
                                        <div id="myDropdown" class="dropdown-content">
                                            <a href="#">Spam</a>
                                            <a href="#">Illegal activity</a>
                                            <a href="#">Advertisement</a>
                                            <a href="#">Cyberbullying</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="open-close-list">
                                <h1>Can AC series s used or it be standard
                                    ACXD, or both for durability and quality?
                                </h1>
                                <small class="bid-date">24 February, 2023</small>

                                <div class="d-flex w-100 justify-content-between">
                                    <div class="respo-skip-btn">
                                        <span class="skiped-status">Skiped</span>
                                    </div>
                                    <div class="dropdown">
                                        <button onclick="myFunction()" class="dropbtn">Report</button>
                                        <div id="myDropdown" class="dropdown-content">
                                            <a href="#">Spam</a>
                                            <a href="#">Illegal activity</a>
                                            <a href="#">Advertisement</a>
                                            <a href="#">Cyberbullying</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="open-close-list">
                                <h1>Can AC series s used or it be standard
                                    ACXD, or both for durability and quality?
                                </h1>
                                <small class="bid-date">24 February, 2023</small>

                                <div class="d-flex w-100 justify-content-between">
                                    <div class="respo-skip-btn">
                                        <span class="skiped-status">Skiped</span>
                                    </div>
                                    <div class="dropdown">
                                        <button onclick="myFunction()" class="dropbtn">Report</button>
                                        <div id="myDropdown" class="dropdown-content">
                                            <a href="#">Spam</a>
                                            <a href="#">Illegal activity</a>
                                            <a href="#">Advertisement</a>
                                            <a href="#">Cyberbullying</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="open-close-list">
                                <h1>Can AC series s used or it be standard
                                    ACXD, or both for durability and quality?
                                </h1>
                                <small class="bid-date">24 February, 2023</small>

                                <div class="d-flex w-100 justify-content-between">
                                    <div class="respo-skip-btn">
                                        <span class="skiped-status">Skiped</span>
                                    </div>
                                    <div class="dropdown">
                                        <button onclick="myFunction()" class="dropbtn">Report</button>
                                        <div id="myDropdown" class="dropdown-content">
                                            <a href="#">Spam</a>
                                            <a href="#">Illegal activity</a>
                                            <a href="#">Advertisement</a>
                                            <a href="#">Cyberbullying</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="open-close-list">
                                <h1>Can AC series s used or it be standard
                                    ACXD, or both for durability and quality?
                                </h1>
                                <small class="bid-date">24 February, 2023</small>

                                <div class="d-flex w-100 justify-content-between">
                                    <div class="respo-skip-btn">
                                        <span class="skiped-status">Skiped</span>
                                    </div>
                                    <div class="dropdown">
                                        <button onclick="myFunction()" class="dropbtn">Report</button>
                                        <div id="myDropdown" class="dropdown-content">
                                            <a href="#">Spam</a>
                                            <a href="#">Illegal activity</a>
                                            <a href="#">Advertisement</a>
                                            <a href="#">Cyberbullying</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="open-close-list">
                                <h1>Can AC series s used or it be standard
                                    ACXD, or both for durability and quality?
                                </h1>
                                <small class="bid-date">24 February, 2023</small>

                                <div class="d-flex w-100 justify-content-between">
                                    <div class="respo-skip-btn">
                                        <span class="skiped-status">Skiped</span>
                                    </div>
                                    <div class="dropdown">
                                        <button onclick="myFunction()" class="dropbtn">Report</button>
                                        <div id="myDropdown" class="dropdown-content">
                                            <a href="#">Spam</a>
                                            <a href="#">Illegal activity</a>
                                            <a href="#">Advertisement</a>
                                            <a href="#">Cyberbullying</a>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <!-- Tabs 2 -->
                        <div id="closed" class="tabcontent2" style="display: none;">
                            <div class="open-close-list">
                                <h1>Can AC series s used or it be standard
                                    ACXD, or both for durability and quality?
                                </h1>
                                <small class="bid-date">24 February, 2023</small>
                                <div class="colsed-description">
                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                    tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero
                                    eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
                                    takimata sanctus est Lorem ipsum dolor sit

                                    <span>You Answered on 20/02/2023</span>
                                </div>
                                <a href="#" class="respond">Edit Response</a>
                            </div>


                            <div class="open-close-list">
                                <h1>Can AC series s used or it be standard
                                    ACXD, or both for durability and quality?
                                </h1>
                                <small class="bid-date">24 February, 2023</small>
                                <div class="colsed-description">
                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                    tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                    <span>You Answered on 20/02/2023</span>
                                </div>
                                <a href="#" class="respond">Edit Response</a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Main Content -->
@push('scripts')
    
@endpush
 
@endsection    