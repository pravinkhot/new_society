<form id="create_notice_form" class="col s12 create_notice_form" method="POST" action="#">
    <div id="createNoticeModal" class="modal">
        <div class="modal-content">
            <h4 class="center-align mb-2">Create Notice</h4>
            <div class="row">
                <div class="col l12 m12 s12">
                    <div class="row">
                        <div class="input-field col l4 m4 s12">
                            <input type="text" id="title" name="title">
                            <label for="title">Notice Title *</label>
                        </div>

                        <div class="col l4 m4 s12 display-inline mt-2">
                            <label>Notice Type *</label></br>
                            <label>
                                <input type="radio" value="Announcement" name="type" checked="">
                                <span>Announcement</span>
                            </label>
                            <label>
                                <input type="radio" value="Proposal" name="type">
                                <span>Proposal</span>
                            </label>
                        </div>

                        <div class="input-field col l4 m4 s12">
                            <input class="datepicker" type="text" id="end_date" name="end_date">
                            <label for="end_date">Notice Valid Until *</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="file-field input-field col l6 m6 s12">
                            <div class="btn waves-effect waves-light btn-small">
                                <span>Document</span>
                                <input type="file" name="document">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" readonly="">
                            </div>
                        </div>

                        <div class="input-field col l6 m6 s12">
                            <textarea id="description" class="materialize-textarea" name="description"></textarea>
                            <label for="description">Description</label>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="input-field col l6 m6 s12 right-align right">
                    <a href="#!" class="modal-close btn">Close</a>
                    <button type="submit" class="btn cyan waves-effect waves-light ladda-button" data-style="zoom-in">
                        Submit
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>