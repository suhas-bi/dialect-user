 <!-- Modal -->
 <div class="modal fade" id="hold-popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLongTitle">Hold</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body row">
                    <div class="col-md-12 common-popup position-relative">
                        <input id="reply_id" type="hidden" name="reply_id" class="form-control">
                        <label>Remarks <span class="mandatory">*</span></label>
                        <textarea class="form-control" id="reason" name="reason" rows="3" maxlength="100"></textarea>
                        <div class="invalid-msg2"></div>
                    </div>
                </div>
                <div class="modal-footer model-footer-padd">
                    <div class="d-flex justify-content-end">
                        <div class="form-group proceed-btn">
                            <button type="button" class="btn btn-third cancel-change" data-dismiss="modal">Cancel</button>
                        </div>

                        <div class="form-group proceed-btn">
                            <input id="add-hold" type="button" value="Submit" class="btn btn-secondary">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>