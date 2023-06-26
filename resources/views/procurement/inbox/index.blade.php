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
                    <div class="bid-header d-flex align-items-center">
                        <h1 class="mr-auto">Bid Inbox</h1>
                        <a href="#"  class="search-ico  float-right tablinks4 search_filter" data-option="search"></a>
                        <a href="#"  class="filter-ico float-right tablinks4 search_filter" data-option="filter"></a>
                    </div>
                    <div id="search" class="tabcontent4" style="display: none;">
                        <div class="my-quotes-search d-flex align-items-center justify-content-between">
                            <div class="account-search-box-main">
                                <input id="keyword" type="text" placeholder="Search by reference no." class="form-control">
                            </div>
                        </div>
                    </div>  

                    <div id="filter" class="tabcontent4" style="display: none;">
                        <div class="my-quotes-search d-flex align-items-center justify-content-left">
                            
                            <!-- <div class="custom-select" style="margin-left: 0; "> -->
                                <select id="mode_filter" name="mode_filter" class="form-select">
                                    <option value=" ">All</option>
                                    <option value="today">Today </option>
                                    <option value="yesterday">Yesterday </option>
                                    <option value="last_week">Last week </option>
                                    <option value="last_month">Last month </option>
                                </select>
                            <!-- </div> -->
                        </div>
                    </div>

                    <div id="inbox-list" class="list-group">
                        

                    </div>
                </div>

            </div>

            <div class="col-md-6 pl-0 pr-0 scnd-section-main">
                <div class="mid-sec-main">
                    <div class="mid-sec-header d-flex justify-content-between  justify-content-center">
                        <div class="first-sec d-flex align-items-center" id="quote-options">
                            
                        </div>
                        <div class="scond-sec d-flex align-items-center">
                            <div class="completed-screening d-flex align-items-center position-relative">
                                <small class="alert-count d-flex align-items-center justify-content-center" id="pending-count">0</small>

                                <a href="#" class="alert-btn"></a>
                                <div id="mark-drop3">
                                <a href="#" class="dummy-btn d-flex"></a>
                                    <ul class="drop-notf" id="notify">
                                     
                                    </ul>
                                </div>
                                
                            </div>

                            <div class="d-flex align-items-center position-relative">
                                <a href="#" class="more-dots"></a>
                            </div>
                        </div>
                    </div>
                    <div id="my-quote">
                        
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
                            </ul>
                            <!-- Tabs navs -->

                        </div>

                        <!-- Tabs 1-->

                        <div id="all-bids" class="tabcontent" style="display: block;">

                            <div class="row bid-list-head d-flex align-items-center justify-content-center">
                                
                                <div class="col-md-6"><a href="#"> Company Name <i class="ic_sort"><img
                                                src="{{ asset('assets/images/ic_sort.svg') }}"></i></a></div>
                                <div class="col-md-3 d-flex align-items-center justify-content-center"><a href="#">Date
                                        <i class="ic_sort"><img src="{{ asset('assets/images/ic_sort.svg') }}"></i></a></div>
                                <div class="col-md-3 d-flex align-items-center justify-content-center"><a
                                        href="#">Review Status <i class="ic_sort"><img src="{{ asset('assets/images/ic_sort.svg') }}"></i></a>
                                </div>
                            </div>
                            <ul id="all_replies_list" class="all-bid-ul">
                                
                                

                                

                            </ul>


                        </div>

                        <!-- Tabs 2 -->
                        <div id="shortlisted" class="tabcontent">
                            <div class="row bid-list-head d-flex align-items-center justify-content-center">
                                <div class="col-md-6"><a href="#"> Company Name <i class="ic_sort"><img
                                                src="{{ asset('assets/images/ic_sort.svg') }}"></i></a></div>
                                <div class="col-md-3 d-flex align-items-center justify-content-center"><a href="#">Date
                                        <i class="ic_sort"><img src="{{ asset('assets/images/ic_sort.svg') }}"></i></a></div>
                                <div class="col-md-3 d-flex align-items-center justify-content-center"><a
                                        href="#">Review Status <i class="ic_sort"><img src="{{ asset('assets/images/ic_sort.svg') }}"></i></a>
                                </div>
                            </div>

                            <ul id="shortlisted_list" class="all-bid-ul">
                               
                            </ul>

                        </div>

                    </div>

                </div>
            </div>

            <div class="col-md-6 pl-0 bid-open">
                
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
                                    <a class="nav-link tablinks2 faq active" data-option="open">Open</a>
                                    <small id="open-count" class="tab-notf-count d-flex align-items-center justify-content-center">0</small>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tablinks2 faq" data-option="closed">Closed</a>
                                    <small id="closed-count" class="tab-notf-count d-flex align-items-center justify-content-center">0</small>
                                </li>
                            </ul>
                            <!-- Tabs navs -->
                        </div>

                        <!-- Tabs 1-->

                        <div id="open" class="tabcontent2 scroll-q-asked" style="display: block;">
                            


                        </div>

                        <!-- Tabs 2 -->
                        <div id="closed" class="tabcontent2 scroll-q-asked" style="display: none;">
                          

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Main Content -->

    <!-- Accepted Till Model Starts -->
    <div class="modal fade" id="change-date-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLongTitle">Accepted Bids till</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div class="col-md-12 common-popup">
                        <input id="enquiry_id" type="hidden" value="">
                        <div class="form-group position-relative">
                            <label>Accepted Bids till<span class="mandatory"> *</span></label>
                            <input id="expire_at" name="expire_at" type="text" placeholder="Date (DD-MM-YY)" class="form-control choose-category calendar-ico" autocomplete="off">
                            <div class="invalid-msg2"></div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer model-footer-padd">
                    <div class="d-flex justify-content-end">
                        <div class="form-group proceed-btn">
                            <button type="button" class="btn btn-third cancel-change" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="form-group proceed-btn">
                            <input id="save-date-change" type="button" value="Save" class="btn btn-secondary">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Accepted till model ends -->

    <!-- Faq answer model starts -->
    <div class="modal fade" id="answer-question" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form  action="" method="post">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLongTitle">Respond</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body row">
                        <div class="col-md-12 common-popup">
                            <label>Question</label>
                            <h3 id="question">This is question</h3>
                            <input type="hidden" id="faq_id" />
                        </div>
                        <div class="col-md-12 common-popup">
                            <div class="form-group position-relative">
                                <label>Answer</label>
                                <textarea class="form-control" id="answer" rows="3" name="answer"></textarea>
                                <div class="invalid-msg2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer model-footer-padd">
                        <div class="d-flex justify-content-end">
                            <div class="form-group proceed-btn">
                                <button type="button" class="btn btn-third cancel-change" data-dismiss="modal">Cancel</button>
                            </div>

                            <div class="form-group proceed-btn">
                                <input id="save-answer" type="button" value="Submit" class="btn btn-secondary">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Faq answer model ends -->

    <input type="hidden" id="change-date-url" value="{{ route('procurement.quote.editAcceptedDate') }}" />
    <input type="hidden" id="answer-faq-url" value="{{ route('procurement.answerFaq') }}" />
    <input type="hidden" id="skip-faq-url" value="{{ route('procurement.skipFaq') }}" />
    @push('scripts')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $( function() {
            
            loadBidInboxList();

            // Get the current date
            var currentDate = new Date();

            // Calculate the maximum date (1 month from today)
            var maxDate = new Date();
            maxDate.setMonth(currentDate.getMonth() + 1);

            $("#expire_at").datepicker({
                minDate: 0,
                dateFormat: 'dd-mm-yy',
                maxDate: maxDate
            });

            $('body').on('click','.search_filter',function(){
            
                var search_filter = $(this).data('option');

                if(search_filter === "search"){
                    $('#filter').hide();
                    $('#search').show();
                }
                else if(search_filter === "filter"){
                    $('#filter').show();
                    $('#search').hide();
                }
                else{
                    $('#filter').hide();
                    $('#search').hide();
                }
            });

            $('body').on('click','.faq',function(){
                $('.faq').removeClass('active');
                $(this).addClass('active');
                var faq_filter = $(this).data('option');
                
                if(faq_filter === "open"){
                    $('#closed').hide();
                    $('#open').show();
                }
                else if(faq_filter === "closed"){
                    $('#closed').show();
                    $('#open').hide();
                }
                else{
                    $('#closed').hide();
                    $('#open').hide();
                }
            });

            

            $('body').on('keyup','#keyword',function(){
                loadBidInboxList();
            });

            $('body').on('change','#mode_filter',function(){
                loadBidInboxList();
            });

            $('body').on('click','.enquiry_item',function(){
                var id = $(this).data('id');
                $('.enquiry_item').removeClass("active");
                $("#enquiry-"+id).addClass("active");
                openEnquiry(id);
            }); 

            $('body').on('click','.read-more',function () {
                $('#msg-expand').removeClass('msg-expand-main');
                $('#msg-expand').addClass('msg-less-main');
                $('.read-more').hide();
                $('.read-less').show();
                $("ul.all-bid-ul").css("height", "calc(100vh - 646px)");
            });

            $('body').on('click','.read-less',function () {
                $('#msg-expand').addClass('msg-expand-main');
                $('#msg-expand').removeClass('msg-less-main');
                $('.read-more').show();
                $('.read-less').hide();
                $("ul.all-bid-ul").css("height", "calc(100vh - 369px)");
            });
 

            $('body').on('click','.cross',function () {
                $('.questions-ask').hide('300');
                $('.scnd-section-main').addClass('col-md-9');
                $('.scnd-section-main').removeClass('col-md-6');
                $('.question-asked').show();
            });

            $('body').on('click','.question-asked',function () {
                $('.questions-ask').show('300');
                $('.scnd-section-main').removeClass('col-md-9');
                $('.scnd-section-main').addClass('col-md-6');
                $('.question-asked').hide();
            });

            $('body').on('click','#change-date',function () {
                var id = $(this).data('id');
                $('#enquiry_id').val(id);
                $('#change-date-model').modal('show');
            });
            
            $('body').on('click','.close, .cancel-change',function () {
                $('#change-date-model').modal('hide');
                $('#answer-question').modal('hide');
            });

            $('body').on('click','.report',function () {
                 var category = $(this).data('category');
                 var type = $(this).data('type');
                 var enquiry_id = $(this).data('enquiry_id');
                 var question_id = $(this).data('question_id');
                 var reportAction = "{{ route('procurement.report') }}";
                 axios.post(reportAction, {category:category,type:type,enquiry_id:enquiry_id,question_id:question_id})
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
                    })
                    .catch((error) => { 
                    // Handle error response
                    console.log(error);
                    });
            });

            $('body').on('click','.respond',function () {
                var id = $(this).data('id');
                var question = $(this).data('question');
                var answer = $(this).data('answer');
                $('#faq_id').val(id);
                $('#question').text(question);
                $('#answer').text(answer);
                $('#answer-question').modal('show');
            });

            $('body').on('click','.skip',function () {
                var skipFaqAction = $('#skip-faq-url').val();
                var id = $(this).data('id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "Do you want to skip this question!",
                    icon: 'warning',
                    showCancelButton: true,
                }).then(function (willUpdate) {
                    if (willUpdate.isConfirmed === true) {
                        axios.post(skipFaqAction, {id:id})
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
                                openEnquiry(response.data.faq.enquiry_id);
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

            $('body').on('click','#save-date-change',function () {
                var changeExpiryAction = $('#change-date-url').val();
                var expire_at = $('#expire_at').val();
                var id = $('#enquiry_id').val();
                axios.post(changeExpiryAction, {id:id, expire_at : expire_at})
                    .then((response) => {
                    // Handle success response
                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: "Updated",
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
                        openEnquiry(id);
                        $('#change-date-model').modal('hide');
                    })
                    .catch((error) => { 
                        // Handle error response
                        // console.log(error);
                        if (error.response.status == 422) {
                            $.each(error.response.data.errors, function(field, errors) {
                                var input = $('input[name="' + field + '"]');
                                input.addClass('red-border');
                                var feedback = input.siblings('.invalid-msg2');
                                feedback.text(errors[0]).show();
                            });
                        }   
                        else{
                            openEnquiry(id);
                            $('#change-date-model').modal('hide');
                        }   
                        
                    });
            });


            $('body').on('click','#save-answer',function () {
                var answerFaqAction = $('#answer-faq-url').val();
                var answer = $('#answer').val();
                var id = $('#faq_id').val();
                axios.post(answerFaqAction, {id:id, answer : answer})
                    .then((response) => {
                        // Handle success response
                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: "Updated",
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
                        openEnquiry(response.data.faq.enquiry_id);
                        $('#answer-question').modal('hide');
                    })
                    .catch((error) => { 
                        // Handle error response
                        if (error.response.status == 422) {
                            $.each(error.response.data.errors, function(field, errors) {
                                var textarea = $('textarea[name="' + field + '"]');
                                textarea.addClass('red-border');
                                var textareafeedback = textarea.siblings('.invalid-msg2');
                                textareafeedback.text(errors[0]).show();
                            });
                        }      
                    });
            });

            $('body').on('click','.bid-detail',function () {
                $('.bid-open').empty();
                $('.bid-tap, .questions-ask').hide('500');
                $('.bid-open').show('500');

                $('.scnd-section-main').removeClass('col-md-9');
                $('.scnd-section-main').addClass('col-md-6');
                var reply_id = $(this).data('reply_id');
                var readReplyAction = "{{ route('procurement.readReply') }}";
                axios.post(readReplyAction, {reply_id:reply_id})
                    .then((response) => {
                        var reply = response.data.reply;
                                $('.bid-open').append(`<div class="bid-detail-head">
                                    <div class="d-flex">
                                        <h1>${reply.sender_company.name}</h1>
                                        <span class="verified">Verified</span>
                                    </div>
                                    <div class="d-flex date-status">
                                        Date <h2>${reply.created_at}</h2> <span class="status">${reply.status_text}</span>
                                    </div>
                                    <div class="d-flex mt-3 justify-content-between">
                                    
                                        <div class="add-hold-btn d-flex">
                                        ${reply.status == 0 ? `
                                            <a href="#" class="add-shortlist" data-reply_id="${reply.id}">Add to Shortlist</a>
                                            <a href="#" class="hold-btn" data-toggle="modal" data-target="#hold-popup">Hold</a>
                                            ` : ``}
                                        </div>

                                        <div class="dropdown">
                                            <button onclick="myFunction()" class="dropbtn">Report</button>
                                            <div id="myDropdown" class="dropdown-content">
                                                <a href="#" class="report" data-category="reply" data-type="Spam" data-enquiry_id="${reply.enquiry_id}" data-question_id="${reply.id}">Spam</a>
                                                <a href="#" class="report" data-category="reply" data-type="Illegal activity" data-enquiry_id="${reply.enquiry_id}" data-question_id="${reply.id}">Illegal activity</a>
                                                <a href="#" class="report" data-category="reply" data-type="Advertisement" data-enquiry_id="${reply.enquiry_id}" data-question_id="${reply.id}">Advertisement</a>
                                                <a href="#" class="report" data-category="reply" data-type="Cyberbullying" data-enquiry_id="${reply.enquiry_id}" data-question_id="${reply.id}">Cyberbullying</a>
                                            </div>
                                        </div>

                                    </div>
                                    <a href="#" class="cross-second"></a>
                                </div>

                                <div class="bid-detail-content">
                                    <pre>${reply.body}</pre>

                                    <h1 class="mt-2">${reply.attachments.length != 0 ? 'Attachments' : '' }</h1>
                                    <div class="d-flex flex-wrap align-items-center reply-attachments">
                                       
                                    </div>

                                </div>`);

                                reply.attachments.forEach(function(attachment) {
                                $('.reply-attachments').append(`<span class="d-flex doc-preview align-items-center justify-content-between mb-2 attachmets-list">
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
                        
                    });
            });

            $('body').on('click','.cross-second',function () {
                $('.bid-tap, .questions-ask').show('300');
                $('.bid-open').hide('300');
            });

            $('body').on('click','.add-shortlist',function() {
                var reply_id = $(this).data('reply_id');
                var shortlistAction = "{{ route('procurement.shortlist') }}";
                Swal.fire({
                    title: "Are you sure?",
                    text: "Do you want to shortlist this bid!",
                    icon: 'warning',
                    showCancelButton: true,
                }).then(function (willUpdate) {
                    if (willUpdate.isConfirmed === true) {
                        axios.post(shortlistAction, {reply_id:reply_id})
                            .then((response) => {
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
                                        openEnquiry(response.data.reply.enquiry_id);
                                        $('.bid-tap, .questions-ask').show('300');
                                        $('.bid-open').hide('300');
                            })
                            .catch((error) => { 
                                // Handle error response
                                
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
                    $('#all_replies_list').empty();
                    $('#shortlisted_list').empty();
                    $('.bid-open').empty();
                    $('#open-count').text(enquiry.open_faqs.length);
                    $('#closed-count').text(enquiry.closed_faqs.length);
                    $('#pending-count').text(enquiry.pending_replies.length);
                    var content = `<div class="mid-second-sec">
                            <div class="d-flex w-100 justify-content-between">
                                <h2>${enquiry.subject}</h2>
                                <small class="created-date"><span>Created on:</span><br>${enquiry.created_at}</small>
                                <a href="#" class="question-asked">Questions Asked</a>
                            </div>
                            <h3>Quote For: ${enquiry.sender.name}, ${enquiry.sender.designation}, ${enquiry.sender.company.name} </h3>
                            <div class="position-relative msg-expand-main" id="msg-expand">
                                <pre>${enquiry.body}</pre>
                                <h1 class="mt-2">${enquiry.attachments.length != 0 ? 'Attachments' : '' }</h1>
                                <div class="d-flex flex-column align-items-left float-start mt-2 attachments">
                            
                                </div>
                                <a href="#" class="read-more">Read More</a>
                                <a href="#" class="read-less">Read Less</a>
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

                    var ribbon = `<div class="completed-screening d-flex align-items-center">
                                        <small>Completed<br>Screening</small>
                                        <h1><span class="green">${enquiry.action_count}</span><span class="grey">/</span>${enquiry.reply_count}</h1>
                                  </div>

                                  <div class="completed-screening d-flex align-items-center">
                                     <small>Accepted<br>Bids till</small>
                                     <h1>${enquiry.expiry.day}</h1>
                                     <small class="date">${enquiry.expiry.month}<br>${enquiry.expiry.year}</small>
                                     <a href="#" id="change-date" data-id="${enquiry.id}" class="edit-ico"></a>
                                 </div>
                                 <div class="completed-screening d-flex align-items-center">
                                       <a href="#" class="share-btn" data-toggle="modal" data-target="#share-popup">Share</a>
                                 </div>`;
                    $('#quote-options').append(ribbon); 

                    enquiry.pending_replies.forEach(function(pending) {
                        $('#notify').append(`<li>
                                            New Bid request from ${pending.sender_company.name}
                                            <span class="time"> ${pending.created_time}</span>
                                        </li>`);
                    });

                    $('.question-asked').hide();

                        enquiry.open_faqs.forEach(function(open_faq) {
                            $('#open').append(`<div class="open-close-list">
                                <h1>${open_faq.question}</h1>
                                <small class="bid-date">${open_faq.created_at}</small>
                                <div class="d-flex w-100 justify-content-between">
                                    <div class="respo-skip-btn">
                                    ${open_faq.status === 0 ?
                                        `<a href="#" class="respond" data-id="${open_faq.id}" data-question="${open_faq.question}">Respond</a>
                                         <a href="#" class="skip" data-id="${open_faq.id}">Skip</a>` :
                                        `<span class="skiped-status">Skipped</span>`
                                    }
                                    </div>
                                    <div class="dropdown">
                                        <button onclick="myFunction()" class="dropbtn">Report</button>
                                        <div id="myDropdown" class="dropdown-content">
                                            <a href="#" class="report" data-category="question" data-type="Spam" data-enquiry_id="${enquiry.id}" data-question_id="${open_faq.id}">Spam</a>
                                            <a href="#" class="report" data-category="question" data-type="Illegal activity" data-enquiry_id="${enquiry.id}" data-question_id="${open_faq.id}">Illegal activity</a>
                                            <a href="#" class="report" data-category="question" data-type="Advertisement" data-enquiry_id="${enquiry.id}" data-question_id="${open_faq.id}">Advertisement</a>
                                            <a href="#" class="report" data-category="question" data-type="Cyberbullying" data-enquiry_id="${enquiry.id}" data-question_id="${open_faq.id}">Cyberbullying</a>
                                        </div>
                                    </div>
                                </div>
                            </div>`);
                        });

                        enquiry.closed_faqs.forEach(function(open_faq) {
                            $('#closed').append(`<div class="open-close-list">
                                <h1>${open_faq.question}</h1>
                                <small class="bid-date">${open_faq.created_at}</small>
                                <div class="colsed-description">
                                    ${open_faq.answer}
                                    <span>You Answered on ${open_faq.answered_at}</span>
                                </div>
                                <a href="#" class="respond" data-id="${open_faq.id}" data-question="${open_faq.question}" data-answer="${open_faq.answer}">Edit Response</a>
                            </div>`);
                        });

                        /* All Bids Starts */
                        enquiry.all_replies.forEach(function(all_reply) {
                            $('#all_replies_list').append(`<li>
                                    <div class="row all-bid-list d-flex align-items-center justify-content-center">
                                        <div class="col-md-6">
                                            <a href="#" class="bid-detail" data-reply_id="${all_reply.id}">${all_reply.sender_company.name}</a>
                                            <p>${all_reply.body}</p>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="date">${all_reply.created_at}</span></div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="status-${all_reply.status_color}">${all_reply.status_text}</span></div>
                                    </div>
                                </li>`);
                        });
                        /* All Bids Ends */

                        /* Shortlisted Starts */
                        enquiry.shortlisted.forEach(function(shortlist) {
                            $('#shortlisted_list').append(`<li>
                                    <div class="row all-bid-list d-flex align-items-center justify-content-center">
                                        <div class="col-md-6">
                                            <a href="#" class="bid-detail" data-reply_id="${shortlist.id}">${shortlist.sender_company.name}</a>
                                            <p>${shortlist.body}</p>
                                        </div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="date">${shortlist.created_at}</span></div>
                                        <div class="col-md-3 d-flex align-items-center justify-content-center"><span
                                                class="status-${shortlist.status_color}">${shortlist.status_text}</span></div>
                                    </div>
                                </li>`);
                        });
                        /* Shortlisted Ends */
                 })
                 .catch((error) => { 
                    // Handle error response
                    console.log(error);
                 });
        }

        function loadBidInboxList(){
            var fetchSendItemsAction = "{{ route('procurement.fetchAllEnquiries') }}";
            var mode_filter = $('#mode_filter option:selected').val();
            var keyword = $('#keyword').val();
            axios.post(fetchSendItemsAction, {mode_filter:mode_filter, keyword:keyword})
                 .then((response) => {
                    // Handle success response
                    if(response.data.status === true){
                        let enquiries = response.data.enquiries;
                        $('#inbox-list').empty();
                        enquiries.forEach(function(enquiry) {
                            var content = `<a id="enquiry-${enquiry.id}" href="#" data-id="${enquiry.id}" class="list-group-item list-group-item-action flex-column align-items-start enquiry_item">
                                                <div class="list-item-inner blue-border">
                                                    <h2 class="mb-2 round-bullet">${enquiry.reference_no}</h2>
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h3>${enquiry.subject}</h3>
                                                        <small class="bid-count d-flex align-items-center justify-content-center">${enquiry.reply_count}</small>
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

        

        
    </script>     
    
@endpush
 
@endsection    