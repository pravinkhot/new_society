$(document).ready(function () {
    var ajaxModalRequest = function () {
        this.ajaxRequest = function (url, callback) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // if (typeof ajaxConfigData.actionFormID !== 'undefined' && ajaxConfigData.actionFormID !== null) {
            //     var ladda = Ladda.create(document.querySelector(ajaxConfigData.actionFormID+' .ladda-button'));
            //     ladda.start();
            // }

            $.ajax({
                url: baseUrl+'/'+url,
                type: 'get',
                success: function(response) {
                    callback(response);
                },
                error: function (error) {
                    // if (typeof ajaxConfigData.actionFormID !== 'undefined' && ajaxConfigData.actionFormID !== null) {
                    //     ladda.stop();
                    // }
                }
            });
        }
    }
    ajaxModalRequestObject = new ajaxModalRequest();
});
