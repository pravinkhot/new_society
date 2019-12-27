$(document).ready(function () {
    $('#createIncomeButton').click(function () {
        ajaxModalRequestObject.ajaxRequest('incomes/create', createIncomeSuccess);
        function createIncomeSuccess(response) {
            initializeModal(response);
        }
    });

    $('.editIncomeButton').click(function () {
        var incomeId = $(this).data("id");
        ajaxModalRequestObject.ajaxRequest('incomes/'+incomeId+'/edit', editIncomeSuccess);
        function editIncomeSuccess(response) {
            initializeModal(response);
        }
    });

    function initializeModal(response) {
        $('#createEditIncomeModalContainer').html(response);
        var modalElement = document.querySelector('#createEditIncomeModalContainer .modal');
        var instance = M.Modal.init(modalElement, {
            dismissible: false,
        });
        instance.open();
        $('select').formSelect();
        M.updateTextFields();

        $('#createEditIncomeModalContainer').on("change", "input[type=radio][name=payment_mode_id]" , function(e) {
            if ($(this).val() == 2) {
                $('#cheque_no_container').show();
            } else {
                $('#cheque_no_container').hide();
            }
        });

        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy'
        });
    }

    $('#createEditIncomeModalContainer').on("submit", "#create_income_form" , function(e) {
        e.preventDefault();
        var formData = new FormData($("#create_income_form")[0]);
        ajaxRequestObject.ajaxRequest(
            'incomes',
            'POST',
            formData,
            ajaxConfigData = {
                'cache':false,
                'contentType': false,
                'processData': false,
                'moduleName': 'income',
                'actionFormID': '#create_income_form',
                'action': 'create'
            }
        );
    });

    $('#createEditIncomeModalContainer').on("submit", "#edit_income_form" , function(e) {
        e.preventDefault();
        var incomeId = $('#incomeId').val();
        var formData = new FormData($("#edit_income_form")[0]);
        ajaxRequestObject.ajaxRequest(
            'incomes/'+incomeId,
            'POST',
            formData,
            ajaxConfigData = {
                'cache':false,
                'contentType': false,
                'processData': false,
                'moduleName': 'income',
                'actionFormID': '#edit_income_form',
                'action': 'edit'
            }
        );
    });
});
