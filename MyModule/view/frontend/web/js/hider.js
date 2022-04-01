define(['jquery'], function ($){
    $.widget('mynamespace.testwidget', {
        options: {
            selector: null
        },
        _create: function () {
            this.hideElements();
        },
        hideElements: function () {
            $(this.options.selector).hide();
            $(this.element).hide();
        }
    });

    return $.mynamespace.testwidget;
    // return function (config, element) {
    //     // $('.page-footer').hide();
    //
    //     $(element).hide();
    //     $(config.selector).hide();
    // }
})
