const Expense = function () {
    this.bind = () => {
        $(document)
            .on('change', '#payment_mode_id', event => {
                if('2' === $(event.currentTarget).val()) {
                    $('#cheque_no_container').show();
                } else {
                    $('#cheque_no_container').hide();
                }
            })
            .on('submit', '#createEditExpenseModalContainer #create_expense_form, #createEditExpenseModalContainer #edit_expense_form', event => {
                event.preventDefault();

                crudObj.createUpdateResource({
                    'event': event,
                });
            });
    };

    this.init = () => {
        this.bind();
    };
}

window.expenseObj = new Expense();
window.expenseObj.init();
