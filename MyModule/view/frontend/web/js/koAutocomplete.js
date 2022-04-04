define(['uiComponent'], function (Component) {
    return Component.extend({
        defaults: {
            searchText: '',
            searchResult: [],
            availableSku: [
                '2444-MB',
                '2444-FG',
                '5632-JU'
            ],
            availableSku2: [
                {sku: '2444-MB'},
                {sku: '2444-FG'},
                {sku: '5632-JU'}
            ]
        },
        initObservable: function () {
            this._super();

            this.observe(
                ['searchText', 'searchResult']
            );
            return this;
        },
        initialize: function () {
            this._super();

            this.searchText.subscribe(this.handleAutocomplete.bind(this));
        },
        handleAutocomplete: function (searchValue) {
            console.log(searchValue);

            if(searchValue.length > 2) {
                var filteredSku = this.availableSku2.filter(
                    function (item) {
                        return item.sku.indexOf(searchValue) !== -1;
                    }
                );
                this.searchResult(filteredSku);
            } else {
                this.searchResult([]);
            }

            // if(searchValue.length > 2) {
            //     var filteredSku = this.availableSku.filter(
            //         function (item) {
            //             return item.indexOf(searchValue) !== -1;
            //         }
            //     );
            //     this.searchResult(filteredSku);
            // } else {
            //     this.searchResult([]);
            // }

        }
    });
})
