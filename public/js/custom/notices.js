const Notice = function () {
    this.bind = () => {
        $(document)
            .on('submit', '#createEditNoticeModalContainer #create_notice_form, #createEditNoticeModalContainer #edit_notice_form', (event) => {
                event.preventDefault();

                crudObj.createUpdateResource({
                    'event': event,
                });
            })
            .on('click', '#createNoticeButton', (event) => {
                event.preventDefault();

                ajaxModalRequestObject.ajaxRequest({
                    'url': 'notices/create',
                    'laddaButtonElement': event.currentTarget,
                    'successCallback': (response) => {
                        ajaxModalRequestObject.initializeModal(response, 'createEditNoticeModalContainer');
                    }
                });
            })
            .on('click', '.editNoticeButton', (event) => {
                event.preventDefault();

                let noticeId = $(event.currentTarget).data('id');

                ajaxModalRequestObject.ajaxRequest({
                    'url': 'notices/'+noticeId+'/edit',
                    'laddaButtonElement': event.currentTarget,
                    'successCallback': (response) => {
                        ajaxModalRequestObject.initializeModal(response, 'createEditNoticeModalContainer');
                    }
                });
            });
    };

    this.init = () => {
        this.bind();
    };
};

window.noticeObj = new Notice();
window.noticeObj.init();
