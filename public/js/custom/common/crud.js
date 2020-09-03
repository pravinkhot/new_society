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
};

window.crudObj = new Crud();

