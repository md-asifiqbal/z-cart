<div class="product-info">
  @if($item->product->manufacturer->slug)
    <a href="{{ route('show.brand', $item->product->manufacturer->slug) }}" class="product-info-seller-name">{!! $item->product->manufacturer->name !!}</a>
  @else
    <a href="{{ route('show.store', $item->shop->slug) }}" class="product-info-seller-name">
      {!! $item->shop->getQualifiedName() !!}
    </a>
  @endif

  <h5 class="product-info-title space10" data-name="product_name">{!! $item->title !!}</h5>

  @include('layouts.ratings', ['ratings' => $item->feedbacks->avg('rating'), 'count' => $item->feedbacks_count])

  @include('layouts.pricing', ['item' => $item])

  <div class="row">
    <div class="col-sm-6 col-xs-12 nopadding-right">
        <div class="product-info-availability space10">@lang('theme.availability'):
          <span>{{ $item->stock_quantity > 0 ? trans('theme.in_stock') : trans('theme.out_of_stock') }}</span>
        </div>
    </div>
    <div class="col-sm-6 col-xs-12 nopadding-left">
        <div class="product-info-condition space10">

          @lang('theme.condition'): <span><b id="item_condition">{!! $item->condition !!}</b></span>

          @if($item->condition_note)
            <sup><i class="fa fa-question" id="item_condition_note" data-toggle="tooltip" title="{!! $item->condition_note !!}" data-placement="top"></i></sup>
          @endif
        </div>
    </div>
  </div><!-- /.row -->

  <div class="row">
    <div class="col-sm-6 col-xs-12 nopadding-right">
      <a href="{{ route('wishlist.add', $item) }}" class="btn btn-link">
        <i class="fa fa-heart-o"></i> @lang('theme.button.add_to_wishlist')
      </a>
    </div>
    <div class="col-sm-6 col-xs-12 nopadding-left">
      @if('quickView.product' == Route::currentRouteName())
        <a href="{{ route('show.store', $item->shop->slug) }}" class="btn btn-link">
          <i class="fa fa-list-alt"></i> @lang('theme.more_items_from_this_seller', ['seller' => $item->shop->name])
        </a>
      {{-- @elseif('quickView.product' == Route::currentRouteName()) --}}
        {{-- <a href="{{ route('show.brand', $item->product->manufacturer->slug) }}" class="product-info-seller-name"> @lang('theme.more_items_from_this_seller', ['seller' => $item->product->manufacturer->name])</a> --}}
      @else
        <a href="javascript:void(0);" class="btn btn-link" data-toggle="modal" data-target="{{ Auth::guard('customer')->check() ? "#contactSellerModal" : "#loginModal" }}">
          <i class="fa fa-envelope-o"></i> @lang('theme.button.contact_seller')
        </a>
      @endif
    </div>
  </div><!-- /.row -->
</div><!-- /.product-info -->

@include('layouts.share_btns')
