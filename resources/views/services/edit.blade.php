<input type="hidden" name="serviceId" id="serviceId" class="serviceId" value="{{ $serviceDetail->id }}">
<form id="edit_service_form" class="col s12 edit_service_form" method="POST" action="#">
    @method('PUT')
    <div id="editServiceModal" class="modal">
        <div class="modal-content">
            <h4 class="center-align mb-2">Edit Service</h4>
            <div class="row">
                <div class="input-field col l4 m4 s12">
                    <input type="text" id="name" name="name" value="{{ $serviceDetail->name }}">
                    <label for="name">Service Name *</label>
                </div>

                <div class="input-field col l4 m4 s12">
                    <input type="text" id="provider_name" name="provider_name" value="{{ $serviceDetail->provider_name }}">
                    <label for="provider_name">Provider Name *</label>
                </div>

                <div class="input-field col l4 m4 s12">
                    <input type="text" id="mobile_no" name="mobile_no" value="{{ $serviceDetail->mobile_no }}">
                    <label for="mobile_no">Mobile Number *</label>
                </div>                
            </div>

            <div class="row">
                <div class="input-field col l4 m4 s12">
                    <input type="text" id="alternate_mobile_no" name="alternate_mobile_no" value="{{ $serviceDetail->alternate_mobile_no }}">
                    <label for="alternate_mobile_no">Alternate Mobile Number</label>
                </div>

                <div class="input-field col l4 m4 s12">
                    <input type="email" id="email" name="email" value="{{ $serviceDetail->email }}">
                    <label for="email">Email</label>
                </div>

                <div class="input-field col l4 m4 s12">
                    <input type="text" id="category" name="category" value="{{ $serviceDetail->category }}">
                    <label for="category">Category <small>(Ex: Plumber, Electrician etc.)</small></label>
                </div>

                <div class="input-field col l6 m6 s12">
                    <textarea id="address" class="materialize-textarea" name="address" rows="3">{{ $serviceDetail->address }}</textarea>
                    <label for="address">Address</label>
                </div>                
            </div>

            <div class="row">
                <div class="input-field col s6 right-align right">
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