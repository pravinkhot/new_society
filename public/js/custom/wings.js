const Wing = function () {
    this.bind = () => {
        $(document)
            .on('submit', '#createEditWingModalContainer #createWingForm, #createEditWingModalContainer #editWingForm', event => {
                event.preventDefault();

                crudObj.createUpdateResource({
                    'event': event,
                });
            });
    };

    this.init = () => {
        this.bind();
    };
}

window.wingObj = new Wing();
window.wingObj.init();
