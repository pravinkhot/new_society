const Crud = function () {
    this.createUpdateResource = (options) => {
        let currentTarget = $(options.event.currentTarget);
        let formId = currentTarget.prop('id');

        ajaxRequestObject.ajaxRequest(
            currentTarget.data('url'),
            currentTarget.prop('method'),
            new FormData($('#' + formId)[0]),
            {
                'cache':false,
                'contentType': false,
                'processData': false,
                'actionFormID': '#' + formId,
                'action': currentTarget.data('action'),
                'moduleName': currentTarget.data('module'),
            }
        );
    };

    this.bind = () => {
        $(document)
            .on('click', '.createResourceBtn, .editResourceBtn', event => {
                event.preventDefault();

                let modalContainerId = 'createEdit'+
                    $(event.currentTarget).data('module').charAt(0).toUpperCase() +
                    $(event.currentTarget).data('module').substr(1) +
                    'ModalContainer';

                ajaxModalRequestObject.ajaxRequest({
                    'url': $(event.currentTarget).data('url'),
                    'laddaButtonElement': event.currentTarget,
                    'successCallback': (response) => {
                        ajaxModalRequestObject.initializeModal(response, modalContainerId);
                    }
                });
            });
    };

    this.init = () => {
        this.bind();
    };
};

window.crudObj = new Crud();
crudObj.init();
