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
                                                    <input id="name" type="text" name="name" class="form-control" value="{{ $company->name }}" placeholder="Company Name">
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
                                        <div class="operating-regions form-group position-relative">
                                            <label>Operating Regions</label>
                                            <ul>
                                                @foreach($regions as $key => $region)
                                                <li>
                                                    <label class="cust-checkbox">{{ $region->name }}
                                                        <input id="region_id_{{ $key }}" type="checkbox" name="region_id[]" {{ in_array($region->id, $company_locations) ? 'checked' : '' }} value="{{ $region->id }}">
                                                        <span class="checkmark"></span>
                                                     </label>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <div class="invalid-msg2 region_error"> </div>
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
                                                        <div class="col-md-6 position-relative" id="logo-upload-area">
                                                            <input type="file" id="logo-upload" name="logo_file" hidden/>
                                                            <label for="logo-upload" class="browse-file">Drag a file or browse
                                                                a file to upload</label>
                                                            <div class="invalid-msg2 logo-error mt-4"> </div>    
                                                        </div>
                                                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                                                            <div class="uplaod-formats">
                                                                Upload Company Logo
                                                                <span>Format: jpeg, jpg, png, gif, svg
                                                                Max-Size: 2MB </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="logo-preview" class="d-flex flex-column align-items-left  mt-2">
                                                        <span class="d-flex doc-preview align-items-center justify-content-between {{ !$company->logo ? 'd-none' : '' }}">
                                                            Company Logo
                                                            <div class="d-flex align-items-center">
                                                                <a href="#" class="doc-preview-view"></a>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <div id="progressBarLogo" style="display: none;">
                                                            <div id="progressLogo" style="width: 0%;"></div>
                                                        </div>
                                                        
                                                    </div>

                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                
                                    <div class="col-md-4">
                                        <div class="document-upload">
                                            <h1>Document Upload</h1>
                                            <h2>{{ $document->name }}</h2>
                                            <div class="form-group position-relative">
                                                <label>Document No <span class="mandatory">*</span></label>
                                                <input id="document_no" type="text" name="document_no" class="form-control" value="{{ $company->document->doc_number ?? '' }}" placeholder="Document No">
                                                <div class="invalid-msg2"> </div>
                                            </div>
                                            <div class="form-group position-relative">
                                                <label>Document Expiry Date<span class="mandatory">*</span></label>
                                                <input id="expiry_date" type="date" name="expiry_date" class="form-control" value="{{ $company->document->expiry_date ?? '' }}" placeholder="Expiry Date" min="{{ date('Y-m-d') }}">
                                                <div class="invalid-msg2"> </div>
                                            </div>
                                            
                                            <div id="document-upload-area" class="form-group position-relative {{ $company->document && $company->document->doc_file ? 'd-none' : '' }}">
                                                <label>Upload Document</label>
                                                <div class="clearfix"></div>
                                                <input type="file" id="upload" name="document_file" hidden accept=".jpeg, .jpg, .png, .pdf" />
                                                <label for="upload" class="upload-file">Upload Files</label>
                                                <div class="clearfix"></div>
                                                <label>Or Drop Files</label>
                                                <span class="formats-documents">Format: jpeg, jpg, png, pdf<br>
                                                Max-Size: 4MB </span>
                                                <div id="progressBar" style="display: none;">
                                                    <div id="progress" style="width: 0%;"></div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="invalid-msg2 doc-msg"> </div>
                                            </div>
                                            <input id="document" type="hidden" name="document" value="{{ $company->document->doc_file ?? '' }}" />
                                            <div id="document-preview" class="d-flex flex-column align-items-left  mt-2" >
                                                @if($company->document)
                                                <span class="d-flex doc-preview align-items-center justify-content-between {{ !$company->document->doc_file ? 'd-none' : '' }}">
                                                    {{ $company->document->doc_name ?? '' }}
                                                    <div class="d-flex align-items-center">
                                                        <a id="doc-preview-link" href="{{ asset($company->document->doc_file ?? '') }}" class="doc-preview-view" target="_blank"></a>
                                                        <a href="#" class="doc-preview-delete delete-document" data-id="{{ $company->document->id ?? '' }}" data-url="{{ route('sign-up.company-info.deleteDocument') }}"></a>
                                                        </div>
                                                </span>
                                                @endif 
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('.loader').hide();
        var company = JSON.parse(localStorage.getItem('company'));

        // Document
        var progressBar = document.getElementById('progressBar');
        var progress = document.getElementById('progress');
        var documentPreview = document.getElementById('document-preview');
        var documentUploadArea = document.getElementById('document-upload-area');

        // Logo
        var progressBarLogo = document.getElementById('progressBarLogo');
        var progressLogo = document.getElementById('progressLogo');
        var logoPreview = document.getElementById('logo-preview');
        var logoUploadArea = document.getElementById('logo-upload-area');

        $('#upload').change(function() {
            var uploadAction = '/sign-up/company-info/upload-document';
            var fileInput = $(this)[0];
            var file = fileInput.files[0];
            var formData = new FormData();
            formData.append('document_file', file);

            axios.post(uploadAction, formData, {
                    headers: {
                    'Content-Type': 'multipart/form-data'
                    },
                    onUploadProgress: function(progressEvent) {
                        var percent = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                        progress.style.width = percent + '%';
                    }
                })
                .then((response) => {
                    // Handle success response
                    console.log(response.data.data.doc_file);
                    var content = `<span class="d-flex doc-preview align-items-center justify-content-between">
                                        ${response.data.data.doc_name}
                                        <div class="d-flex align-items-center">
                                            <a id="doc-preview-link" href="${response.data.data.doc_file}" class="doc-preview-view" target="_blank"></a>
                                            <a href="#" class="doc-preview-delete delete-document" data-id="${response.data.data.id}" data-url="{{ route('sign-up.company-info.deleteDocument') }}"></a>
                                            </div>
                                    </span>`;
                    $('#document').val(response.data.data.doc_file);                
                    documentPreview.classList.remove('d-none');
                    documentPreview.innerHTML = content;
                    documentUploadArea.classList.add('d-none');
                    progressBar.style.display = 'none';
                })
                .catch((error) => {
                    // Handle error response
                    console.log(error);
                    if (error.response.status == 422) {
                        $.each(error.response.data.errors, function(field, errors) {
                            var input = $('input[name="' + field + '"]');
                            input.addClass('red-border');
                            var feedback = input.siblings('.invalid-msg2');
                            feedback.text(errors[0]).show();
                        });
                    }
                    progressBar.style.display = 'none';
                });
                progressBar.style.display = 'block';
        });

        $("body").on("click",".delete-document",function(){
            var docDeleteAction = $(this).data('url');
            var token = "{{ csrf_token() }}";
            var id = $(this).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "Document will be deleted!",
                icon: 'warning',
            }).then(function (willDelete) {
                if (willDelete) {
                    axios.post(docDeleteAction, id)
                    .then((response) => {
                        // Handle success response
                        console.log(response);
                        documentPreview.classList.add('d-none');
                        documentUploadArea.classList.remove('d-none');
                    })
                    .catch((error) => {
                        // Handle error response
                        console.log(error);
                    });
                } else {
                    Swal.fire({
                        title: 'Cancelled',
                        icon: "error",
                    });
                }
            });
        });

        $('#logo-upload').change(function() {
            var uploadAction = '/sign-up/company-info/upload-logo';
            var logoInput = $(this)[0];
            var logo = logoInput.files[0];
            var formData = new FormData();
            formData.append('logo_file', logo);

            axios.post(uploadAction, formData, {
                    headers: {
                    'Content-Type': 'multipart/form-data'
                    },
                    onUploadProgress: function(progressEvent) {
                        var percent = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                        progressLogo.style.width = percent + '%';
                    }
                })
                .then((response) => {
                    // Handle success response
                    console.log(response.data.data.doc_file);
                    var content = `<span class="d-flex doc-preview align-items-center justify-content-between {{ !$company->logo ? 'd-none' : '' }}">
                                      Company Logo
                                        <div class="d-flex align-items-center">
                                            <a href="${response.data.data.doc_file}" class="doc-preview-view"></a>
                                        </div>
                                    </span>`;
                    logoPreview.classList.remove('d-none');
                    logoPreview.innerHTML = content;
                    progressBarLogo.style.display = 'none';
                })
                .catch((error) => {
                    // Handle error response
                    console.log(error);
                    if (error.response.status == 422) {
                        $.each(error.response.data.errors, function(field, errors) {
                            if(field === 'logo_file'){
                                var logo_error = $('.logo-error');
                                console.log(errors[0]);
                                logo_error.html(errors[0]).show();
                            }
                        });
                    }
                    progressBarLogo.style.display = 'none';
                });
                progressBarLogo.style.display = 'block';
        });


        $('#company-info').submit(function(e) {
            e.preventDefault(); 
            $('.invalid-msg2').hide();
            var files = $('#upload')[0].files;
            var formData = new FormData(this); 
            var action = $(this).attr('action');

                axios.post(action, formData, {
                    headers: {
                    'Content-Type': 'multipart/form-data'
                    }
                })
                .then((response) => {
                    // Handle success response
                    if(response.data.status === true){
                        localStorage.setItem('data', JSON.stringify(response.data.user));
                        window.location.href = '/sign-up/business-category';
                    }
                })
                .catch((error) => {
                    // Handle error response
                    if(error.response.data.type == 'superseed'){
                        Swal.fire('Warning!', 'Your company has already been registered with us!.','warning');
                    }
                    if (error.response.status == 422) {
                        $.each(error.response.data.errors, function(field, errors) {
                            if(field === 'region_id'){
                                var region_error = $('.region_error');
                                console.log(region_error);
                                region_error.html(errors[0]).show();
                            }
                            if(field === 'document'){
                                var document_error = $('.doc-msg');
                                document_error.html(errors[0]).show();
                            }
                            var input = $('input[name="' + field + '"]');
                            input.addClass('red-border');
                            var feedback = input.siblings('.invalid-msg2');
                            feedback.text(errors[0]).show();
                        });
                    }
                    $('.loader').hide();
                });
        });
    });
</script>
@endpush
@endsection