$(document).ready(function () {
    $('#createServiceButton').click(function () {
        ajaxModalRequestObject.ajaxRequest('services/create', createServiceSuccess);
        function createServiceSuccess(response) {
            initializeModal(response, 'createServiceModalContainer');
        }
    });

    $('.editServiceButton').click(function () {
        var serviceId = $(this).data("id");
        ajaxModalRequestObject.ajaxRequest('services/'+serviceId+'/edit', editServiceSuccess);
        function editServiceSuccess(response) {
            initializeModal(response, 'editServiceModalContainer');
        }
    });

    function initializeModal(response, modalContainerId) {
        $('#'+modalContainerId).html(response);
        $('#'+modalContainerId+' .modal').modal( {
            dismissible: true,
        });
        var Modalelem = document.querySelector('#'+modalContainerId+' .modal');
        var instance = M.Modal.init(Modalelem, {
            dismissible: false,
        });
        instance.open();
        M.updateTextFields();
    }

    $('#createServiceModalContainer').on("submit", "#create_service_form" , function(e) {
        e.preventDefault();
        var formData = new FormData($("#create_service_form")[0]);
        ajaxRequestObject.ajaxRequest(
            'services',
            'POST',
            formData,
            ajaxConfigData = {
                'cache':false,
                'contentType': false,
                'processData': false,
                'moduleName': 'service',
                'actionFormID': '#create_service_form',
                'action': 'create'
            }
        );
    });

    $('#editServiceModalContainer').on("submit", "#edit_service_form" , function(e) {
        e.preventDefault();
        var serviceId = $('#serviceId').val();
        var formData = new FormData($("#edit_service_form")[0]);
        ajaxRequestObject.ajaxRequest(
            'services/'+serviceId,
            'POST',
            formData,
            ajaxConfigData = {
                'cache':false,
                'contentType': false,
                'processData': false,
                'moduleName': 'service',
                'actionFormID': '#edit_service_form',
                'action': 'edit'
            }
        );
    });
});
