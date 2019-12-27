$(document).ready(function () {
    $('#createIncomeCategoryButton').click(function () {
        ajaxModalRequestObject.ajaxRequest('incomes/category/create', createIncomeCategorySuccess);
        function createIncomeCategorySuccess(response) {
            initializeModal(response);
        }
    });

    $('.editIncomeCategoryButton').click(function () {
        var incomeId = $(this).data("id");
        ajaxModalRequestObject.ajaxRequest('incomes/category/'+incomeId+'/edit', editIncomeCategorySuccess);
        function editIncomeCategorySuccess(response) {
            initializeModal(response);
        }
    });

    function initializeModal(response) {
        $('#createEditIncomeCategoryModalContainer').html(response);
        var modalElement = document.querySelector('#createEditIncomeCategoryModalContainer .modal');
        var instance = M.Modal.init(modalElement, {
            dismissible: false,
        });
        instance.open();
        $('select').formSelect();
        M.updateTextFields();
    }

    $('#createEditIncomeCategoryModalContainer').on("submit", "#create_income_category_form" , function(e) {
        e.preventDefault();
        var formData = new FormData($("#create_income_category_form")[0]);

        ajaxRequestObject.ajaxRequest(
            'incomes/category',
            'POST',
            formData,
            ajaxConfigData = {
                'cache':false,
                'contentType': false,
                'processData': false,
                'moduleName': 'incomeCategory',
                'actionFormID': '#create_income_category_form',
                'action': 'create'
            }
        );
    });

    $('#createEditIncomeCategoryModalContainer').on("submit", "#edit_income_category_form" , function(e) {
        e.preventDefault();
        var incomeCategoryId = $('#incomeCategoryId').val();
        var formData = new FormData($("#edit_income_category_form")[0]);
        ajaxRequestObject.ajaxRequest(
            'incomes/category/'+incomeCategoryId,
            'POST',
            formData,
            ajaxConfigData = {
                'cache':false,
                'contentType': false,
                'processData': false,
                'moduleName': 'incomeCategory',
                'actionFormID': '#edit_income_category_form',
                'action': 'edit'
            }
        );
    });
});
