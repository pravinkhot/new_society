const Flat = function () {
    this.bind = () => {
        $(document)
            .on('submit', '#createFlatForm, #editFlatForm', event => {
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

window.flatObj = new Flat();
window.flatObj.init();

