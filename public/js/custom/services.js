const Service = function () {
    this.bind = () => {
        $(document)
            .on('submit', '#createEditServiceModalContainer #create_service_form, #createEditServiceModalContainer #edit_service_form', event => {
                event.preventDefault();

                crudObj.createUpdateResource({
                    'event': event,
                });
            })
            .on('click', '#createServiceButton', (event) => {
                event.preventDefault();

                ajaxModalRequestObject.ajaxRequest({
                    'url': 'services/create',
                    'laddaButtonElement': event.currentTarget,
                    'successCallback': (response) => {
                        ajaxModalRequestObject.initializeModal(response, 'createEditServiceModalContainer');
                    }
                });
            })
            .on('click', '.editServiceButton', (event) => {
                event.preventDefault();

                let serviceId = $(event.currentTarget).data('id');

                ajaxModalRequestObject.ajaxRequest({
                    'url': 'services/'+serviceId+'/edit',
                    'laddaButtonElement': event.currentTarget,
                    'successCallback': (response) => {
                        ajaxModalRequestObject.initializeModal(response, 'createEditServiceModalContainer');
                    }
                });
            });
    };

    this.init = () => {
        this.bind();
    };
};

window.serviceObj = new Service();
window.serviceObj.init();

