define(['jquery'], function ($) {
    $.widget('mynamespace.testwidget', {
        options: {
            selector: 'body'
        },
        _create: function () {
            this.hideAll();
        },
        hideAll: function () {
            $('body').hide();
        }
    });
    return $.mynamespace.testwidget;
})
