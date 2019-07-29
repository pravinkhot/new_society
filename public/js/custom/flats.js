$(document).ready(function () {
    $('#create_flat_form').submit(function (e) {
        e.preventDefault();
        var formData = new FormData($("#create_flat_form")[0]);
        ajaxRequestObject.ajaxRequest(
            'flats',
            'POST',
            formData,
            ajaxConfigData = {
                'cache':false,
                'contentType': false,
                'processData': false,
                'moduleName': 'flat',
                'actionFormID': '#create_flat_form',
                'action': 'create'
            }
        );
    });

    $('#edit_flat_form').submit(function (e) {
        e.preventDefault();
        var flatId = $('#flatId').val();
        var formData = new FormData($("#edit_flat_form")[0]);
        ajaxRequestObject.ajaxRequest(
            'flats/'+flatId,
            'POST',
            formData,
            ajaxConfigData = {
                'cache':false,
                'contentType': false,
                'processData': false,
                'moduleName': 'flat',
                'actionFormID': '#edit_flat_form',
                'action': 'edit'
            }
        );
    });
});
