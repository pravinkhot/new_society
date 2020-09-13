const ChargeBill = function () {
    this.bind = () => {
        $(document)
            .on('click', '.addParticular', () => {
                $('.addParticularContainer tbody').append(`
                    <tr class="border-bottom-none">
                        <td>
                            <input name="particular[]" type="text" placeholder="Particular">
                        </td>
                        <td>
                            <input name="amount[]" type="text" placeholder="Amount">
                        </td>
                        <td>
                            <button type="button" class="btn red accent-3 removeParticular btn-small">
                                <i class="fa fa-close m0"></i>
                            </button>
                        </td>
                    </tr>
                `);
            })
            .on('click', '.removeParticular', event => {
                $(event.currentTarget).parents('tr').remove();
            })
            .on('submit', '#createEditChargeBillGroupModalContainer #createChargeBillGroupForm, ' +
                '#createEditChargeBillGroupModalContainer #editChargeBillGroupForm', event => {
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

window.chargeBillObj = new ChargeBill();
chargeBillObj.init();
