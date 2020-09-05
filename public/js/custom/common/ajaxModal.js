const ajaxModalRequest = function () {
    this.ajaxRequest = function (options) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let ladda = '';
        if (options.hasOwnProperty('laddaButtonElement')) {
            ladda = Ladda.create(options.laddaButtonElement);
            ladda.start();
        }

        $.ajax({
            url: baseUrl+'/'+options.url,
            type: 'get',
            success: function(response) {
                (options.hasOwnProperty('successCallback')) ? options.successCallback(response) : '';

                (options.hasOwnProperty('laddaButtonElement')) ? ladda.stop() : '';
            },
            error: function (error) {
                (options.hasOwnProperty('laddaButtonElement')) ? ladda.stop() : '';
            }
        });
    };

    this.initializeModal = (response, modalContainerId) => {
        $('#'+modalContainerId).html(response);
        let modalElement = document.querySelector('#'+modalContainerId+' .modal');
        let instance = M.Modal.init(modalElement, {
            dismissible: false,
        });
        instance.open();

        $('.material-select').formSelect();

        M.updateTextFields();

        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy'
        });
    };
}

window.ajaxModalRequestObject = new ajaxModalRequest();
