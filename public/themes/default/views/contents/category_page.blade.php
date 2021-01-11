<section>
  <div class="container full-width">
      <div class="row">
        @if($products->count())
          <div class="col-sm-2 bg-light">

            @include('contents.product_list_sidebar_filters')

          </div><!-- /.col-sm-2 -->
          <div class="col-sm-10" style="padding-left: 15px;">

            @include('contents.product_list')

            @if(config('system_settings.show_seo_info_to_frontend'))
              <div class="clearfix space20"></div>
              <span class="lead">{!! $category->meta_title !!}</span>
              <p>{!! $category->meta_description !!}</p>
              <div class="clearfix space20"></div>
            @endif

          </div><!-- /.col-sm-10 -->

        @else

          <div class="clearfix space50"></div>
          <p class="lead text-center space50">
            <span class="space50">@lang('theme.no_product_found')</span><br/>
            <div class="space50 text-center">
              <a href="{{ url('categories') }}" class="btn btn-primary btn-sm flat">@lang('theme.button.shop_from_other_categories')</a>
            </div>
          </p>
          <div class="clearfix space50"></div>
        @endif
      </div><!-- /.row -->
  </div><!-- /.container -->
</section>