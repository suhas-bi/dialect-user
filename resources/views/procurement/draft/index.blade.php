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
                        <h1 class="mr-auto">Draft</h1>
                    </div>

                    <div class="draft-list-group">

                        <a href="#"
                            class="list-group-item2 list-group-item-action flex-column align-items-start active">
                            <div class="list-item-inner">
                                <div class="d-flex w-100 justify-content-between">
                                    <h3>Windows Aircondition on rental basis...</h3>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <small class="bid-date2">25 October, 2022</small>
                                </div>
                            </div>
                        </a>


                        <a href="#" class="list-group-item2 list-group-item-action flex-column align-items-start">
                            <div class="list-item-inner">
                                <div class="d-flex w-100 justify-content-between">
                                    <h3>Windows Aircondition on rental basis...</h3>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <small class="bid-date2">25 October, 2022</small>
                                </div>
                            </div>
                        </a>


                        <a href="#" class="list-group-item2 list-group-item-action flex-column align-items-start ">
                            <div class="list-item-inner">
                                <div class="d-flex w-100 justify-content-between">
                                    <h3>Windows Aircondition on rental basis...</h3>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <small class="bid-date2">25 October, 2022</small>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="list-group-item2 list-group-item-action flex-column align-items-start ">
                            <div class="list-item-inner">
                                <div class="d-flex w-100 justify-content-between">
                                    <h3>Windows Aircondition on rental basis...</h3>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <small class="bid-date2">25 October, 2022</small>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="list-group-item2 list-group-item-action flex-column align-items-start ">
                            <div class="list-item-inner">
                                <div class="d-flex w-100 justify-content-between">
                                    <h3>Windows Aircondition on rental basis...</h3>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <small class="bid-date2">25 October, 2022</small>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="list-group-item2 list-group-item-action flex-column align-items-start ">
                            <div class="list-item-inner">
                                <div class="d-flex w-100 justify-content-between">
                                    <h3>Windows Aircondition on rental basis...</h3>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <small class="bid-date2">25 October, 2022</small>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="list-group-item2 list-group-item-action flex-column align-items-start ">
                            <div class="list-item-inner">
                                <div class="d-flex w-100 justify-content-between">
                                    <h3>Windows Aircondition on rental basis...</h3>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <small class="bid-date2">25 October, 2022</small>
                                </div>
                            </div>
                        </a>

                    </div>

                </div>

            </div>

            <div class="col-md-9 pl-0 pr-0 scnd-section-main">
                <div class="mid-sec-main">
                    <div class="mid-second-sec d-flex justify-content-between bg-white">
                        <div class="">
                            <div class="w-100">
                                <h2>Windows Air Condition on rental basis...</h2>
                                <small class="created-date"><span>Created on: </span>25 January, 2023</small>
                                <small class="created-date ms-4"><span>Bids accepted till: </span>25 January,
                                    2023</small>
                            </div>

                            <div class="d-flex mt-2">
                                <h3>Quote For: Al Nazer Mohammed, Admin IHRDS </h3>
                                <a href="#" class="change-btn">Change</a>
                            </div>

                        </div>

                        <div class="d-flex mt-4">
                            <div class="form-group proceed-btn">
                                <input type="submit" value="Discard" class="btn btn-third"
                                    onclick="window.location.href = '';">
                            </div>

                            <div class="form-group proceed-btn">
                                <input type="submit" value="Proceed" class="btn btn-secondary"
                                    onclick="window.location.href = '';">
                            </div>
                        </div>

                    </div>

                    <div class="bid-detail-content">
                        <p>Dear Sir,</p>

                        <p>Request for Window AC with onsite installation on monthly rent is QAR 145/-</p>

                        <p>attached more detailes about our service. .</p>

                        <p>Thanks and regards,</p>

                        <p>For Dulsco Qatar WLL<br>
                            Procurement Department</p>

                        <h1 class="mt-2">Attachments</h1>
                        <div class="d-flex flex-column align-items-left float-start">
                            <a href="#" class="attachmets-list">Proposal - Quotation-AC...XV.PDF</a>
                            <a href="#" class="attachmets-list">Proposal - Quotation-AC-Dummy...XV.PDF</a>
                            <a href="#" class="attachmets-list">Proposal - Quotation-AC...XV.PDF</a>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- Main Content Ends -->
@push('scripts')
    
@endpush
 
@endsection    