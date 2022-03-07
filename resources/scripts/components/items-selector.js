class ItemsSelector {

    constructor( selector ) {
        this.$root = $( selector )
        
        // check that we actually have a root element
        if( this.$root.length === 0 ) return

        this.$searchWrapper     = this.$root.find( '.items-search-wrapper' )
        this.$search            = this.$searchWrapper.find( '.items-search' )
        this.$itemList          = this.$searchWrapper.find( '.items-search__items' )
        this.$items             = this.$itemList.children( '.items-search__item' )
        this.$itemButtons       = this.$itemList.find( '.items-search__item-btn')

        this.bind()
    }

    bind() {
        const instance = this;
        this.$search.on( 'keyup', function() {
            instance.filterItems( $(this).val() )
        })
        // this.$search.on( 'focusout', function() {
        //     instance.resetSearch()
        // })

        this.$itemButtons.on( 'click', function( e ) {
            e.preventDefault()
            instance.selectItem( $(this).data('id') )
        })
    }

    filterItems( q ) {
        this.clearMatches()
        if( q.length <= 2 ) return

        let items = this.$items
        items.each( ( i ) => {
            const item = items[ i ]
            const name = $(item).data('name').toLowerCase()
            if( name.includes( q.toLowerCase() ) ) {
                $(item).addClass('matched')
            }
        })
    }

    selectItem( id ) {
        const path = `/shops/items/${id}/selector-row`
        
        $.ajax({
            url: path,
            method: 'GET',
            success: function( data ) {
                $(".items-selected").append( data.html );
            }
        })
        
        this.resetSearch()
    }

    resetSearch() {
        this.clearMatches()
        this.$search.val( '' )
    }

    clearMatches() {
        $(this.$items).removeClass( 'matched' )
    }


}

module.exports = ItemsSelector