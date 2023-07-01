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