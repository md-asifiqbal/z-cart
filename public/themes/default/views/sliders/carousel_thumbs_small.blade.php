<div class="owl-carousel small-carousel carousel-img-only">
    @foreach($products as $item)
        <div class="product-widget">
            <img class="product-img" src="{{ get_inventory_img_src($item, 'small') }}" alt="{!! $item->title !!}" title="{!! $item->title !!}" />
            <a class="product-link itemQuickView" href="{{ route('quickView.product', $item->slug) }}"></a>
        </div>
    @endforeach
</div>