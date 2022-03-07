<div class="items-selector">
    <div class="items-search-wrapper">
        <input class="items-search" id="items-search" placeholder="Search for items..." />
        <div class="items-search__items">
            @foreach( $items as $item )
                <div class="items-search__item" data-name="{{ $item->name }}">
                    <img class="items-search__item-icon" src="{{ $item->icon }}">
                    <p class="items-search__item-name">{{ $item->name }}</p>
                    <a class="items-search__item-btn" data-id="{{ $item->id }}"><i class="fa-solid fa-plus"></i><span class="sr-only">Add {{ $item->name }} to shop</span></a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="items-selected">
    </div>
</div>
    