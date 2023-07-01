@extends('layouts.app')
@section('content')
    <!-- Header Starts -->
    @include('initiator.layouts.header')
    <!-- Header Ends -->

    <!--Declaration Section Starts -->
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
                            <div class="row mb-5">
                                    <div class="d-flex justify-content-between justify-content-center">
                                        <div class="form-group proceed-btn">
                                            <input type="submit" value="Edit" class="btn btn-third" onclick="window.location.href = 'registration-edit';">
                                        </div>
                                        <span>Date: {{ Carbon\Carbon::createFromTimeString($company->updated_at)->format('d-m-Y')  }}</span>
                                    </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 declration-content">
                                    <h2 class="mb-4">Please go through the information furnished and confirm to proceed with the registration.</h2>

                                    <p>To complete the account registration process, you are requested to review the Registration Application Form from the below link: </p>
                                    <ul class="decl-ul-list">
                                        <li>Carefully review all the auto-generated information provided during the registration process. </li>
                                        <li>In case you wish to make any change in the Form, you can click on ‘Edit’ button and make required changes.</li>
                                        <li>After review and agree Terms and Conditions of <a href="#"> Dialectb2b.com</a>, the Registration Form will be automatically downloaded.</li>
                                        <li>To View/Open this Form, you must use Adobe Reader; or you can download it from the Adobe Website for free.</li>
                                        <li>Once the final review of the application is completed, Select 'Agree & download' of Self Declaration Statement.</li>
                                        <li>Print the Registration Form and get signature and Company Stamp from company authorized representative/signatory.</li>
                                        <li>Upload the signed Registration Form. You may download it later and keep it for your records.</li>
                                        <li>Once the signed Registration Application is uploaded click on ‘Submit’ button to proceed.</li>
                                        <li>You will receive a Pop-Up message on Final Submission of Registration Form. Click on ‘No, Cancel It!’ button in case you are not sure for final submission of Form or otherwise click on ‘Yes, I Am Sure!’ button.</li>
                                        
                                    </ul>
                                    <table class="table table-bordered reg-info-tbl">
                                        <tbody>
                                          <tr>
                                            <th scope="row">Company Name</th>
                                            <td>{{ $company->name }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Company Address </th>
                                            <td>{{ $company->address }}, {{ $company->zone }}, {{ $company->street }}, {{ $company->building }}, {{ $company->unit }}, {{ $company->pobox }}</td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Operation Regions</th>
                                            <td>
                                                @foreach($company->locations as $key => $location)
                                                {{ $location->name ?? '' }}<br>
                                                @endforeach
                                            </td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Company Website </th>
                                            <td>
                                            {{ $company->domain }}
                                            </td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Mobile No. </th>
                                            <td>
                                            {{ $company->country_code.' '.$company->phone }}
                                            </td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Company Fax </th>
                                            <td>
                                            {{ $company->country_code.' '.$company->fax }}
                                            </td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Company Logo </th>
                                            <td>
                                                <img src="{{ asset($company->logo) }}" alt="" height="100px">
                                            </td>
                                          </tr>

                                          <tr>
                                            <th scope="row">Business Categories</th>
                                            <td>
                                                @foreach($company->activities as $key => $activity)
                                                {{ $activity->name ?? '' }}<br>
                                                @endforeach
                                            </td>
                                          </tr>

                                          <tr>
                                            <th scope="row">{{ $company->document->document->name ?? '' }}</th>
                                            <td>
                                                License No: {{ $company->document->doc_number ?? '' }}<br>
                                                Expiry Date: {{ $company->document->expiry_date ?? '' }}
                                            </td>
                                          </tr>

                                        </tbody>
                                      </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                    <embed src="{{ asset($company->document->doc_file ?? '') }}" class="license-preview d-flex align-items-center justify-content-center">
                                        <!-- QR License Preview -->
                                    </div>
                                    <div id="declaration-download-area"  class="read-declaration {{ $company->decleration ? 'd-none' : '' }}">
                                        Please read the <a href="#"> declaration</a> carefully and select 'agree & download' to proceed.

                                        <div class="form-group agree-btn" >
                                            <a href="{{ route('sign-up.declaration.download') }}" type="button" value="Agree & Download" class="btn btn-secondary">Agree & Download</a>
                                        </div>
            

                                    </div>
        
                                </div>

                                <div class="col-md-12">
                                    <div id="declaration-upload-area" class="document-upload3 {{ $company->decleration ? 'd-none' : '' }}">
                                    <div id="drop-area" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleDrop(event)">
                                            <label>Upload the duly signed Registration form here.</label>
                                            <div class="clearfix"></div>
                                            <input type="file" id="upload" hidden="" name="declaration_file">
                                            <label for="upload" class="upload-file">Upload Files</label>
                                            <label>Or Drop Files</label>
                                            <span class="max-file-size align-bottom">Format: pdf, jpeg, jpg, png, pdf.<br>
                                                Max-Size: 4MB </span>
                                            <div class="clearfix"></div>
                                        </div>   
                                    </div>
                                    <div id="declaration-preview" class="mt-4">
                                        <span class="d-flex doc-preview align-items-center justify-content-between {{ !$company->decleration ? 'd-none' : '' }}">
                                        Declaration
                                        <div class="d-flex align-items-center">
                                            <a id="doc-preview-link" href="{{ asset($company->decleration) }}" class="doc-preview-view" target="_blank"></a>
                                            <a href="#" class="doc-preview-delete delete-declaration" data-id="{{ $company->id }}" data-url="{{ route('sign-up.declaration.delete') }}"></a>
                                            </div>
                                        </span>
                                    </div>
                                    <div id="progressBar" style="display: none;" class="mt-4">
                                        <div id="progress" style="width: 0%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <div class="form-group proceed-btn">
                                <input type="submit" value="Edit" class="btn btn-third" onclick="window.location.href = 'registration-edit';">
                            </div>
                            <div class="form-group proceed-btn">
                                <input id="proceed" type="button" value="Proceed" class="btn btn-secondary">
                            </div>
                        </div>
                    </section>

                </section>
            </div>
        </section>
    </div>
    <!--Declaration Section Ends -->


@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        var progressBar = document.getElementById('progressBar');
        var progress = document.getElementById('progress');
        var declarationPreview = document.getElementById('declaration-preview');
        var declarationUploadArea = document.getElementById('declaration-upload-area');
        var declarationDownloadArea = document.getElementById('declaration-download-area');

        $('#upload').change(function() {
            var uploadAction = '/sign-up/declaration/upload';
            var fileInput = $(this)[0];
            var file = fileInput.files[0];
            var formData = new FormData();
            formData.append('declaration_file', file);

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
                    var content = `<span class="d-flex doc-preview align-items-center justify-content-between">
                                        Declaration
                                        <div class="d-flex align-items-center">
                                            <a id="doc-preview-link" href="${response.data.filepath}" class="doc-preview-view" target="_blank"></a>
                                            <a href="#" class="doc-preview-delete delete-declaration"></a>
                                            </div>
                                    </span>`;
                    $('#document').val(response.data.data.doc_file);                
                    declarationPreview.classList.remove('d-none');
                    declarationPreview.innerHTML = content;
                    declarationUploadArea.classList.add('d-none');
                    declarationDownloadArea.classList.add('d-none');
                    progressBar.style.display = 'none';
                    $("#upload").val("");
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


        $("body").on("click",".delete-declaration",function(){
            var docDeleteAction = "{{ route('sign-up.declaration.delete') }}";
            var token = "{{ csrf_token() }}";
            var id = $(this).data('id');
            Swal.fire({
                title: "Are you sure?",
                text: "Declaration will be deleted!",
                icon: 'warning',
                showCancelButton: true,
            }).then(function (willDelete) {
                if (willDelete.isConfirmed === true) {
                    axios.post(docDeleteAction, id)
                    .then((response) => {
                        // Handle success response
                        declarationPreview.classList.add('d-none');
                        declarationUploadArea.classList.remove('d-none');
                        declarationDownloadArea.classList.remove('d-none');
                        $("#upload").val("");
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

        $("body").on("click","#proceed",function(){
            Swal.fire({
                title: "Are you sure?",
                text: "Submit the registration",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Yes, I Am Sure!",
                cancelButtonText: "No, Cancel It!",  
            }).then(function (willDelete) {
                if (willDelete.isConfirmed === true) {
                     window.location.href = 'review-verification';
                }
                else{
                    window.reload();
                }
            });
        });

    });

    function handleFileSelect(event) {
        // Handle file selection here
        var files = event.target.files;
        // Access selected files from the 'files' variable and process them as needed
    }

    function handleDragOver(event) {
        event.preventDefault();
        event.dataTransfer.dropEffect = "copy";
        // Add any visual indicators or styles to indicate valid drop target
    }

    function handleDragLeave(event) {
        event.preventDefault();
        // Remove any visual indicators or styles when leaving the drop target
    }

    function handleDrop(event) {
        event.preventDefault();
        // Handle dropped files here
        var files = event.dataTransfer.files;
        // Access dropped files from the 'files' variable and process them as needed
        
        // Manually trigger file selection for the file input element
        var fileInput = document.getElementById("upload");
        fileInput.files = files;
        // Optionally, you can also trigger the 'change' event on the file input element
        var changeEvent = new Event("change");
        fileInput.dispatchEvent(changeEvent);
    }
</script>
@endpush
@endsection