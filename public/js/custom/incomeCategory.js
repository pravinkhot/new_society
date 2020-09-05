const IncomeCategory = function () {
    this.bind = () => {
        $(document)
            .on('submit', '#createEditIncomeCategoryModalContainer #create_income_category_form, ' +
                '#createEditIncomeCategoryModalContainer #edit_income_category_form', event => {
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

window.incomeCategoryObj = new IncomeCategory();
incomeCategoryObj.init();

