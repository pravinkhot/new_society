$(document).ready(function () {
    $('#createWingModalForm').submit(function (e) {
        e.preventDefault();
        var formData = new FormData($("#createWingModalForm")[0]);
        ajaxRequestObject.ajaxRequest(
            'wings',
            'POST',
            formData,
            ajaxConfigData = {
                'cache':false,
                'contentType': false,
                'processData': false,
                'moduleName': 'wing',
                'actionFormID': '#createWingModalForm',
                'action': 'create'
            }
        );
    });

    $('#editWingForm').submit(function (e) {
        e.preventDefault();
        var wingId = $('#wingId').val();
        var formData = new FormData($("#editWingForm")[0]);
        ajaxRequestObject.ajaxRequest(
            'wings/'+wingId,
            'POST',
            formData,
            ajaxConfigData = {
                'cache':false,
                'contentType': false,
                'processData': false,
                'moduleName': 'wing',
                'actionFormID': '#editWingForm',
                'action': 'edit'
            }
        );
    });
});
