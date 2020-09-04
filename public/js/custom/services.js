const Service = function () {
    this.bind = () => {
        $(document)
            .on('submit', '#createEditServiceModalContainer #create_service_form, #createEditServiceModalContainer #edit_service_form', event => {
                event.preventDefault();

                crudObj.createUpdateResource({
                    'event': event,
                });
            });
    };

    this.init = () => {
        this.bind();
    };
};

window.serviceObj = new Service();
window.serviceObj.init();

