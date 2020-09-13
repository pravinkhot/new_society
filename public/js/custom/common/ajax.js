let ajaxRequest = function () {
    /**
     * This function is used to redirect or do any operation after successive ajax call
     * @param  data
     * @return void
     */
    this.submitFormSuccessCallback = function (data) {
        let redirectURL = '';
        if($.inArray(data.moduleName, ['wing', 'member', 'flat']) !== -1) {
            redirectURL = data.moduleName+'s';
        } else if (-1 !== $.inArray(data.moduleName, [
            'service',
            'notice',
            'expense',
            'income',
            'incomeCategory',
            'expenseCategory',
            'chargeBillGroup',
        ])) {
            $(document).ajaxStop(function(){
                window.location.reload(true);
            });
        } else {
            switch (data.action) {
                case 'create':
                    switch (data.moduleName) {
                        case 'event':
                        case 'role':
                        case 'complaint':
                            redirectURL = data.moduleName+'s';
                            break;
                    }
                    break;

                case 'edit':
                    switch (data.moduleName) {
                        case 'event':
                        case 'role':
                        case 'setting':
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
     * @param  formId
     * @param  errors
     * @return void
     */
    this.showAjaxFormValidationError = function (formId, errors) {
        $('.error').remove();
        $.each(errors.errors, function(key, value) {
            let errorKey = key.split('.');

            if (errorKey.length > 1) {
                $($(formId).find('[name="'+errorKey[0]+'[]"]')[errorKey[1]]).parent().append('<div class="error">'+value[0]+'</div>');
            } else {
                $(formId).find('[name='+key+']').closest('div').append('<div class="error">'+value[0]+'</div>');
            }
        });
    }

    this.submitFormErrorCallback = function (data) {
        var errors = JSON.parse(data.error.responseText);
        this.showAjaxFormValidationError(data.actionFormID, errors);
    }

    /**
     * This function is used to call ajax request
     * @return void
     * @param url
     * @param requestType
     * @param inputData
     * @param ajaxConfigData
     */
    this.ajaxRequest = function (url, requestType, inputData, ajaxConfigData = {
        'cache':false,
        'contentType': false,
        'processData': false,
        'moduleName': null,
        'actionFormID': null,
        'action': null
    }) {
        let self = this;

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
                self.submitFormSuccessCallback(submitResultObject);
            },
            error: function (error) {
                if (typeof ajaxConfigData.actionFormID !== 'undefined' && ajaxConfigData.actionFormID !== null) {
                    ladda.stop();
                }

                self.submitFormErrorCallback({
                    'error': error,
                    'moduleName': ajaxConfigData.moduleName,
                    'actionFormID': ajaxConfigData.actionFormID,
                    'action': ajaxConfigData.action
                });
            }
        })
    }
}
window.ajaxRequestObject = new ajaxRequest();

