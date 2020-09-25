<form id="create_service_form" class="col s12 create_service_form" method="POST" action="#" data-action="create" data-module="service" data-url="services">
    <div id="createServiceModal" class="modal">
        <div class="modal-content">
            <div class="row">
                <div class="input-field mt-0 col s12 form-title">
                    <h5>Create New Service</h5>
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
                <div class="input-field col l4 m4 s12">
                    <input type="text" id="name" name="name">
                    <label for="name">Service Name *</label>
                </div>

                <div class="input-field col l4 m4 s12">
                    <input type="text" id="provider_name" name="provider_name">
                    <label for="provider_name">Provider Name *</label>
                </div>

                <div class="input-field col l4 m4 s12">
                    <input type="text" id="mobile_no" name="mobile_no">
                    <label for="mobile_no">Mobile Number *</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col l4 m4 s12">
                    <input type="text" id="alternate_mobile_no" name="alternate_mobile_no">
                    <label for="alternate_mobile_no">Alternate Mobile Number</label>
                </div>

                <div class="input-field col l4 m4 s12">
                    <input type="email" id="email" name="email">
                    <label for="email">Email</label>
                </div>

                <div class="input-field col l4 m4 s12">
                    <input type="text" id="category" name="category">
                    <label for="category">Category <small>(Ex: Plumber, Electrician etc.)</small></label>
                </div>

                <div class="input-field col l6 m6 s12">
                    <textarea id="address" class="materialize-textarea" name="address" rows="3"></textarea>
                    <label for="address">Address</label>
                </div>
            </div>
        </div>
    </div>
</form>
