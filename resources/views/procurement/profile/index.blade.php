@extends('procurement.layouts.app')
@section('content')
    <!-- Header Starts -->
    @include('procurement.layouts.header')
    <!-- Header Ends -->


    <!-- Main Content -->
    <section class="container-fluid pleft-77">
        <div class="px-4 py-3">
                <h1>Profile Settings</h1>
                
            <div class="profile-stting-sec-main edit-fields-main">

                    <div class="row">

                        <div class="col-md-3 pr-0">
                            <div class="profile-stting-sec1">
                                <div class="d-flex align-items-center justify-content-end">
                                    <a href="#" class="team-edit"><img src="{{ asset('assets/images/team-edit-ico.svg') }}"></a>
                                </div>
                                <div class="d-flex">
                                    <div class="tumb-img d-flex align-items-center justify-content-center"><img src="{{ asset('assets/images/profile-pic-1.png') }}">
                                    </div>
                                    <div class="sale-prof-name">
                                        <h2>{{ $user->name }}</h2>
                                        <span>{{ $user->designation }}</span>
                                    </div>
                                </div>
                            
                                <div class="sale-prof-detail">
                                    <label>Email</label>
                                    {{ $user->email }}
                                </div>
                            
                                <div class="sale-prof-detail">
                                    <label>Phone</label>
                                    {{ $user->country_code }} {{ $user->mobile }}
                                </div>
                            
                                <div class="sale-prof-detail d-flex align-items-center justify-content-between">
                                    <div><label>Landline</label>
                                    {{ $user->country_code }} {{ $user->landline }}</div>
                            
                                    <div>
                                        <label>Extension</label>
                                        {{ $user->extension }}
                                    </div>
                                </div>
                            </div>

                            <div class="profile-stting-sec2">
                                <div class="d-flex mb-4">
                                    <h1>Company Info</h1>
                                </div>
                                <div class="d-flex">
                                    <div class="d-flex align-items-center justify-content-center"><img src="{{ asset($company->logo) }}" height="40">
                                    </div>
                                    <div class="company-prof-name">
                                        <span>{{ $company->name }}</span>
                                        <a href="#">{{ $company->domain }}</a>
                                    </div>
                                </div>

                                <div class="sale-prof-detail">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Address</label>
                                            {{ $company->address }}
                                        </div>
                                        <div class="col-md-3">
                                            <label>Zone</label>
                                            {{ $company->zone }}
                                        </div>
                                        <div class="col-md-3">
                                            <label>Street</label>
                                            {{ $company->street }}
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="sale-prof-detail">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Building</label>
                                            {{ $company->building }}
                                        </div>
                                        <div class="col-md-3">
                                            <label>Unit</label>
                                            {{ $company->unit }}
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            
                               
                            </div>

                        </div>


                        <div class="col-md-3  pl-0 pr-0">
                            <div class="profile-stting-sec1">
                                <div class="d-flex mb-2">
                                    <h1>Documents</h1>
                                </div> 
                                
                                <div class="sale-prof-detail">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <label>Document</label>
                                            {{ $company->document->document->name ?? '' }}
                                        </div>
                                        <div class="col-md-5">
                                            <label>Document No</label>
                                            {{ $company->document->doc_number ?? '' }}
                                        </div>
                                        
                                    </div>
                                    
                                </div>

                                <div class="sale-prof-detail">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <label>Expiry Date</label>
                                            {{ $company->document->expiry_date ?? '' }}
                                        </div>
                                        <div class="col-md-5">
                                            <label>Status</label>
                                            Active
                                        </div>
                                    </div>

                                    <a href="#" class="mt-4 d-flex">View Document</a>
                                    
                                </div>
                            </div>


                            <div class="profile-stting-sec3">
                                <div class="d-flex mb-2">
                                    <h1>Declaration</h1>
                                </div>
                                
                                <div class="sale-prof-detail">
                                    <a href="#" class="mt-4 d-flex">View Document</a>
                                </div>
                            
                            </div>

                            <div class="profile-stting-sec3">
                                <div class="d-flex mb-2">
                                    <h1>Account Verification</h1>
                                </div>
                                
                                <div class="sale-prof-detail">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Status:</label>
                                            Verified
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="profile-stting-sec3">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h1>Subscription</h1>
                                    <div class="form-group">
                                        <input type="submit" value="Upgrade to Standard" class="btn btn-third" onclick="window.location.href = 'subscription-plans.html';">
                                    </div>
                                </div>
                                
                                <div class="sale-prof-detail">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <label>Status:</label>
                                            Verified
                                        </div>
                                        <div class="col-md-5">
                                            <label>End Date</label>
                                            13-11-2023
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        
                        <div class="col-md-6  pl-0 pr-0">
                            <div class="profile-stting-sec4">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h1>Business Categories</h1>
                                    <div class="form-group">
                                        <input type="submit" value="Purchase" class="btn btn-third">
                                    </div>
                                </div>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa.</p>
                                
                               

                                <div class="sale-prof-detail">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <ul class="right-categories-list">
                                                @foreach($company->activities as $key => $activity)
                                                <li><a href="#">{{ $activity->name ?? '' }}</a></li>
                                                @endforeach
                                           </ul>
                                        </div>
                                    </div>
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