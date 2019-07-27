$(document).ready(function () {
    $('.singleDelete').click(function () {
        var $this = $(this);
        swal({
            text: deleteConfirmMsg,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                deleteDadda = Ladda.create(this);
                deleteDadda.start();
                var deleteElementId = $this.parent().parent().attr('id');
                ajaxRequestObject.ajaxRequest (
                    window.location.pathname.slice(1)+'/'+deleteElementId,
                    'DELETE',
                    {
                        'deleteElementId': deleteElementId,
                        '_method': 'DELETE'
                    },
                    ajaxConfigData = {
                        'cache': false,
                        'contentType': false,
                        'processData': false,
                        'action': 'delete'
                    }
                );
            }
        });
    });
});