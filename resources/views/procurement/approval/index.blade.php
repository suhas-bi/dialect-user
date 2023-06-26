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
                        <div id="search" class="account-search-box-main">
                            <input type="text" placeholder="Search" class="form-control">
                        </div>
                        <div id="filter" class="account-search-box-main" style="display: none;">
                            <select id="mode_filter" name="mode_filter" class="form-select">
                                <option value=" ">All</option>
                                <option value="today">Today </option>
                                <option value="yesterday">Yesterday </option>
                                <option value="last_week">Last week </option>
                                <option value="last_month">Last month </option>
                            </select>
                        </div>
                        <a href="#" class="filter-ico2 float-right search_filter" data-option="search"></a>
                    </div>

                    <div id="inbox-list" class="list-group ">

                        
                        


                    </div>


                </div>

            </div>

            <div class="col-md-9 pl-0 pr-0 scnd-section-main">
                <div id="my-quote">
                    
                </div>
            </div>    

<!-- Approval Content Section End -->

</section>
<!-- Main Content Ends -->

@push('scripts')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $( function() {
            
            loadBidInboxList();


            $('body').on('click','.search_filter',function(){
                $('#filter').toggle();
                $('#search').toggle();
            });

            $('body').on('keyup','#keyword',function(){
                loadBidInboxList();
            });

            $('body').on('change','#mode_filter',function(){
                loadBidInboxList();
            });

            $('body').on('click','.approve',function () {
                var approveQuoteAction = "{{ route('procurement.teamAccount.approveQuote') }}";
                var id = $(this).data('id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "Do you want to approve the quote!",
                    icon: 'warning',
                    showCancelButton: true,
                }).then(function (willUpdate) {
                    if (willUpdate.isConfirmed === true) {
                        axios.post(approveQuoteAction, {id:id})
                             .then((response) => {
                                // Handle success response
                                Swal.fire({
                                    toast: true,
                                    icon: 'success',
                                    title: response.data.message,
                                    animation: false,
                                    position: 'top-right',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                });
                                loadBidInboxList();
                             })
                             .catch((error) => { 
                                // Handle error response
                                console.log(error);
                             });
                    }
                    else{
                        Swal.fire({
                            title: 'Cancelled',
                            icon: "error",
                        });
                    }
                });
                
            });

        });

        function loadBidInboxList(){
            var fetchSendItemsAction = "{{ route('procurement.teamAccount.fetchAllApprovalEnquiries') }}";
            var mode_filter = $('#mode_filter option:selected').val();
            var keyword = $('#keyword').val();
            axios.post(fetchSendItemsAction, {mode_filter:mode_filter, keyword:keyword})
                 .then((response) => {
                    // Handle success response
                    if(response.data.status === true){
                        let enquiries = response.data.enquiries;
                        $('#inbox-list').empty();
                        $('#my-quote').empty();
                        enquiries.forEach(function(enquiry) {
                            var content = `<a id="enquiry-${enquiry.id}" href="#" data-id="${enquiry.id}" class="list-group-item list-group-item-action flex-column align-items-start enquiry_item">
                                                <div class="list-item-inner blue-border">
                                                    <div class="d-flex justify-content-between">
                                                        <h2 class="mb-2  bullet-light-blue d-flex">${enquiry.reference_no}</h2>
                                                        <span href="#" class="dots-ico"></span>
                                                    </div>
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h3>${enquiry.subject}</h3>
                                                    </div>
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <small class="bid-date">${enquiry.date}</small>
                                                        <small class="bid-hours">${enquiry.expire_in}</small>
                                                    </div>
                                                </div>
                                            </a>`;
                            $('#inbox-list').append(content);
                        });

                        
                        
                    }
                 })
                 .then(() => {
                    var id = $('.enquiry_item').data('id');
                    $("#enquiry-"+id).addClass("active");
                    openEnquiry(id);
                 })
                 .catch((error) => { 
                    // Handle error response
                    console.log(error);
                 });
        }

        function openEnquiry(id){
            var fetchEnquiryAction = "{{ route('procurement.fetchEnquiry') }}";
            axios.post(fetchEnquiryAction, {id:id})
                 .then((response) => {
                    // Handle success response
                    let enquiry = response.data.enquiry;
                    $('#my-quote').empty();
                    $('#quote-options').empty();
                    $('#open').empty();
                    $('#closed').empty();
                    $('#open-count').text(enquiry.open_faqs.length);
                    $('#closed-count').text(enquiry.closed_faqs.length);
                    var content = `<div class="mid-sec-main">
                                        <div class="mid-second-sec d-flex justify-content-between bg-white">
                                            <div class="">
                                                <div class="w-100">
                                                    <h2>${enquiry.subject}</h2>
                                                    <small class="created-date"><span>Created on: </span>${enquiry.created_at}</small>
                                                    <small class="created-date ms-4"><span>Bids accepted till: </span>${enquiry.expire_at}</small>
                                                </div>

                                                <div class="d-flex mt-2">
                                                    <h3>Quote For: ${enquiry.sender.name}, ${enquiry.sender.designation}, ${enquiry.sender.company.name}  </h3>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-end flex-column">
                                                <div class="requested-by">Requested by:<br>
                                                    <a href="#"> ${enquiry.sender.email}</a>
                                                </div>
                                                <div class="form-group proceed-btn float-right">
                                                    <input type="button" value="Approve" class="btn btn-secondary approve" data-id="${enquiry.id}" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="bid-detail-content">
                                            <pre>${enquiry.body}</pre>
                                        </div>

                                        <h1 class="mt-2">${enquiry.attachments.length != 0 ? 'Attachments' : '' }</h1>
                                        <div class="d-flex flex-column align-items-left float-start mt-2 attachments">
                            
                                        </div>
                                    </div>`;
                    $('#my-quote').append(content);  
                    
                    enquiry.attachments.forEach(function(attachment) {
                    $('.attachments').append(`<span class="d-flex doc-preview align-items-center justify-content-between mb-2">
                                                    ${attachment.file_name}
                                                    <div class="d-flex align-items-center">
                                                        <a id="doc-preview-link" href="{{ config('setup.application_url') }}${attachment.path}" class="doc-preview-view" target="_blank"></a>
                                                        <a id="doc-preview-link" href="{{ config('setup.application_url') }}${attachment.path}" class="" download>D</a>
                                                    </div>
                                                </span>`);
                    });  

                 })
                 .catch((error) => { 
                    // Handle error response
                    console.log(error);
                 });
        }

        </script>

@endpush
 
@endsection    