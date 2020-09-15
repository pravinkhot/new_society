<div id="createEditWingModal" class="modal modal-sm">
    <div class="modal-content">
        <form id="editWingForm" class="col s12 editWingForm" data-action="update" data-module="wing" data-url="wings/{{ $wingDetail->id }}" method="POST" action="#">
            @method('PUT')
            <div class="row">
                <div class="input-field mt-0 col s12 form-title">
                    <h5>Update Wing Information</h5>
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
                <div class="input-field col l12 m12 s12">
                    <input type="text" id="name" name="name" value="{{ $wingDetail->name }}" />
                    <label for="name">Name *</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col l12 m12 s12">
                    <textarea id="description" class="materialize-textarea" name="description" rows="3">{{ $wingDetail->description }}</textarea>
                    <label for="description">Description</label>
                </div>
            </div>
        </form>
    </div>
</div>
