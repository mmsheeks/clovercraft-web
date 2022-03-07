<article class="itemselector__item" data-id="{{ $item->id }}">
    <div class="item-info">
        <div class="icon">
            <img alt="{{ $item->name }}" src="{{ $item->icon }}" />
        </div>
        <div class="name">
            <p>{{ $item->name }}</p>
        </div>
    </div>
    <div class="item-controls">
        <button class="btn btn-outline item-remove-btn">Remove Item</button>
    </div>
</article>