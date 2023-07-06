<div class="modal fade" id="share-popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLongTitle">Share</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body row">
                <div class="col-md-12 common-popup">
                    <label>Selected Enquiry for sharing</label>
                    <input type="hidden" id="id" name="id" value="" />
                    <div class="sharing-content">
                        <span id="reference_no" class="share-cntent-id"></span>
                        <p id="subject"></p>
                        <span id="enquiry_date" class="date"></span>
                    </div>

                    <div class="row">
                        <div class="col-md-7 ">
                            <label>Select User <span class="mandatory">*</span></label>
                            <div class="select-drop position-relative">
                                <select id="standard-select" name="shared_to" class="shared_to">
                                    <option value=" ">Select Team Member</option>
                                    @foreach($members as $key => $member)
                                    <option value="{{ $member->id }}">{{ $member->name }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            <small id="shared_to_error" class="text-danger"></small>
                        </div>
                        <div class="col-md-5">
                            <label>Set Priority <span class="mandatory">*</span></label>
                            <div class="select-drop  position-relative">
                                <select id="standard-select" name="share_priority" class="share_priority">
                                    <option value=" ">Set Priority</option>
                                    <option value="1">Low (SLA: 5 Days)</option>
                                    <option value="2">Medium (SLA: 2 Days)</option>
                                    <option value="3">High (SLA: 1 Day)</option>
                                </select>
                                
                            </div>
                            <small id="share_priority_error" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="bottom-msg">
                        <!-- <span class="text-danger">Unfortunately, the email address 'sajielco@gmail.com' is not
                            associated with an active
                            user.</span> <span>Please add them as a new team user in</span> <a href="#">Team
                            settings.</a> -->
                    </div>
                </div>
            </div>
            <div class="modal-footer model-footer-padd">
                <div class="d-flex justify-content-end">
                    <div class="form-group proceed-btn">
                        <button type="button" class="btn btn-third cancel-change">Cancel</button>
                    </div>

                    <div class="form-group proceed-btn">
                        <input id="save-share" type="button" value="Share" class="btn btn-secondary">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>