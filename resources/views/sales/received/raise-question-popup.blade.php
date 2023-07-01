<div class="modal fade" id="raise-question-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="" method="post">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLongTitle">Raise Question</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body row">
                        <input id="enquiry_id" name="enquiry_id" type="hidden" />
                        <div class="col-md-12 common-popup position-relative">
                            <label>Question</label>
                            <textarea id="question" name="question" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            <div class="invalid-msg2"></div>
                        </div>
                    </div>
                    <div class="modal-footer model-footer-padd">
                        <div class="d-flex justify-content-end">
                            <div class="form-group proceed-btn">
                                <button type="button" class="btn btn-third cancel-change" data-dismiss="modal">Cancel</button>
                            </div>

                            <div class="form-group proceed-btn">
                                <input id="save-question" type="button" value="Submit" class="btn btn-secondary">
                            </div>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>