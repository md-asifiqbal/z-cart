@extends('layouts.main')

@section('content')
    <!-- HEADER SECTION -->
    @include('headers.product_page', ['product' => $item])

    <!-- CONTENT SECTION -->
    @include('contents.product_page')

    <!-- RELATED ITEMS -->
    <section id="related-items">
        <div class="container">
          <div class="row">
              <div class="col-md-12 nopadding">
                <div class="section-title">
                  <h4>{!! trans('theme.section_headings.related_items') !!}</h4>
                </div>

                @include('sliders.carousel_with_feedback', ['products' => $related])

              </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

    <div class="clearfix space20"></div>

    <!-- BROWSING ITEMS -->
    @include('sliders.browsing_items')

    <!-- bottom Banner -->
    @include('banners.bottom')

    <!-- MODALS -->
    @include('modals.shopReviews', ['shop' => $item->shop])

    @if(Auth::guard('customer')->check())
      @include('modals.contact_seller')
    @endif

@endsection

@section('scripts')

    @if(is_chat_enabled($item->shop))
        @include('scripts.chatbox', ['shop' => $item->shop, 'agent' => $item->shop->owner, 'agent_status' => trans('theme.online')])
    @endif

    @include('modals.ship_to')
    @include('scripts.product_page')
@endsection