<nav class="navbar navbar-default navbar-main navbar-light navbar-top">
  <div class="container">
    <div class="navbar-header brand-centered">
      <a class="navbar-brand" href="{{ url('/') }}">
        @if( Storage::exists('logo.png') )
          <img src="{{ get_storage_file_url('logo.png', 'full') }}" class="brand-logo" alt="{{ trans('app.logo') }}" title="{{ trans('app.logo') }}">
        @else
          <img src="https://placehold.it/140x60/eee?text={{ get_platform_title() }}" alt="{{ trans('app.logo') }}" title="{{ trans('app.logo') }}" />
        @endif
      </a>
    </div>
    {!! Form::open(['route' => 'inCategoriesSearch', 'method' => 'GET', 'id' => 'search-categories-form', 'class' => 'navbar-left navbar-form navbar-search', 'role' => 'search']) !!}   <select name="insubgrp" class="search-category-select ">
        <option value="all">{{ trans('theme.all_categories') }}</option>
        @if(isset($search_category_list))
        @foreach($search_category_list as $search_category_grp)
          <optgroup label="{{ $search_category_grp->name }}">
            @foreach($search_category_grp->subGroups as $search_category)
              <option value="{{ $search_category->slug }}"
                @if(Request::has('insubgrp'))
                 {{ Request::get('insubgrp') == $search_category->slug ? ' selected' : '' }}
                @endif
              >{{ $search_category->name }}</option>
            @endforeach
          </optgroup>
        @endforeach
        @endif
      </select>
     
      <div class="form-group">
        {!! Form::text('q', Request::get('q'), ['class' => 'form-control', 'placeholder' => trans('theme.main_searchbox_placeholder')]) !!}
      </div>
      <a class="fa fa-search navbar-search-submit" onclick="document.getElementById('search-categories-form').submit()"></a>
    {!! Form::close() !!}
    <ul class="nav navbar-nav navbar-right navbar-mob-left">
      <li>
        <a href="{{ route('cart.index') }}">
          <span>{{ trans('theme.your_cart') }}</span>
          <i class="fa fa-shopping-bag"></i>
          <div id="globalCartItemCount" class="badge">{{ cart_item_count() }}</div>
        </a>
      </li>

      @auth('customer')
        <li class="dropdown">
          <a href="{{ route('account', 'dashboard') }}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
            <span>{{ trans('theme.hello') . ', ' . Auth::guard('customer')->user()->getName() }}</span> {{ trans('theme.manage_your_account') }}
          </a>
          <ul class="dropdown-menu nav-list">
            <li><a href="{{ route('account', 'dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> @lang('theme.nav.dashboard')</a></li>
            <li><a href="{{ route('account', 'orders') }}"><i class="fa fa-shopping-cart fa-fw"></i> @lang('theme.nav.my_orders')</a></li>
            <li><a href="{{ route('account', 'wishlist') }}"><i class="fa fa-heart-o fa-fw"></i> @lang('theme.nav.my_wishlist')</a></li>
            <li><a href="{{ route('account', 'messages') }}"><i class="fa fa-envelope-o fa-fw"></i> @lang('theme.my_messages')</a></li>
            <li><a href="{{ route('account', 'disputes') }}"><i class="fa fa-rocket fa-fw"></i> @lang('theme.nav.refunds_disputes')</a></li>
            <li><a href="{{ route('account', 'coupons') }}"><i class="fa fa-tags fa-fw"></i> @lang('theme.nav.my_coupons')</a></li>
            {{-- <li><a href="{{ route('account', 'gift_cards') }}"><i class="fa fa-gift fa-fw"></i> @lang('theme.nav.gift_cards')</a></li> --}}
            <li><a href="{{ route('account', 'account') }}"><i class="fa fa-user fa-fw"></i> @lang('theme.nav.my_account')</a></li>
            <li class="sep"></li>
            <li><a href="{{ route('customer.logout') }}"><i class="fa fa-power-off fa-fw"></i> {{ trans('theme.logout') }}</a></li>
          </ul>
        </li>
      @else
        <li><a href="#nav-login-dialog" data-toggle="modal" data-target="#loginModal"><span >{{ trans('theme.sing_in') }}</span>{{ trans('theme.your_account') }}</a></li>
      @endauth

      <div class="navbar-header">
          <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#main-nav-collapse" area_expanded="false">
            <span class="sr-only">{{ trans('theme.nav.menu') }}</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
      </div>
    </ul>
  </div>
</nav>

<nav class="navbar-default navbar-main navbar-light navbar-main border-bottom">
  <div class="container">
    <div class="collapse navbar-collapse" id="main-nav-collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="{{ route('categories') }}" id="dLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>{{ trans('theme.shop_by') }}</span>{{ trans('theme.category') }}<i class="dropdown-caret"></i>
          </a>
          <ul class="dropdown-menu menu-category-dropdown" aria-labelledby="dLabel">
            @foreach($all_categories as $catGroup)
              @if($catGroup->subGroups->count())
                @php
                  $categories_count = $catGroup->subGroups->sum('categories_count');
                  $cat_counter = 0;
                @endphp

                <li><a href="{{ route('categoryGrp.browse', $catGroup->slug) }}"><i class="fa {{ $catGroup->icon ?? 'fa-cube' }} fa-fw category-icon"></i>{{ $catGroup->name }}</a>
                  <div class="category-section {{$categories_count > 15 ? 'expanded' : ''}}">
                    <div class="category-section-inner">
                      <div class="category-section-content">
                        <div class="row category-grid">
                          <div class="col-md-{{$categories_count > 15 ? '4' : '6'}}">
                            @foreach($catGroup->subGroups as $subGroup)

                              @if($cat_counter >= 7)
                                {{-- If the end categories are more than 7 then breack the line --}}
                                </div> <!-- /.col-md-6 -->
                                <div class="col-md-{{$categories_count > 15 ? '4' : '6'}}">
                                @php
                                  $cat_counter = 0; //Reset the counter
                                @endphp
                              @endif

                              <h5 class="nav-category-inner-title">
                                <a href="{{ route('categories.browse', $subGroup->slug) }}">{{ $subGroup->name }}</a>
                              </h5>
                              <ul class="nav-category-inner-list">
                                @foreach($subGroup->categories as $cat)
                                  <li><a href="{{ route('category.browse', $cat->slug) }}">{{ $cat->name }}</a>
                                    @if($cat->description)
                                      <p>{!! $cat->description !!}</p>
                                    @endif
                                  </li>
                                  @php
                                    $cat_counter++;  //Increase the counter value by 1
                                  @endphp
                                @endforeach
                              </ul>
                            @endforeach
                          </div> <!-- /.col-md-6 -->
                        </div><!-- /.row -->
                      </div><!-- /.category-section-content -->
                    </div><!-- /.category-section-inner -->

                    @if($catGroup->images->first() && Storage::exists($catGroup->images->first()->path))
                      <img class="nav-category-section-bg-img" src="{{ get_storage_file_url(optional($catGroup->images->first())->path, 'full') }}" alt="{{ $catGroup->name }}" title="{{ $catGroup->name }}"/>
                    @endif
                  </div><!-- /.category-section -->
                </li>
              @endif
            @endforeach
          </ul><!-- /.menu-category-dropdown -->
        </li>
        <li class="dropdown">
            <a class="navbar-item-mergin-top" href="/">Home</a>
          </li>
        <li class="dropdown">
            <a class="navbar-item-mergin-top" href="/blog">Blog</a>
          </li>
        {{--
        <li class="dropdown">
          <a class="navbar-item-mergin-top" href="{{ route('shop.giftCard') }}">{{ trans('theme.gift_cards') }}</a>
        </li> --}}
         <li class="dropdown">
          <a class="navbar-item-mergin-top" href="{{ url('/selling') }}">{{ trans('theme.nav.sell_on', ['platform' => get_platform_title()]) }}</a>
        </li>
       
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('account', 'wishlist') }}" class="navbar-item-mergin-top"><i class="fa fa-heart-o hidden-xs"></i> {{ trans('theme.nav.wishlist') }}</a>
        </li>

        @foreach($pages->where('position', 'main_nav') as $page)
          <li><a href="{{ get_page_url($page->slug) }}" class="navbar-item-mergin-top">{{ $page->title }}</a></li>
        @endforeach

        <li><a href="{{ get_page_url(\App\Page::PAGE_CONTACT_US) }}" class="navbar-item-mergin-top" target="_blank">{{ trans('theme.nav.support') }}</a>
        </li>

        @if(count(config('active_locales')) > 1)
          <li class="dropdown lang-dropdown">
            <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
              <span>{{ trans('theme.nav.lang') }}</span>
              <i class="fa fa-globe"></i>
              {{ config('active_locales')->firstWhere('code', App::getLocale())->language }}
            </a>
            <ul class="dropdown-menu">
              @foreach(config('active_locales') as $lang)
                <li class="{{$lang->code == \App::getLocale() ? 'selected' : ''}}">
                  <a href="{{route('locale.change', $lang->code)}}">
                    <img src="{{asset(sys_image_path('flags') . array_slice(explode('_', $lang->php_locale_code), -1)[0] . '.png')}}" class="lang-flag">
                    {{ $lang->language }}
                  </a>
                </li>
              @endforeach
            </ul>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>