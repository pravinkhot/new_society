$(document).ready(function () {
    $('#payment_mode_id').change(function () {
        if ($(this).val() == 2) {
            $('#cheque_no_container').show();
        } else {
            $('#cheque_no_container').hide();
        }
    });
    $('#payment_mode_id').trigger('change');

    $('#create_expense_form').submit(function (e) {
        e.preventDefault();
        var formData = new FormData($("#create_expense_form")[0]);
        ajaxRequestObject.ajaxRequest(
            'expenses',
            'POST',
            formData,
            ajaxConfigData = {
                'cache':false,
                'contentType': false,
                'processData': false,
                'moduleName': 'expense',
                'actionFormID': '#create_expense_form',
                'action': 'create'
            }
        );
    });

    $('#edit_expense_form').submit(function (e) {
        e.preventDefault();
        var expenseId = $('#expenseId').val();
        var formData = new FormData($("#edit_expense_form")[0]);
        ajaxRequestObject.ajaxRequest(
            'expenses/'+expenseId,
            'POST',
            formData,
            ajaxConfigData = {
                'cache':false,
                'contentType': false,
                'processData': false,
                'moduleName': 'expense',
                'actionFormID': '#edit_expense_form',
                'action': 'edit'
            }
        );
    });
});
