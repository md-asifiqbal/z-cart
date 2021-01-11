<div class="owl-carousel product-carousel">
    @foreach($products as $item)
        <div class="product-widget">
            <img class="product-img" src="{{ get_inventory_img_src($item, 'medium') }}" data-name="product_image" alt="{{ $item->title }}" title="{{ $item->title }}" style="height:200px;"/>
            <a class="product-link" href="{{ route('show.product', $item->slug) }}"></a>
            <div class="product-info text-center">
                @include('layouts.ratings', ['ratings' => $item->feedbacks->avg('rating')])

                <h5 class="product-info-title">{!! $item->title !!}</h5>

                @include('layouts.pricing', ['item' => $item])
            </div>
        </div>
    @endforeach
</div>

<style>
.owl-item {
    margin-right: 5px !important;

}
</style>