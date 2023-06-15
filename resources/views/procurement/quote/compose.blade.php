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
        <section class="container">
            <div class="row registration">
                <h1>Generate Quote</h1>
                <section class="reg-content-main">
                    <div class="quote-navigation-main">
                        <ul class="d-flex align-items-center">
                            <li class="d-flex align-items-center active-first-noradius">
                                <small
                                    class="reg-nav-count-active d-flex align-items-center justify-content-center">1</small>
                                Add Business Category
                            </li>
                            <li class="d-flex align-items-center active-last-noradius">
                                <small
                                    class="reg-nav-count-active d-flex align-items-center justify-content-center">2</small>
                                Generate Quote
                            </li>

                        </ul>

                    </div>

                    <section class="reg-content-sec">
                        <form id="enquiry_form" action="" method="post" enctype="multipart/form-data">
                           @csrf
                        <div class="signup-fields">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12 mb-3"><span class="mandatory">* Mandatory Fields</span></div>
                                        <div class="col-md-12">
                                            <span class="category-selected d-flex align-items-center justify-content-between">{{ $enquiry->sub_category->name ?? ''}} <a href="{{ route('procurement.quote.changeCategory',$enquiry->id) }}" class="edit-white"></a></span>
                                        </div>
                                        <div class="col-md-12">
                                            <input id="enquiry_id" type="hidden" name="enquiry_id" value="{{ $enquiry->id }}" />
                                            <input id="subject" type="text" name="subject"
                                                placeholder="Quotation for 15 Nos. Window ACs with onsite installation"
                                                class="form-control" value="{{ $enquiry->subject ?? '' }}">
                                        </div>

                                        <div class="col-md-6">
                                            <input id="expire_at" name="expired_at" type="text" placeholder="Time Frame (DD-MM-YY)" min="{{ date('Y-m-d') }}"
                                                class="form-control  calendar-ico" value="{{ $enquiry->expired_at ?? '' }}" autocomplete="off">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="select-drop">
                                                <select id="standard-select" name="country_id" class="country">
                                                    <option value=" ">Select Country</option>
                                                    @foreach($countries as $key => $country)
                                                    <option value="{{ $country->id }}" {{ $enquiry->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="select-drop">
                                                <select id="standard-select" name="region_id" class="region">
                                                    <option value=" ">Select Region</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="cust-checkbox limited-par-txt">Send as Limited Participation
                                                <input type="checkbox" name="is_limited" value="1" {{ $enquiry->is_limited == 1 ? 'checked' : '' }}>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="document-upload2">

                                        <label>Upload Document</label>
                                        <div class="clearfix"></div>
                                        <input type="file" id="upload" hidden />
                                        <label for="upload" class="upload-file">Upload Files</label>
                                        <label>Or Drop Files</label>
                                        <div class="mt-4 mb-4">
                                            <div id="progressBar" style="display: none;">
                                                <div id="progress" style="width: 0%;"></div>
                                            </div>
                                        </div>    
                                        <div id="attachment-preview">
                                            
                                            
                                        </div>
                                        <div class="mt-4">
                                            <span class="max-file-size align-bottom">[Maximum File Size is 5MB]</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <textarea id="body" class="message" name="body">{{ $enquiry->body }}</textarea>
                                </div>

                            </div>
                        </div>

                        <div class="d-flex d-flex justify-content-end">
                            <div class="form-group proceed-btn">
                                <input id="draft" type="button" value="Save as Draft" class="btn btn-third">
                            </div>

                            <div class="form-group proceed-btn">
                                <input id="generate" type="button" value="Generate" class="btn btn-secondary">
                            </div>
                        </div>
                        </form>
                    </section>

                </section>
            </div>
        </section>
    </div>
@push('scripts')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $( function() {
        var country_id = $('.country  option:selected').val();
        // Document
        var progressBar = document.getElementById('progressBar');
        var progress = document.getElementById('progress');
        var enquiry_id = document.getElementById('enquiry_id').value;
        setCountryChange(country_id);

        $( "#expire_at" ).datepicker({
            minDate: 0,
            dateFormat: 'dd-mm-yy',
        });

        $('.country').on('change',function(){
            var country_id = $('.country  option:selected').val();
            setCountryChange(country_id);
        });

        
        getAttchments(enquiry_id);
        $('body').on('change','#upload',function() {
            var uploadAction = "{{ route('procurement.quote.uploadAttachment') }}";
            var fileInput = $(this)[0];
            var file = fileInput.files[0];
            var formData = new FormData();
            formData.append('document_file', file);
            formData.append('enquiry_id', enquiry_id);
           
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
                    getAttchments(enquiry_id);
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

        
        $("body").on("click",".delete-attachment",function(){
            var docDeleteAction = $(this).data('url');
            var token = "{{ csrf_token() }}";
            var id = $(this).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "Attachment will be deleted!",
                icon: 'warning',
                showCancelButton: true,
            }).then(function (willDelete) {
                if (willDelete.isConfirmed === true) {
                    axios.post(docDeleteAction, {id:id})
                    .then((response) => {
                        // Handle success response
                        //console.log(response);
                        getAttchments(enquiry_id);
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

        $('#draft').on('click',function(){
            var formData = $('#enquiry_form').serialize();
            var action = "{{ route('procurement.quote.saveAsDraft') }}";
            axios.post(action, formData)
            .then((response) => {
                // Handle success response
                if(response.data.status === true){
                    window.location.href = '/procurement/draft';
                }
            })
            .catch((error) => {
                // Handle error response
                console.log(error);
            });
        });

        function getAttchments(enquiry_id){
            var attchmentAction = "{{ route('procurement.getEnquiryAttachments') }}";
            axios.post(attchmentAction, {enquiry_id:enquiry_id})
            .then((response) => {
            // Handle success response
                if(response.data.status === true){
                    $("#attachment-preview").empty();
                    var attachments = response.data.attachments;
                    attachments.forEach(function(attachment) {
                        $("#attachment-preview").append(`<span class="d-flex doc-preview align-items-center justify-content-between mb-2">
                                                    ${attachment.file_name}
                                                    <div class="d-flex align-items-center">
                                                        <a id="doc-preview-link" href="{{ config('setup.application_url') }}${attachment.path}" class="doc-preview-view" target="_blank"></a>
                                                        <a href="#" class="doc-preview-delete delete-attachment" data-id="${attachment.id}" data-url="{{ route('procurement.quote.deleteAttachments') }}"></a>
                                                    </div>
                                                </span>`);
                    });
                }
            })
            .catch((error) => {
                console.log(error);
            });
        }
        
    });

    function setCountryChange(country_id){
        var regionAction = "{{ route('getRegionByCountry') }}";
        axios.post(regionAction, {id:country_id})
        .then((response) => {
        // Handle success response
            if(response.data.status === true){
                $(".region").empty();
                $(".region").append('<option value="0">All Region</option>');
                var regions = response.data.regions;
                regions.forEach(function(region) {
                    $(".region").append(`<option value="${region.id}">${region.name}</option>`);
                });
            }
        })
        .catch((error) => {
            console.log(error);
        });
    }

    
    
  </script>
@endpush
 
@endsection    