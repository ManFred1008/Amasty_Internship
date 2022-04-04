define(['jquery'], function ($) {
    var widgetMixin = {
        hideElements: function () {
            this._super();
            this.hideMenu();
        },
        hideMenu: function () {
            $('.sections.nav-sections').hide();
        }
    };

    return function (targetWidget) {
        $.widget('mynamespace.testwidget', targetWidget, widgetMixin);

        return $.mynamespace.testwidget;
    }
})
