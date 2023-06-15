@extends('procurement.layouts.app')
@section('content')
    <!-- Header Starts -->
    @include('procurement.layouts.header')
    <!-- Header Ends -->

    <!-- Main Content -->
    <section class="container-fluid pleft-56">
        <div class="row">
            <!-- Draft List Starts -->
            <div class="col-md-3 pr-0 bid-tap">
                <div class="bid-inbox">
                    <div class="review-list-header d-flex align-items-center">
                        <h1 class="mr-auto">Draft</h1>
                    </div>
                    <div class="draft-list-group">
                        @forelse($drafts as $key => $draft)
                        <a href="#" id="draft-{{ $draft->id }}" class="list-group-item2 list-group-item-action flex-column align-items-start draft_item" data-id="{{ $draft->id }}">
                            <div class="list-item-inner">
                                <div class="d-flex w-100 justify-content-between">
                                    <h3>{{ substr($draft->subject ?? 'No Subject',0,40).'...'  }}</h3>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <small class="bid-date2"> {{ \Carbon\Carbon::parse($draft->updated_at)->format('d F, Y') }}</small>
                                </div>
                            </div>
                        </a>
                        @empty
                        <a href="#" class="list-group-item2 list-group-item-action flex-column align-items-start">
                            <div class="list-item-inner">
                                <div class="d-flex w-100 justify-content-between">
                                    <h3>No Data Found</h3>
                                </div>
                            </div>
                        </a>
                        @endforelse

                    </div>

                </div>

            </div>

            <!-- Draft List Ends -->

            <!-- Draft Content Starts -->
            <div id="draft-content" class="col-md-9 pl-0 pr-0 scnd-section-main">
                
            </div>
            <!-- Draft Content Ends -->

        </div>
    </section>
    <!-- Main Content Ends -->
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script>
    $( function() {
        var id = $('.draft_item').data('id');
        $("#draft-"+id).addClass("active");
        openDraft(id);

        $('body').on('click','.draft_item',function(){
            var id = $(this).data('id');
            $('.draft_item').removeClass("active");
            $("#draft-"+id).addClass("active");
            openDraft(id);
        });

        $('body').on('click','#discard',function(){
             var action = $(this).data('url');
             var id = $(this).data('id');
             Swal.fire({
                title: "Are you sure?",
                text: "Draft will be discarded!",
                icon: 'warning',
                showCancelButton: true,
            }).then(function (willDelete) {
                if (willDelete.isConfirmed === true) {
                    axios.post(action, {id:id})
                        .then((response) => {
                            Swal.fire({
                                toast: true, 
                                icon: 'success',
                                title: "Quote has been discarded!",
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
                            window.location.reload();
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                }
            });
        });

    });

    function openDraft(id){
        var draftAction = "{{ route('procurement.openDraft') }}";
        axios.post(draftAction, {id:id})
        .then((response) => {
        // Handle success response
            if(response.data.status === true){
                var draft = response.data.data;
                let subject = !draft.subject ? 'No Subject' : draft.subject;
                var content = `
                <div class="mid-sec-main">
                    <div class="mid-second-sec d-flex justify-content-between bg-white">
                        <div class="">
                            <div class="w-100">
                                <h2>${subject.substr(0,40)}</h2>
                                <small class="created-date"><span>Created on: </span>${ moment(draft.updated_at).format('Do MMMM, YYYY') }</small>
                                <small class="created-date ms-4"><span>Bids accepted till: </span>${ !draft.expired_at ? 'NA' : moment(draft.expired_at).format('Do MMMM, YYYY') }</small>
                            </div>
                           
                            <div class="d-flex mt-2">
                                <h3> ${draft.sub_category.name} </h3>
                            </div>

                            

                        </div>

                        <div class="d-flex mt-4">
                            <div class="form-group proceed-btn">
                                <input id="discard" type="button" value="Discard" class="btn btn-third"
                                    data-id="${draft.id}" data-url="{{ route('procurement.discardDraft') }}">
                            </div>

                            <div class="form-group proceed-btn">
                                <a href="/procurement/quote/compose/${draft.id}" class="btn btn-secondary">Proceed</a>
                            </div>
                        </div>

                    </div>

                    <div class="bid-detail-content">
                        <pre>${!draft.body ? '' : draft.body }</pre>
                        <h1 class="mt-2">${draft.attachments.length != 0 ? 'Attachments' : '' }</h1>
                        <div class="d-flex flex-column align-items-left float-start attachments">
                            
                        </div>

                    </div>

                </div>
                `;
                $('#draft-content').empty();
                $('#draft-content').append(content);
                draft.attachments.forEach(function(attachment) {
                    $('.attachments').append(`<span class="d-flex doc-preview align-items-center justify-content-between mb-2">
                                                    ${attachment.file_name}
                                                    <div class="d-flex align-items-center">
                                                        <a id="doc-preview-link" href="{{ config('setup.application_url') }}${attachment.path}" class="doc-preview-view" target="_blank"></a>
                                                    </div>
                                                </span>`);
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