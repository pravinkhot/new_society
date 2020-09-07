const Income = function () {
    this.bind = () => {
        $(document)
            .on('change', '#payment_mode_id', event => {
                if('2' === $(event.currentTarget).val()) {
                    $('#cheque_no_container').show();
                } else {
                    $('#cheque_no_container').hide();
                }
            })
            .on('submit', '#createEditIncomeModalContainer #create_income_form, #createEditIncomeModalContainer #edit_income_form', event => {
                event.preventDefault();

                crudObj.createUpdateResource({
                    'event': event,
                });
            });
    };

    this.init = () => {
        this.bind();
    };
};

window.incomeObj = new Income();
window.incomeObj.init();
