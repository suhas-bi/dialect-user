@extends('layouts.app')
@section('content')
    <!-- Header Starts -->
    @include('initiator.layouts.header')
    <!-- Header Ends -->

    <!-- Company Info Sections Starts -->
    <div class="container-fluid reg-bg">
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

                            <li class="d-flex align-items-center active">
                                <small class="reg-nav-count-active d-flex align-items-center justify-content-center">2</small>
                                Company<br>Information
                            </li>

                            <li class="d-flex align-items-center">
                                <small class="reg-nav-count d-flex align-items-center justify-content-center">3</small>
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
                        <form id="company-info" action="{{ route('sign-up.company-info.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="signup-fields">
                                <div class="row mb-3">
                                    <div class="col-md-12"><span class="mandatory">*All fields are mandatory!</span></div>
                                </div>
                        
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group position-relative">
                                                    <label>Company Name <span class="mandatory">*</span></label>
                                                    <input id="name" type="text" name="name" class="form-control" value="{{ $company->name }}" placeholder="Company Name" readonly>
                                                    <div class="invalid-msg2"> </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group position-relative">
                                                    <label>Company Address<span class="mandatory">*</span></label>
                                                    <input id="address" type="text" name="address" class="form-control" value="{{ $company->address }}" placeholder="Address">
                                                    <div class="invalid-msg2"> </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group position-relative">
                                                    <label>Zone No <span class="mandatory">*</span></label>
                                                    <input id="zone" type="text" name="zone" class="form-control" value="{{ $company->zone }}" placeholder="Zone No">
                                                    <div class="invalid-msg2"> </div>
                                                </div>    
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group position-relative">
                                                    <label>Street No <span class="mandatory">*</span></label>
                                                    <input id="street" type="text" name="street" class="form-control" value="{{ $company->street }}" placeholder="Street No">
                                                    <div class="invalid-msg2"> </div>
                                                </div>    
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group position-relative">
                                                    <label>Building No<span class="mandatory">*</span></label>
                                                    <input id="building" type="text" name="building" class="form-control" value="{{ $company->building }}" placeholder="Building No">
                                                    <div class="invalid-msg2"> </div>
                                                </div>    
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group position-relative">
                                                    <label>Unit No</label>
                                                    <input id="unit" type="text" name="unit" class="form-control" value="{{ $company->unit }}" placeholder="Unit No">
                                                    <div class="invalid-msg2"> </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Country<span class="mandatory">*</span></label>
                                                <div class="select-drop3">
                                                    <select id="standard-select" name="country_id" >
                                                        <option value="1">Qatar</option>
                                                    </select>
                                                    <div class="invalid-msg2"> </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group position-relative">
                                                    <label>PO Box No</label>
                                                    <input id="pobox" type="text" name="pobox" class="form-control" value="{{ $company->pobox }}"  placeholder="PO Box No">
                                                    <div class="invalid-msg2"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="operating-regions">
                                            <label>Operating Regions</label>
                                            <ul>
                                                @foreach($regions as $key => $region)
                                                <li>
                                                    <label class="cust-checkbox">{{ $region->name }}
                                                        <input id="region_id_{{ $key }}" type="checkbox" name="region_id[]" checked="checked" value="{{ $region->id }}">
                                                        <span class="checkmark"></span>
                                                     </label>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <div class="invalid-msg2"> </div>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="company-details">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group position-relative">
                                                        <label>Website</label>
                                                        <span class="www-text d-flex align-items-center justify-content-center">WWW.</span>
                                                        <input id="domain" type="text" name="domain" placeholder="eg:- dialectb2b.com" class="form-control website" value="{{ $company->domain }}">
                                                        <div class="invalid-msg2"> </div>
                                                    </div>
                                                    <label>Fax</label>
                                                    <div class="d-flex">
                                                        <input id="country_code" type="text" name="country_code" class="form-control mobile-code" value="+974" placeholder="+974" readonly>
                                                        <input id="fax" type="text" name="fax" class="form-control mobile-number" value="{{ $company->fax }}" placeholder="Fax">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="file" id="upload" name="logo" hidden/>
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
                                    </div>
                                
                                    <div class="col-md-4">
                                        <div class="document-upload">
                                            <h1>Document Upload</h1>
                                            <h2>CR License</h2>
                                            <div class="form-group position-relative">
                                                <label>Document No <span class="mandatory">*</span></label>
                                                <input id="document_no" type="text" name="document_no" class="form-control" value="{{ $company->document->doc_number ?? '' }}" placeholder="Document No">
                                                <div class="invalid-msg2"> </div>
                                            </div>
                                            <div class="form-group position-relative">
                                                <label>Document Expiry Date<span class="mandatory">*</span></label>
                                                <input id="expiry_date" type="date" name="expiry_date" class="form-control" value="{{ $company->document->expiry_date ?? '' }}" placeholder="Expiry Date">
                                                <div class="invalid-msg2"> </div>
                                            </div>
                                            <div class="form-group position-relative">
                                                <label>Upload Document</label>
                                                <div class="clearfix"></div>
                                                <input type="file" id="upload" name="file" hidden />
                                                <label for="upload" class="upload-file">Upload Files</label>
                                                <div class="clearfix"></div>
                                                <label>Or Drop Files</label>
                                                <span class="formats-documents">Format: jpeg, jpg, png, gif, svg<br>
                                                Max-Size: 2MB </span>
                                                <div class="invalid-msg2"> </div>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between justify-content-center">
                                <div class="already-signup">
                                    <a href="#" class="reset" onclick="window.location.reload();">Reset</a>
                                </div>

                                <div class="form-group proceed-btn">
                                    <button type="submit" value="Proceed" class="btn btn-secondary">
                                        <i class="fa fa-repeat fa-spin text-white loader"></i>
                                        <span class="text-white">Proceed</span>
                                    </button>
                                </div>

                            </div>
                        </form>    
                    </section>

                </section>
            </div>
        </section>
    </div>
    <!-- Company Info Section Ends -->

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('.loader').hide();
        var company = JSON.parse(localStorage.getItem('company'));
        $('#company-info').submit(function(e) {
            e.preventDefault(); 
            $('.invalid-msg2').hide();
            var files = $('#upload')[0].files;
            var formData = new FormData(this); 
            var action = $(this).attr('action');
            $.ajax({
                url: action,
                type: "POST",
                processData: false,
                contentType: false,
                data: formData,
                beforeSend: function() {
                    $('.loader').show();
                },
                success: function(data) {
                    if(data.status === true){
                        localStorage.setItem('data', JSON.stringify(data.user));
                        window.location.href = '/sign-up/business-category';
                    }
                    console.log(data);
                },
                error: function(xhr, status, error) {
                    var response = JSON.parse(xhr.responseText);
                    if(response.type == 'superseed'){
                        Swal.fire('Warning!', 'Your company has already been registered with us!.','warning');
                    }
                    if (response.errors) {
                        $.each(response.errors, function(field, errors) {
                            if(field === 'mobile'){
                                var minput = $('input[name="' + field + '"]');
                                var mfeedback = minput.parent().next('.invalid-msg2');
                                mfeedback.html(errors[0]).show();
                            }
                            var input = $('input[name="' + field + '"]');
                            input.addClass('red-border');
                            var feedback = input.siblings('.invalid-msg2');
                            feedback.text(errors[0]).show();
                        });
                    }
                },
                complete: function(data) {
                    $('.loader').hide();
                }
            });
        });
    });
</script>
@endpush
@endsection