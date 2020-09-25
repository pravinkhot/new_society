<form id="create_notice_form" class="col s12 create_notice_form" data-action="create" data-module="notice" data-url="notices" method="POST" action="#">
    <div id="createNoticeModal" class="modal">
        <div class="modal-content">
            <div class="row">
                <div class="input-field mt-0 col s12 form-title">
                    <h5>Create New Notice</h5>
                    <div>
                        <button type="submit" class="btn btn-small indigo accent-3 ladda-button" data-style="zoom-in">
                            <i class="fa fa-plus"></i> Create
                        </button>

                        <button type="button" class="btn btn-small red accent-3 modal-close">
                            <i class="fa fa-close"></i> Cancel
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col l12 m12 s12">
                    <div class="row">
                        <div class="input-field col l6 m6 s12">
                            <input type="text" id="title" name="title">
                            <label for="title">Notice Title *</label>
                        </div>

                        <div class="col l6 m6 s12 display-inline mt-2">
                            <label>Notice Type *</label><br/>
                            <label>
                                <input type="radio" value="Announcement" name="type" checked="">
                                <span>Announcement</span>
                            </label>
                            <label>
                                <input type="radio" value="Proposal" name="type">
                                <span>Proposal</span>
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col l6 m6 s12">
                            <input class="datepicker" type="text" id="end_date" name="end_date" />
                            <label for="end_date">Notice Valid Until *</label>
                        </div>

                        <div class="col l6 m6 s12 display-inline mt-2">
                            <label>Document *</label><br/>
                            <input type="file" name="document" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col l12 m12 s12">
                            <textarea id="description" class="materialize-textarea" name="description" rows="20" cols="20"></textarea>
                            <label for="description">Description</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
