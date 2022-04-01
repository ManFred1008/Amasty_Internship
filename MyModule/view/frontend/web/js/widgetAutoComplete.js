define(['jquery'], function ($){
    $.widget('mynamespace.testAutocomplete', {
        options: {
            minChars: null,
            availableSku: [
                '2444-MB',
                '2444-MH',
                '234-UL'
            ]
        },
        _create: function () {
            $(this.element).find('#test-search-input').on('keyup', this.processAutocomplete);
        },
        processAutocomplete: function (){
            console.log('test');
        }
    });
    return $.mynamespace.testAutocomplete;
})
