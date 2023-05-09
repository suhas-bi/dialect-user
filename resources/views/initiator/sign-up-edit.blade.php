@extends('layouts.app')
@section('content')
    <!-- Header Starts -->
    @include('initiator.layouts.header')
    <!-- Header Ends -->

    <!--Sign Up Edit Section Starts -->
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
                            <div class="row mb-3">
                                <div class="col-md-12"><span class="mandatory">*All fields are mandatory!</span></div>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Company Name <span class="mandatory">*</span></label>
                                            <input type="text" placeholder="Company Name" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Company Address<span class="mandatory">*</span></label>
                                            <input type="text" placeholder="Address" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Zone No <span class="mandatory">*</span></label>
                                            <input type="text" placeholder="Zone No" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Street No <span class="mandatory">*</span></label>
                                            <input type="text" placeholder="Street No" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Building No<span class="mandatory">*</span></label>
                                            <input type="text" placeholder="Building No" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Unit No <span class="mandatory">*</span></label>
                                            <input type="text" placeholder="Unit No" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Country<span class="mandatory">*</span></label>
                                            <input type="text" placeholder="Country" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>PO Box No<span class="mandatory">*</span></label>
                                            <input type="text" placeholder="PO Box No" class="form-control">
                                        </div>
                                    </div>
                                    <div class="operating-regions">
                                        <label>Operating Regions</label>
                                        <ul>
                                            <li>
                                                <label class="cust-checkbox">Al Rayyan
                                                <input type="checkbox" checked="checked">
                                                <span class="checkmark"></span>
                                               </label>
                                            </li>

                                            <li>
                                                <label class="cust-checkbox">Al-Shahaniya
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                               </label>
                                            </li>

                                            <li>
                                                <label class="cust-checkbox">Al Wakrah
                                                <input type="checkbox" checked="checked">
                                                <span class="checkmark"></span>
                                               </label>
                                            </li>

                                            <li>
                                                <label class="cust-checkbox">Al Shamal
                                                <input type="checkbox" checked="checked">
                                                <span class="checkmark"></span>
                                               </label>
                                            </li>

                                            <li>
                                                <label class="cust-checkbox">Doha
                                                <input type="checkbox" checked="checked">
                                                <span class="checkmark"></span>
                                               </label>
                                            </li>

                                            <li>
                                                <label class="cust-checkbox">Al Daayen
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                               </label>
                                            </li>
                                            <li>
                                                <label class="cust-checkbox" checked="checked">Al Khor
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                               </label>
                                            </li>

                                            <li>
                                                <label class="cust-checkbox">Umm Salal
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                               </label>
                                            </li>

                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="company-details">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group position-relative">
                                                    <label>Website</label>
                                                    <span class="www-text d-flex align-items-center justify-content-center">WWW.</span>
                                                    <input type="text" placeholder="" class="form-control website">
                                                </div>
                                                <label>Fax</label>
                                                <div class="d-flex">
                                                    <input type="text" placeholder="+974" class="form-control mobile-code">
                                                    <input type="text" placeholder="Fax" class="form-control mobile-number">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="file" id="upload" hidden/>
                                                        <label for="upload" class="browse-file">Drag a file or browse
                                                            a file to upload</label>
                                                    </div>
                                                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                                                        <div class="uplaod-formats">
                                                            Upload Company Logo
                                                            <span>Format: jpeg, jpg, png, gif, svg
                                                            Max-Size: 2MB </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>

                                    <div class="operating-regions">
                                        <div class="d-flex justify-content-between justify-content-center">
                                            <label>Business Category</label>
                                            <a href="#" class="add-business-catg">Add Business Category</a>
                                        </div>
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

                                    </div>
                                
                                <div class="col-md-4">
                                    <div class="document-upload">
                                        <h1>Document Upload</h1>
                                        <h2>CR License</h2>
                                        <label>Document No <span class="mandatory">*</span></label>
                                        <input type="text" placeholder="Document No" class="form-control">
                                    
                                        <label>Document Expiry Date<span class="mandatory">*</span></label>
                                        <input type="text" placeholder="Expiry Date" class="form-control">
                                    
                                        <label>Upload Document</label>
                                        <div class="clearfix"></div>
                                        <input type="file" id="upload" hidden />
                                        <label for="upload" class="upload-file">Upload Files</label>
                                        <div class="clearfix"></div>
                                        <label>Or Drop Files</label>
                                        <span class="formats-documents">Format: jpeg, jpg, png, gif, svg<br>
                                            Max-Size: 2MB </span>
                                        
                                    
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="d-flex justify-content-between justify-content-center">
                            <div class="already-signup">
                                <a href="#" class="reset">Reset</a>
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
    <!--Sign Up Edit Section Ends -->
@endsection