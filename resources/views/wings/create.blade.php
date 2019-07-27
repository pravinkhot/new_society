<!-- Start Add wing Modal -->
<div class="modal fade" id="createWingModal" tabindex="-1" role="dialog" aria-labelledby="createWingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form method="#" action="#" id="createWingModalForm" class="createWingModalForm">
                <div class="modal-header">
                    <h4 class="modal-title">Add Wing</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">Name <span class="text-danger">*</span></label>
                        <div class="col-12 col-sm-8 col-md-8 col-lg-8">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-12 col-sm-3 col-md-3 col-lg-3 col-form-label">Description</label>
                        <div class="col-12 col-sm-8 col-md-8 col-lg-8">
                            <div class="form-group">
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-danger mr-1" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ladda-button" data-style="zoom-in">
                        Submit
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Add wing Modal -->