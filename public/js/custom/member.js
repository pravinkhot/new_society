const Member = function () {
    this.bind = () => {
        $(document)
            .on('click', '.addFlat', () => {
                let flatCount = $('.addFlatContainer tbody tr').length;
                $('.addFlatContainer tbody').append(`
                    <tr class="border-bottom-none">
                        <td>
                            ` + flatList + `
                        </td>

                        <td class="vertical-text-middle center-align">
                            <label>
                                <input class="ownerTenant" type="radio" name="ot[` + flatCount + `]" value="1" checked />
                                    <span>Owner</span>
                            </label>

                            <label>
                                <input class="ownerTenant" type="radio" name="ot[` + flatCount + `]" value="2" />
                                <span>Tenant</span>
                            </label>
                        </td>

                        <td class="center-align">
                            <button type="button" class="btn red removeFlat accent-3 btn-small">
                                <i class="fa fa-close mr-0"></i>
                            </button>
                        </td>
                    </tr>
                `);

                $('.flat_id').formSelect();
            })
            .on('click', '.removeFlat', event => {
                $(event.currentTarget).parents('tr').remove();

                let addFlatTr = $('.addFlatContainer tbody tr');

                addFlatTr.each(function (key, element) {
                    $(element).find('.ownerTenant').prop('name', 'ot['+key+']');
                });
            })
            .on('change', '#isAssociationMember', event => {
                event.preventDefault();

                if (true === event.currentTarget.checked) {
                    $('#designationContainer').removeClass('display-none');
                } else {
                    $('#designationContainer').addClass('display-none');
                }
            })
            .on('submit', '#createMemberForm, #editMemberForm', event => {
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

window.memberObj = new Member();
window.memberObj.init();
