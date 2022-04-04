define(['jquery', 'mage/url'], function ($, urlBuilder){
    $.widget('mynamespace.testAutocomplete', {
        options: {
            minChars: null,
            availableSku: [
                '2444-MB',
                '2444-MH',
                '234-UL'
            ],
            searchResultList: null,
            searchUrl: urlBuilder.build('search/ajax/suggest')
        },
        _create: function () {
            $(this.element).find('#test-search-input').on('keyup', this.processAutocomplete.bind(this));
            this.options.searchResultList = $(this.element).find('.search-result-list');
        },
        processAutocomplete: function (event) {
            var queryText = $(event.target).val();
            console.log(queryText);
            this.options.searchResultList.empty();

            if(queryText.length >= this.options.minChars) {
                // var filteredSku = this.options.availableSku.filter(
                //     function (item){
                //         return item.indexOf(queryText) !== -1;
                //     }
                // )
                // console.log(filteredSku);
                //
                // if(filteredSku.length) {
                //     var searchList = filteredSku.map(
                //         function (item) {
                //             return $('<li/>').text(item);
                //         }
                //     )
                //
                //     this.options.searchResultList.append(searchList);
                // } else {
                //     this.options.searchResultList.empty();
                // }

                $.getJSON(
                    this.options.searchUrl,
                    {q: queryText},
                    function (data) {
                        // console.log(data);
                        if(data.length) {
                            var searchList = data.map(
                                function (item) {
                                    return $('<li/>').text(item.title);
                                }
                            );
                            this.options.searchResultList.append(searchList);
                        } else {
                            this.options.searchResultList.empty();
                        }
                    }.bind(this)
                )
            }
        }
    });
    return $.mynamespace.testAutocomplete;
})
