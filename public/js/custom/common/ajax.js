$(document).ready(function () {
    var ajaxRequest = function () {

        /**
         * This function is used to redirect or do any operation after successive ajax call
         * @param  object data
         * @return void
         */
        var submitFormSuccessCallback = function (data) {
            if($.inArray(data.moduleName, ['wing', 'member', 'flat', 'expense']) !== -1) {
                redirectURL = data.moduleName+'s';
            } else {
                switch (data.action) {
                    case 'create':
                        switch (data.moduleName) {
                            case 'service':
                            case 'notice':
                            case 'event':
                            case 'role':
                            case 'income':
                            case 'complaint':
                                redirectURL = data.moduleName+'s';
                            break;
                        }
                    break;

                    case 'edit':
                        switch (data.moduleName) {
                            case 'service':
                            case 'notice':
                            case 'event':
                            case 'role':
                            case 'setting':
                            case 'income':
                            case 'complaint':
                                redirectURL = data.moduleName+'s';
                            break;
                        }
                    break;

                    case 'delete':
                        if (data.result.success) {
                            swal({
                                icon: "success",
                                text: data.result.message,
                            }).then(function(isConfirm) {
                                if (isConfirm) {
                                    deleteDadda.stop();
                                    window.location.reload(true);
                                }
                            });
                        };
                        return true;
                    break;

                    case 'deleteDocument':
                        if (data.result.success) {
                            swal({
                                icon: "success",
                                text: data.result.message,
                            }).then(function(isConfirm) {
                                if (isConfirm) {
                                    deleteDocumentDadda.stop();
                                    window.location.reload(true);
                                }
                            });
                        };
                        return true;
                    break;

                    case 'buildDropdown':
                        buildDropdown(
                            data.result,
                            $(data.dropDownConfig.dropDownId),
                            otherOptions = {
                                'selectedValue': data.dropDownConfig.selectedValue,
                                'placeholder': data.dropDownConfig.placeholder
                            }
                        );
                        return true;
                    break;
                }
            }

            window.location.replace(baseUrl+'/'+redirectURL);
        }

        /**
         * This method is used to show valiodation method errors
         * @param  string formId
         * @param  object errors
         * @return void
         */
        var showAjaxFormValidationError = function (formId, errors) {
            $('.error').remove();
            $.each(errors.errors, function(key, value) {
                $(formId).find('[name='+key+']').parent().append('<div class="error">'+value[0]+'</div>');
            });
        }

        var submitFormErrorCallback = function (data) {
            var errors = JSON.parse(data.error.responseText);
            showAjaxFormValidationError(data.actionFormID, errors);
        }

        /**
         * This function is used to call ajax request
         * @param  string url
         * @param  string requestType
         * @param  object inputData
         * @param  successCallback
         * @param  errorCallback
         * @param  object ajaxConfigData
         * @return void
         */
        this.ajaxRequest = function (url, requestType, inputData, ajaxConfigData = {
            'cache':false,
            'contentType': false,
            'processData': false,
            'moduleName': null,
            'actionFormID': null,
            'action': null
        }) {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if (typeof ajaxConfigData.actionFormID !== 'undefined' && ajaxConfigData.actionFormID !== null) {
                var ladda = Ladda.create(document.querySelector(ajaxConfigData.actionFormID+' .ladda-button'));
                ladda.start();
            }

            $.ajax({
                url: baseUrl+'/'+url,
                type: requestType,
                data: inputData,
                cache: ajaxConfigData.cache,
                contentType: ajaxConfigData.contentType,
                processData: ajaxConfigData.processData,
                success: function (result) {
                    var submitResultObject = {
                        'result': result,
                    };
                    $.extend(
                        submitResultObject,
                        ajaxConfigData
                    );
                    submitFormSuccessCallback(submitResultObject);
                },
                error: function (error) {
                    if (typeof ajaxConfigData.actionFormID !== 'undefined' && ajaxConfigData.actionFormID !== null) {
                        ladda.stop();
                    }

                    submitFormErrorCallback({
                        'error': error,
                        'moduleName': ajaxConfigData.moduleName,
                        'actionFormID': ajaxConfigData.actionFormID,
                        'action': ajaxConfigData.action
                    });
                }
            })
        }
    }

    ajaxRequestObject = new ajaxRequest();
});
