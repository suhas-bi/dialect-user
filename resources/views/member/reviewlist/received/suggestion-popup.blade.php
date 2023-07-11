<div class="modal fade" id="add-comments" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="exampleModalLongTitle">Add Comment</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
                <input type="hidden" id="add-comment-id" name="reply_id" />
                <div class="col-md-12 common-popup position-relative">
                    <label>Comment</label>
                    <textarea id="comment" name="comment" class="comment"></textarea>
                    <div class="invalid-msg2"></div>
                </div>
            </div>
            <div class="modal-footer model-footer-padd">
                <div class="d-flex justify-content-end">
                    <div class="form-group proceed-btn">
                        <button type="button" class="btn btn-third close">Cancel</button>
                    </div>
                    <div class="form-group proceed-btn">
                        <input id="save-comment" type="button" value="Save" class="btn btn-secondary">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>