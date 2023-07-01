@extends('sales.layouts.app')
@section('content')
    <!-- Header Starts -->
    @include('sales.layouts.header')
    <!-- Header Ends -->

    <!-- Main Content Starts -->
    <section class="container-fluid pleft-56">
        <div class="row">
            <div class="col-md-3 pr-0 bid-tap">
                <div class="bid-inbox">
                    <div class="bid-header d-flex align-items-center">
                        <h1 class="mr-auto">Replied</h1>
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

                    <div id="replied-list" class="list-group">

                    </div>
                </div>

            </div>

            
            <div id="quote-content" class="col-md-6 pl-0 reply-msg-white-bg4" style="display: block;">



            </div>

            

            <div class="col-md-3 pl-0 questions-ask">
                <div class="last-sec-main">
                    <div class="last-sec-main-inner">
                        <div class="d-flex justify-content-between last-sec-header">
                            <h1>Questions Asked</h1>
                        </div>

                        <div class="d-flex w-100 justify-content-between b-bottom">
                            <!-- Tabs navs -->
                            <ul class="nav nav-tabs tab mb-2" role="tablist2">
                                <li class="nav-item">
                                    <a class="nav-link tablinks2 active" onclick="openCity2(event, 'open')">All</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tablinks2" onclick="openCity2(event, 'closed')">My Questions</a>
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
    <!-- Main Content Ends -->

    @push('scripts')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $( function() {

        loadRepliedList();


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

        $('body').on('keyup','#keyword',function(){
            loadRepliedList();
        });

        $('body').on('change','#mode_filter',function(){
            loadRepliedList();
        });

        $('body').on('click','.enquiry_item',function(){
            var id = $(this).data('id');
            $('.enquiry_item').removeClass("active");
            $("#enquiry-"+id).addClass("active");
            openEnquiry(id);
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

    });


    function loadRepliedList(){
            var fetchReceivedItemsAction = "{{ route('sales.replied.fetchAllEnquiries') }}";
            var mode_filter = $('#mode_filter option:selected').val();
            var keyword = $('#keyword').val();
            axios.post(fetchReceivedItemsAction, {mode_filter:mode_filter, keyword:keyword})
                 .then((response) => {
                    // Handle success response
                    if(response.data.status === true){
                        let enquiries = response.data.enquiries;
                        $('#replied-list').empty();
                        enquiries.forEach(function(enquiry) {
                            var content = `<a id="enquiry-${enquiry.id}" href="#" data-id="${enquiry.id}" class="list-group-item list-group-item-action flex-column align-items-start enquiry_item">
                                                <div class="list-item-inner blue-border">
                                                    <h2 class="mb-2 round-bullet">${enquiry.category}</h2>
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h3>${enquiry.company}</h3>
                                                        
                                                    </div>
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <div>
                                                            <small class="bid-date">Posted: ${enquiry.date}</small>
                                                            <small class="bid-date">Expiry: ${enquiry.expiry_date}</small>
                                                        </div>
                                                        <small class="bid-hours">${enquiry.expire_in}</small>
                                                    </div>
                                                </div>
                                            </a>`;
                            $('#replied-list').append(content);
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
            var fetchEnquiryAction = "{{ route('sales.replied.fetchEnquiry') }}";
            axios.post(fetchEnquiryAction, {id:id})
                 .then((response) => {
                    // Handle success response
                    let enquiry = response.data.enquiry;
                    $('#quote-content').empty();
                    $('#open').empty();
                    $('#closed').empty();
                    var content = `<div class="bid-detail-head reply-msg-white-bg">
                                            <div class="d-flex justify-content-between">
                                                <h1>${enquiry.sender.company.name}</h1>
                                                <div class="d-flex date-status">${enquiry.reply.created_at}</div>
                                            </div>
                                            <div class="d-flex date-status justify-content-between mt-2">
                                                <div class="d-flex">Date <h2>Date : ${enquiry.created_date} | Time: ${enquiry.created_time}</h2></div>
                                            </div>
                                        </div>
                                        <div class="bid-detail-content reply-msg-white-bg3">
                                            <pre>${enquiry.reply.body}</pre>
                                        </div>
                                        <div class="bid-detail-content reply-msg-white-bg3 mt-2">
                                            <div class="d-flex justify-content-between">
                                                <h3 class="mb-3">
                                                    Country : ${enquiry.country}<br>
                                                    Region : ${enquiry.region}<br>
                                                    Reference No : ${enquiry.reference_no}
                                                </h3>
                                            <div>
                                            <div class="d-flex date-status justify-content-end">
                                                Expiry:<h2>${enquiry.expire_at}</h2>
                                            </div>
                                            <div class="dropdown">
                                                <button onclick="myFunction()" class="dropbtn">Report</button>
                                                <div id="myDropdown" class="dropdown-content">
                                                    <a href="#" class="report" data-category="quote-request" data-type="Spam" data-enquiry_id="${enquiry.id}">Spam</a>
                                                    <a href="#" class="report" data-category="quote-request" data-type="Illegal activity" data-enquiry_id="${enquiry.id}" >Illegal activity</a>
                                                    <a href="#" class="report" data-category="quote-request" data-type="Advertisement" data-enquiry_id="${enquiry.id}" >Advertisement</a>
                                                    <a href="#" class="report" data-category="quote-request" data-type="Cyberbullying" data-enquiry_id="${enquiry.id}" >Cyberbullying</a>
                                                </div>
                                            </div>
                                            <span class="verified">Verified</span>
                                        </div>
                                    </div>
                                    ${enquiry.body}
                                    <div class="d-flex justify-content-end">
                                    
                                    </div>`;
                    $('#quote-content').append(content);  
                    
                    enquiry.attachments.forEach(function(attachment) {
                    $('.attachments').append(`<span class="d-flex doc-preview align-items-center justify-content-between mb-2">
                                                    ${attachment.file_name}
                                                    <div class="d-flex align-items-center">
                                                        <a id="attachmets-list" href="{{ config('setup.application_url') }}${attachment.path}" class="doc-preview-view" target="_blank"></a>
                                                        <a id="attachmets-list" href="{{ config('setup.application_url') }}${attachment.path}" class="" download>D</a>
                                                    </div>
                                                </span>`);
                    });  


                    enquiry.all_faqs.forEach(function(all_faq) {
                            $('#open').append(`<div class="open-close-list">
                                <h1>${all_faq.question}</h1>
                                <h3>${all_faq.created_by}</h3>
                                <small class="bid-date">${all_faq.created_at}</small>
                                <div class="colsed-description" ${!all_faq.answer ? 'hidden' : ''}>
                                    ${all_faq.answer}
                                </div>
                            </div>`);
                        });

                        enquiry.my_faqs.forEach(function(my_faq) {
                            $('#closed').append(`<div class="open-close-list">
                                    <h1>${my_faq.question}</h1>
                                    <small class="bid-date">${my_faq.created_at}</small>
                                    <div class="colsed-description" ${!my_faq.answer ? 'hidden' : ''}>
                                        ${my_faq.answer}
                                    </div>
                                </div>`);
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