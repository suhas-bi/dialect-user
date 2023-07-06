<div class="modal fade" id="recall-share-popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLongTitle">Recall Share</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0 row">
                <div class="col-md-12 common-popup">
                    <p class="recall-cont">You have shared this request with <a href="#" id="sender-email"></a> on <span id="share_date"></span>. With <span id="share_priority"></span> Priority.</p>
                    <label>Shared Enquiry</label>
                    <div class="sharing-content">
                        <span id="reference_no" class="share-cntent-id"></span>
                        <p id="subject"></p>
                        <span id="enquiry_date" class="date"></span>
                    </div>
                    <div class="row">
                        <input type="hidden" id="recall_enquiry_id" name="enquiry_id" />
                        <div class="col-md-12 position-relative">
                            <label>Recall Comments</label>
                            <textarea name="comments" class="form-control" placeholder="Comments" id="comments" rows="3"></textarea>
                            <div class="invalid-msg2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer model-footer-padd">
                <div class="d-flex justify-content-end">
                    <div class="form-group proceed-btn">
                        <button type="button" class="btn btn-third close">Cancel</button>
                    </div>

                    <div class="form-group proceed-btn">
                        <input id="recall-btn" type="button" value="Recall" data-dismiss="modal" data-toggle="modal" data-target="#recall-sure" class="btn btn-secondary">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>