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