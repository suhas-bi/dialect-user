@extends('procurement.layouts.app')
@section('content')
    <!-- Header Starts -->
    @include('procurement.layouts.header')
    <!-- Header Ends -->


    <!-- Main Content Start -->

    <!-- Approval List Section Start-->
    <section class="container-fluid pleft-56">
        <div class="row team-accnt-tab  b-bottom">
            <div class="col-md-12">

                <div class="d-flex w-100 justify-content-between">
                    <!-- Tabs navs -->
                    <ul class="nav nav-tabs tab mb-2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link tablinks3  active" href="{{ route('procurement.teamAccount.approval') }}">Approvals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tablinks3" href="{{ route('procurement.teamAccount.settings') }}">Team Settings</a>
                        </li>
                    </ul>
                    <!-- Tabs navs -->
                </div>
            </div>
        </div>
    <!-- Approval List Section End -->

    <!-- Approval Content Section Start -->
    <div class="tabcontent3" id="sent" style="display: block;">
        <div class="row">
            <div class="col-md-3 pr-0 bid-tap">
                <div class="bid-inbox">
                    <div class="team-accnt-search d-flex align-items-center justify-content-between">
                        <div class="account-search-box-main">
                            <input type="text" placeholder="Search" class="form-control">
                        </div>
                        <a href="#" class="filter-ico2 float-right"></a>
                    </div>

                    <div class="list-group ">

                        <a href="#"
                            class="list-group-item list-group-item-action flex-column align-items-start active">
                            <div class="list-item-inner blue-border">
                                <div class="d-flex justify-content-between">
                                    <h2 class="mb-2 round-bullet d-flex">238459-39-2023 <i class="flag-ico"></i>
                                    </h2>
                                    <span href="#" class="dots-ico"></span>
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
                                    <span href="#" class="dots-ico"></span>
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
                                    <span href="#" class="dots-ico"></span>
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
                                    <span href="#" class="dots-ico"></span>
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
                                    <span href="#" class="dots-ico"></span>
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
                                    <span href="#" class="dots-ico"></span>
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
                                    <span href="#" class="dots-ico"></span>
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

            </div>

<!-- Approval Content Section End -->

</section>
<!-- Main Content Ends -->

@push('scripts')

@endpush
 
@endsection    