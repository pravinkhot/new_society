const Notice = function () {
    this.bind = () => {
        $(document)
            .on('submit', '#createEditNoticeModalContainer #create_notice_form, #createEditNoticeModalContainer #edit_notice_form', (event) => {
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

window.noticeObj = new Notice();
window.noticeObj.init();
