const ExpenseCategory = function () {
    this.bind = () => {
        $(document)
            .on('submit', '#createEditExpenseCategoryModalContainer #create_expense_category_form, ' +
                '#createEditExpenseCategoryModalContainer #edit_expense_category_form', event => {
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

window.expenseCategoryObj = new ExpenseCategory();
expenseCategoryObj.init();

