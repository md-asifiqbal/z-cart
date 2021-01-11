<div class="owl-carousel big-carousel carousel-img-only">
    @foreach($products as $item)
        <div class="product-widget">
            <img class="product-img" src="{{ get_inventory_img_src($item, 'medium') }}" data-name="product_image" alt="{!! $item->title !!}" title="{!! $item->title !!}" />
            <a class="product-link itemQuickView" href="{{ route('quickView.product', $item->slug) }}"></a>
        </div>
    @endforeach
</div>