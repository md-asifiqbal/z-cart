<nav class="navbar navbar-default navbar-main navbar-light navbar-top">
  <div class="container">
    <div class="navbar-header brand-centered">
      <a class="navbar-brand" href="<?php echo e(url('/'), false); ?>">
        <?php if( Storage::exists('logo.png') ): ?>
          <img src="<?php echo e(get_storage_file_url('logo.png', 'full'), false); ?>" class="brand-logo" alt="<?php echo e(trans('app.logo'), false); ?>" title="<?php echo e(trans('app.logo'), false); ?>">
        <?php else: ?>
          <img src="https://placehold.it/140x60/eee?text=<?php echo e(get_platform_title(), false); ?>" alt="<?php echo e(trans('app.logo'), false); ?>" title="<?php echo e(trans('app.logo'), false); ?>" />
        <?php endif; ?>
      </a>
    </div>
    <?php echo Form::open(['route' => 'inCategoriesSearch', 'method' => 'GET', 'id' => 'search-categories-form', 'class' => 'navbar-left navbar-form navbar-search', 'role' => 'search']); ?>   <select name="insubgrp" class="search-category-select ">
        <option value="all"><?php echo e(trans('theme.all_categories'), false); ?></option>
        <?php if(isset($search_category_list)): ?>
        <?php $__currentLoopData = $search_category_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $search_category_grp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <optgroup label="<?php echo e($search_category_grp->name, false); ?>">
            <?php $__currentLoopData = $search_category_grp->subGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $search_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($search_category->slug, false); ?>"
                <?php if(Request::has('insubgrp')): ?>
                 <?php echo e(Request::get('insubgrp') == $search_category->slug ? ' selected' : '', false); ?>

                <?php endif; ?>
              ><?php echo e($search_category->name, false); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </optgroup>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </select>
     
      <div class="form-group">
        <?php echo Form::text('q', Request::get('q'), ['class' => 'form-control', 'placeholder' => trans('theme.main_searchbox_placeholder')]); ?>

      </div>
      <a class="fa fa-search navbar-search-submit" onclick="document.getElementById('search-categories-form').submit()"></a>
    <?php echo Form::close(); ?>

    <ul class="nav navbar-nav navbar-right navbar-mob-left">
      <li>
        <a href="<?php echo e(route('cart.index'), false); ?>">
          <span><?php echo e(trans('theme.your_cart'), false); ?></span>
          <i class="fa fa-shopping-bag"></i>
          <div id="globalCartItemCount" class="badge"><?php echo e(cart_item_count(), false); ?></div>
        </a>
      </li>

      <?php if(auth()->guard('customer')->check()): ?>
        <li class="dropdown">
          <a href="<?php echo e(route('account', 'dashboard'), false); ?>" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
            <span><?php echo e(trans('theme.hello') . ', ' . Auth::guard('customer')->user()->getName(), false); ?></span> <?php echo e(trans('theme.manage_your_account'), false); ?>

          </a>
          <ul class="dropdown-menu nav-list">
            <li><a href="<?php echo e(route('account', 'dashboard'), false); ?>"><i class="fa fa-dashboard fa-fw"></i> <?php echo app('translator')->getFromJson('theme.nav.dashboard'); ?></a></li>
            <li><a href="<?php echo e(route('account', 'orders'), false); ?>"><i class="fa fa-shopping-cart fa-fw"></i> <?php echo app('translator')->getFromJson('theme.nav.my_orders'); ?></a></li>
            <li><a href="<?php echo e(route('account', 'wishlist'), false); ?>"><i class="fa fa-heart-o fa-fw"></i> <?php echo app('translator')->getFromJson('theme.nav.my_wishlist'); ?></a></li>
            <li><a href="<?php echo e(route('account', 'messages'), false); ?>"><i class="fa fa-envelope-o fa-fw"></i> <?php echo app('translator')->getFromJson('theme.my_messages'); ?></a></li>
            <li><a href="<?php echo e(route('account', 'disputes'), false); ?>"><i class="fa fa-rocket fa-fw"></i> <?php echo app('translator')->getFromJson('theme.nav.refunds_disputes'); ?></a></li>
            <li><a href="<?php echo e(route('account', 'coupons'), false); ?>"><i class="fa fa-tags fa-fw"></i> <?php echo app('translator')->getFromJson('theme.nav.my_coupons'); ?></a></li>
            
            <li><a href="<?php echo e(route('account', 'account'), false); ?>"><i class="fa fa-user fa-fw"></i> <?php echo app('translator')->getFromJson('theme.nav.my_account'); ?></a></li>
            <li class="sep"></li>
            <li><a href="<?php echo e(route('customer.logout'), false); ?>"><i class="fa fa-power-off fa-fw"></i> <?php echo e(trans('theme.logout'), false); ?></a></li>
          </ul>
        </li>
      <?php else: ?>
        <li><a href="#nav-login-dialog" data-toggle="modal" data-target="#loginModal"><span ><?php echo e(trans('theme.sing_in'), false); ?></span><?php echo e(trans('theme.your_account'), false); ?></a></li>
      <?php endif; ?>

      <div class="navbar-header">
          <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#main-nav-collapse" area_expanded="false">
            <span class="sr-only"><?php echo e(trans('theme.nav.menu'), false); ?></span>
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
          <a href="<?php echo e(route('categories'), false); ?>" id="dLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span><?php echo e(trans('theme.shop_by'), false); ?></span><?php echo e(trans('theme.category'), false); ?><i class="dropdown-caret"></i>
          </a>
          <ul class="dropdown-menu menu-category-dropdown" aria-labelledby="dLabel">
            <?php $__currentLoopData = $all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($catGroup->subGroups->count()): ?>
                <?php
                  $categories_count = $catGroup->subGroups->sum('categories_count');
                  $cat_counter = 0;
                ?>

                <li><a href="<?php echo e(route('categoryGrp.browse', $catGroup->slug), false); ?>"><i class="fa <?php echo e($catGroup->icon ?? 'fa-cube', false); ?> fa-fw category-icon"></i><?php echo e($catGroup->name, false); ?></a>
                  <div class="category-section <?php echo e($categories_count > 15 ? 'expanded' : '', false); ?>">
                    <div class="category-section-inner">
                      <div class="category-section-content">
                        <div class="row category-grid">
                          <div class="col-md-<?php echo e($categories_count > 15 ? '4' : '6', false); ?>">
                            <?php $__currentLoopData = $catGroup->subGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <?php if($cat_counter >= 7): ?>
                                
                                </div> <!-- /.col-md-6 -->
                                <div class="col-md-<?php echo e($categories_count > 15 ? '4' : '6', false); ?>">
                                <?php
                                  $cat_counter = 0; //Reset the counter
                                ?>
                              <?php endif; ?>

                              <h5 class="nav-category-inner-title">
                                <a href="<?php echo e(route('categories.browse', $subGroup->slug), false); ?>"><?php echo e($subGroup->name, false); ?></a>
                              </h5>
                              <ul class="nav-category-inner-list">
                                <?php $__currentLoopData = $subGroup->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <li><a href="<?php echo e(route('category.browse', $cat->slug), false); ?>"><?php echo e($cat->name, false); ?></a>
                                    <?php if($cat->description): ?>
                                      <p><?php echo $cat->description; ?></p>
                                    <?php endif; ?>
                                  </li>
                                  <?php
                                    $cat_counter++;  //Increase the counter value by 1
                                  ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </ul>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div> <!-- /.col-md-6 -->
                        </div><!-- /.row -->
                      </div><!-- /.category-section-content -->
                    </div><!-- /.category-section-inner -->

                    <?php if($catGroup->images->first() && Storage::exists($catGroup->images->first()->path)): ?>
                      <img class="nav-category-section-bg-img" src="<?php echo e(get_storage_file_url(optional($catGroup->images->first())->path, 'full'), false); ?>" alt="<?php echo e($catGroup->name, false); ?>" title="<?php echo e($catGroup->name, false); ?>"/>
                    <?php endif; ?>
                  </div><!-- /.category-section -->
                </li>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul><!-- /.menu-category-dropdown -->
        </li>
        <li class="dropdown">
            <a class="navbar-item-mergin-top" href="/">Home</a>
          </li>
        <li class="dropdown">
            <a class="navbar-item-mergin-top" href="/blog">Blog</a>
          </li>
        
         <li class="dropdown">
          <a class="navbar-item-mergin-top" href="<?php echo e(url('/selling'), false); ?>"><?php echo e(trans('theme.nav.sell_on', ['platform' => get_platform_title()]), false); ?></a>
        </li>
       
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo e(route('account', 'wishlist'), false); ?>" class="navbar-item-mergin-top"><i class="fa fa-heart-o hidden-xs"></i> <?php echo e(trans('theme.nav.wishlist'), false); ?></a>
        </li>

        <?php $__currentLoopData = $pages->where('position', 'main_nav'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><a href="<?php echo e(get_page_url($page->slug), false); ?>" class="navbar-item-mergin-top"><?php echo e($page->title, false); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <li><a href="<?php echo e(get_page_url(\App\Page::PAGE_CONTACT_US), false); ?>" class="navbar-item-mergin-top" target="_blank"><?php echo e(trans('theme.nav.support'), false); ?></a>
        </li>

        <?php if(count(config('active_locales')) > 1): ?>
          <li class="dropdown lang-dropdown">
            <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
              <span><?php echo e(trans('theme.nav.lang'), false); ?></span>
              <i class="fa fa-globe"></i>
              <?php echo e(config('active_locales')->firstWhere('code', App::getLocale())->language, false); ?>

            </a>
            <ul class="dropdown-menu">
              <?php $__currentLoopData = config('active_locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="<?php echo e($lang->code == \App::getLocale() ? 'selected' : '', false); ?>">
                  <a href="<?php echo e(route('locale.change', $lang->code), false); ?>">
                    <img src="<?php echo e(asset(sys_image_path('flags') . array_slice(explode('_', $lang->php_locale_code), -1)[0] . '.png'), false); ?>" class="lang-flag">
                    <?php echo e($lang->language, false); ?>

                  </a>
                </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/nav/main.blade.php ENDPATH**/ ?>