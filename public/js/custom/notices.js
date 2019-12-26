$(document).ready(function () {
    $('#createNoticeButton').click(function () {
        ajaxModalRequestObject.ajaxRequest('notices/create', createNoticeSuccess);
        function createNoticeSuccess(response) {
            initializeModal(response, 'createEditNoticeModalContainer');
        }
    });

    $('.editNoticeButton').click(function () {
        var noticeId = $(this).data("id");
        ajaxModalRequestObject.ajaxRequest('notices/'+noticeId+'/edit', editNoticeSuccess);
        function editNoticeSuccess(response) {
            initializeModal(response, 'createEditNoticeModalContainer');
        }
    });

    function initializeModal(response, modalContainerId) {
        $('#'+modalContainerId).html(response);
        var modalElement = document.querySelector('#'+modalContainerId+' .modal');
        var instance = M.Modal.init(modalElement, {
            dismissible: false,
        });
        instance.open();
        M.updateTextFields();

        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy'
        });
    }

    $('#createEditNoticeModalContainer').on("submit", "#create_notice_form" , function(e) {
        e.preventDefault();
        formData = new FormData($("#create_notice_form")[0]);
        ajaxRequestObject.ajaxRequest(
            'notices',
            'POST',
            formData,
            ajaxConfigData = {
                'cache':false,
                'contentType': false,
                'processData': false,
                'moduleName': 'notice',
                'actionFormID': '#create_notice_form',
                'action': 'create'
            }
        );
    });

    $('#createEditNoticeModalContainer').on("submit", "#edit_notice_form" , function(e) {
        e.preventDefault();
        var noticeId = $('#noticeId').val();
        var formData = new FormData($("#edit_notice_form")[0]);
        ajaxRequestObject.ajaxRequest(
            'notices/'+noticeId,
            'POST',
            formData,
            ajaxConfigData = {
                'cache':false,
                'contentType': false,
                'processData': false,
                'moduleName': 'notice',
                'actionFormID': '#edit_notice_form',
                'action': 'edit'
            }
        );
    });
});