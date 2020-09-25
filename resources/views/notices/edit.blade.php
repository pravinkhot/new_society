<input type="hidden" name="noticeId" id="noticeId" class="noticeId" value="{{ $noticeDetail->id }}">
<form id="edit_notice_form" class="col s12 edit_notice_form" method="POST" action="#" data-action="update" data-module="notice" data-url="notices/{{ $noticeDetail->id }}">
    @method('PUT')
    <div id="editNoticeModal" class="modal">
        <div class="modal-content">
            <div class="row">
                <div class="input-field mt-0 col s12 form-title">
                    <h5>Update Notice Information</h5>
                    <div>
                        <button type="submit" class="btn btn-small indigo accent-3 ladda-button" data-style="zoom-in">
                            <i class="fa fa-save"></i>
                            Save Changes
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
                            <input type="text" id="title" name="title" value="{{ $noticeDetail->title }}">
                            <label for="title">Notice Title *</label>
                        </div>

                        <div class="col l6 m6 s12 display-inline mt-2">
                            <label>Notice Type *</label><br/>
                            <label>
                                <input type="radio" value="Announcement" name="type"
                                        {{ ($noticeDetail->type === 'Announcement') ? 'checked' : '' }}>
                                <span>Announcement</span>
                            </label>
                            <label>
                                <input type="radio" value="Proposal" name="type"
                                        {{ ($noticeDetail->type === 'Proposal') ? 'checked' : '' }}>
                                <span>Proposal</span>
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col l6 m6 s12">
                            <input class="datepicker" type="text" id="end_date" name="end_date" value="{{ $noticeDetail->end_date }}">
                            <label for="end_date">Notice Valid Until *</label>
                        </div>

                        <div class="col l6 m6 s12">
                            <label>Document *</label><br/>
                            <input type="file" name="document" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col l12 m12 s12">
                            <textarea id="description" class="materialize-textarea" name="description">{{ $noticeDetail->description }}</textarea>
                            <label for="description">Description</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
