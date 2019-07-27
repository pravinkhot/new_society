$(document).ready(function () {
    $('#create_member_form').submit(function (e) {
        e.preventDefault();
        var formData = new FormData($("#create_member_form")[0]);
        ajaxRequestObject.ajaxRequest(
            'members',
            'POST',
            formData,
            ajaxConfigData = {
                'cache':false,
                'contentType': false,
                'processData': false,
                'moduleName': 'member',
                'actionFormID': '#create_member_form',
                'action': 'create'
            }
        );
    });

    $('#edit_member_form').submit(function (e) {
        e.preventDefault();
        var memberId = $('#memberId').val();
        var formData = new FormData($("#edit_member_form")[0]);
        ajaxRequestObject.ajaxRequest(
            'members/'+memberId,
            'POST',
            formData,
            ajaxConfigData = {
                'cache':false,
                'contentType': false,
                'processData': false,
                'moduleName': 'member',
                'actionFormID': '#edit_member_form',
                'action': 'edit'
            }
        );
    });
});
