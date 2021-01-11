<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
      <ul class="sidebar-menu">
        <li class=" <?php echo e(Request::is('admin/dashboard*') ? 'active' : '', false); ?>">
          <a href="<?php echo e(url('admin/dashboard'), false); ?>">
            <i class="fa fa-dashboard"></i> <span><?php echo e(trans('nav.dashboard'), false); ?></span>
          </a>
        </li>
        <?php if(Gate::allows('index', \App\Category::class) || Gate::allows('index', \App\Attribute::class) || Gate::allows('index', \App\Product::class) || Gate::allows('index', \App\Manufacturer::class) || Gate::allows('index', \App\CategoryGroup::class) || Gate::allows('index', \App\CategorySubGroup::class)): ?>
          <li class="treeview <?php echo e(Request::is('admin/catalog*') ? 'active' : '', false); ?>">
            <a href="#">
              <i class="fa fa-tags"></i>
              <span><?php echo e(trans('nav.catalog'), false); ?></span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <?php if(Gate::allows('index', \App\Category::class) || Gate::allows('index', \App\CategoryGroup::class) || Gate::allows('index', \App\CategorySubGroup::class)): ?>
                <li class="<?php echo e(Request::is('admin/catalog/category*') ? 'active' : '', false); ?>">
                  <a href="#">
                    <i class="fa fa-angle-double-right"></i>
                    <?php echo e(trans('nav.categories'), false); ?>

                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\CategoryGroup::class)): ?>
                      <li class="<?php echo e(Request::is('admin/catalog/categoryGroup*') ? 'active' : '', false); ?>">
                        <a href="<?php echo e(route('admin.catalog.categoryGroup.index'), false); ?>">
                          <i class="fa fa-angle-right"></i><?php echo e(trans('nav.groups'), false); ?>

                        </a>
                      </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\CategorySubGroup::class)): ?>
                      <li class="<?php echo e(Request::is('admin/catalog/categorySubGroup*') ? 'active' : '', false); ?>">
                        <a href="<?php echo e(route('admin.catalog.categorySubGroup.index'), false); ?>">
                          <i class="fa fa-angle-right"></i><?php echo e(trans('nav.sub-groups'), false); ?>

                        </a>
                      </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Category::class)): ?>
                      <li class="<?php echo e(Request::is('admin/catalog/category') ? 'active' : '', false); ?>">
                        <a href="<?php echo e(url('admin/catalog/category'), false); ?>">
                          <i class="fa fa-angle-right"></i><?php echo e(trans('nav.categories'), false); ?>

                        </a>
                      </li>
                    <?php endif; ?>
                  </ul>
                </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Attribute::class)): ?>
                <li class=" <?php echo e(Request::is('admin/catalog/attribute*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/catalog/attribute'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.attributes'), false); ?>

                  </a>
                </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Product::class)): ?>
                <li class=" <?php echo e(Request::is('admin/catalog/product*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/catalog/product'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.products'), false); ?>

                  </a>
                </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Manufacturer::class)): ?>
                <li class=" <?php echo e(Request::is('admin/catalog/manufacturer*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/catalog/manufacturer'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.manufacturers'), false); ?>

                  </a>
                </li>
              <?php endif; ?>
            </ul>
          </li>
        <?php endif; ?>

        <?php if(Gate::allows('index', \App\Inventory::class) || Gate::allows('index', \App\Warehouse::class) || Gate::allows('index', \App\Supplier::class)): ?>
          <li class="treeview <?php echo e(Request::is('admin/stock*') ? 'active' : '', false); ?>">
            <a href="#">
              <i class="fa fa-cubes"></i>
              <span><?php echo e(trans('nav.stock'), false); ?></span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Inventory::class)): ?>
                <li class=" <?php echo e(Request::is('admin/stock/inventory*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/stock/inventory'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.inventories'), false); ?>

                  </a>
                </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Warehouse::class)): ?>
                <li class=" <?php echo e(Request::is('admin/stock/warehouse*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/stock/warehouse'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.warehouses'), false); ?>

                  </a>
                </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Supplier::class)): ?>
                <li class=" <?php echo e(Request::is('admin/stock/supplier*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/stock/supplier'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.suppliers'), false); ?>

                  </a>
                </li>
              <?php endif; ?>
            </ul>
          </li>
        <?php endif; ?>

        <?php if(Gate::allows('index', \App\Order::class) || Gate::allows('index', \App\Cart::class)): ?>
          <li class="treeview <?php echo e(Request::is('admin/order*') ? 'active' : '', false); ?>">
            <a href="#">
              <i class="fa fa-cart-plus"></i>
              <span><?php echo e(trans('nav.orders'), false); ?></span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Order::class)): ?>
                <li class=" <?php echo e(Request::is('admin/order/order*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/order/order'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.orders'), false); ?>

                  </a>
                </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Cart::class)): ?>
                <li class=" <?php echo e(Request::is('admin/order/cart*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/order/cart'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.carts'), false); ?>

                  </a>
                </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cancelAny', \App\Order::class)): ?>
                <li class=" <?php echo e(Request::is('admin/order/cancellation*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/order/cancellation'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.cancellations'), false); ?>

                  </a>
                </li>
              <?php endif; ?>

              
                
              
            </ul>
          </li>
        <?php endif; ?>

        <?php if(Gate::allows('index', \App\User::class) || Gate::allows('index', \App\Customer::class)): ?>
          <li class="treeview <?php echo e(Request::is('admin/admin*') || Request::is('address/addresses/customer*') ? 'active' : '', false); ?>">
            <a href="#">
              <i class="fa fa-user-secret"></i>
              <span><?php echo e(trans('nav.admin'), false); ?></span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\User::class)): ?>
                <li class=" <?php echo e(Request::is('admin/admin/user*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/admin/user'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.users'), false); ?>

                  </a>
                </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Customer::class)): ?>
                <li class=" <?php echo e(Request::is('admin/admin/customer*') || Request::is('address/addresses/customer*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/admin/customer'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.customers'), false); ?>

                  </a>
                </li>
              <?php endif; ?>
            </ul>
          </li>
        <?php endif; ?>

        <?php if(Gate::allows('index', \App\Merchant::class) || Gate::allows('index', \App\Shop::class)): ?>
          <li class="treeview <?php echo e(Request::is('admin/vendor*') ? 'active' : '', false); ?>">
            <a href="#">
              <i class="fa fa-map-marker"></i>
              <span><?php echo e(trans('nav.vendors'), false); ?></span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Shop::class)): ?>
                <li class=" <?php echo e(Request::is('admin/vendor/merchant*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/vendor/merchant'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.merchants'), false); ?>

                  </a>
                </li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Shop::class)): ?>
                <li class=" <?php echo e(Request::is('admin/vendor/shop*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/vendor/shop'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.shops'), false); ?>

                  </a>
                </li>
              <?php endif; ?>
            </ul>
          </li>
        <?php endif; ?>

        <?php if(Gate::allows('index', \App\Carrier::class) || Gate::allows('index', \App\Packaging::class)): ?>
          <li class="treeview <?php echo e(Request::is('admin/shipping*') ? 'active' : '', false); ?>">
            <a href="#">
              <i class="fa fa-truck"></i>
              <span><?php echo e(trans('nav.shipping'), false); ?></span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Carrier::class)): ?>
                <li class=" <?php echo e(Request::is('admin/shipping/carrier*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/shipping/carrier'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.carriers'), false); ?>

                  </a>
                </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Packaging::class)): ?>
                <li class=" <?php echo e(Request::is('admin/shipping/packaging*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/shipping/packaging'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.packaging'), false); ?>

                  </a>
                </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\ShippingZone::class)): ?>
                <li class=" <?php echo e(Request::is('admin/shipping/shippingZone*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/shipping/shippingZone'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.shipping_zones'), false); ?>

                  </a>
                </li>
              <?php endif; ?>
            </ul>
          </li>
        <?php endif; ?>

        
        <?php if(!Auth::user()->isSuperAdmin()): ?>
        <?php if(Gate::allows('index', \App\Coupon::class) || Gate::allows('index', \App\GiftCard::class)): ?>
          <li class="treeview <?php echo e(Request::is('admin/promotion*') ? 'active' : '', false); ?>">
            <a href="#">
              <i class="fa fa-paper-plane"></i>
              <span><?php echo e(trans('nav.promotions'), false); ?></span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Coupon::class)): ?>
                <li class=" <?php echo e(Request::is('admin/promotion/coupon*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/promotion/coupon'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.coupons'), false); ?>

                  </a>
                </li>
              <?php endif; ?>
              
            </ul>
          </li>
        <?php endif; ?>
        <?php endif; ?>

        <?php if(Gate::allows('index', \App\Message::class) || Gate::allows('index', \App\Ticket::class) || Gate::allows('index', \App\Dispute::class) || Gate::allows('index', \App\Refund::class)): ?>
          <li class="treeview <?php echo e(Request::is('admin/support*') ? 'active' : '', false); ?>">
            <a href="#">
              <i class="fa fa-support"></i>
              <span><?php echo e(trans('nav.support'), false); ?></span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
               <?php if(!Auth::user()->isSuperAdmin()): ?>
              <li class=" <?php echo e(Request::is('admin/support/chat*') ? 'active' : '', false); ?>">
                 <a target="_blank" href="https://tawk.to/chat/5f9f07137f0a8e57c2d8da76/default">
                    <i class="fa fa-angle-double-right"></i> Chat with Amraibest
                  </a>
                </li>
              <?php endif; ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\ChatConversation::class)): ?>
                <li class=" <?php echo e(Request::is('admin/support/chat*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/support/chat'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.chats'), false); ?>

                  </a>
                </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Message::class)): ?>
                <li class=" <?php echo e(Request::is('admin/support/message*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/support/message/labelOf/'. \App\Message::LABEL_INBOX), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.support_messages'), false); ?>

                  </a>
                </li>
              <?php endif; ?>

              <?php if(Auth::user()->isFromPlatform()): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Ticket::class)): ?>
                  <li class=" <?php echo e(Request::is('admin/support/ticket*') ? 'active' : '', false); ?>">
                    <a href="<?php echo e(url('admin/support/ticket'), false); ?>">
                      <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.support_tickets'), false); ?>

                    </a>
                  </li>
                <?php endif; ?>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Dispute::class)): ?>
                <li class=" <?php echo e(Request::is('admin/support/dispute*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/support/dispute'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.disputes'), false); ?>

                  </a>
                </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Refund::class)): ?>
                <li class=" <?php echo e(Request::is('admin/support/refund*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/support/refund'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.refunds'), false); ?>

                  </a>
                </li>
              <?php endif; ?>
            </ul>
          </li>
        <?php endif; ?>

        <?php if((new \App\Helpers\Authorize(Auth::user(), 'customize_appearance'))->check()): ?>
          <li class="treeview <?php echo e(Request::is('admin/appearance*') ? 'active' : '', false); ?>">
            <a href="#">
              <i class="fa fa-paint-brush"></i>
              <span><?php echo e(trans('nav.appearance'), false); ?></span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class=" <?php echo e(Request::is('admin/appearance/theme') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/appearance/theme'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.themes'), false); ?>

                  </a>
                </li>

                <li class=" <?php echo e(Request::is('admin/appearance/banner*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/appearance/banner'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.banners'), false); ?>

                  </a>
                </li>

                <li class=" <?php echo e(Request::is('admin/appearance/slider*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/appearance/slider'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.sliders'), false); ?>

                  </a>
                </li>

                <li class=" <?php echo e(Request::is('admin/appearance/theme/option*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/appearance/theme/option'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.theme_options'), false); ?>

                  </a>
                </li>
            </ul>
          </li>
        <?php endif; ?>

        <li class="treeview <?php echo e(Request::is('admin/setting*') ? 'active' : '', false); ?>">
          <a href="#">
            <i class="fa fa-gears"></i>
            <span><?php echo e(trans('nav.settings'), false); ?></span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <?php if(is_subscription_enabled()): ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\SubscriptionPlan::class)): ?>
                <li class=" <?php echo e(Request::is('admin/setting/subscriptionPlan*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/setting/subscriptionPlan'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.subscription_plans'), false); ?>

                  </a>
                </li>
              <?php endif; ?>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Role::class)): ?>
              <li class=" <?php echo e(Request::is('admin/setting/role*') ? 'active' : '', false); ?>">
                <a href="<?php echo e(url('admin/setting/role'), false); ?>">
                  <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.user_roles'), false); ?>

                </a>
              </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Tax::class)): ?>
              <li class=" <?php echo e(Request::is('admin/setting/tax*') ? 'active' : '', false); ?>">
                <a href="<?php echo e(url('admin/setting/tax'), false); ?>">
                  <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.taxes'), false); ?>

                </a>
              </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Config::class)): ?>
              <li class=" <?php echo e(Request::is('admin/setting/general*') ? 'active' : '', false); ?>">
                <a href="<?php echo e(url('admin/setting/general'), false); ?>">
                  <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.general'), false); ?>

                </a>
              </li>

              <li class=" <?php echo e(Request::is('admin/setting/config*') || Request::is('admin/setting/verify*') ? 'active' : '', false); ?>">
                <a href="<?php echo e(url('admin/setting/config'), false); ?>">
                  <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.config'), false); ?>

                </a>
              </li>

              <li class=" <?php echo e(Request::is('admin/setting/paymentMethod*') ? 'active' : '', false); ?>">
                <a href="<?php echo e(url('admin/setting/paymentMethod'), false); ?>">
                  <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.payment_methods'), false); ?>

                </a>
              </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\System::class)): ?>
              <li class=" <?php echo e(Request::is('admin/setting/system/general*') ? 'active' : '', false); ?>">
                <a href="<?php echo e(url('admin/setting/system/general'), false); ?>">
                  <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.system_settings'), false); ?>

                </a>
              </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\SystemConfig::class)): ?>
              <li class=" <?php echo e(Request::is('admin/setting/system/config*') ? 'active' : '', false); ?>">
                <a href="<?php echo e(url('admin/setting/system/config'), false); ?>">
                  <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.config'), false); ?>

                </a>
              </li>
            <?php endif; ?>

            <?php if(Auth::user()->isAdmin()): ?>
              <li class=" <?php echo e(Request::is('admin/setting/announcement*') ? 'active' : '', false); ?>">
                <a href="<?php echo e(url('admin/setting/announcement'), false); ?>">
                  <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.announcements'), false); ?>

                </a>
              </li>
            <?php endif; ?>

            <?php if(Auth::user()->isAdmin()): ?>

              <li class=" <?php echo e(Request::is('admin/setting/country*') ? 'active' : '', false); ?>">
                <a href="<?php echo e(url('admin/setting/country'), false); ?>">
                  <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.countries'), false); ?>

                </a>
              </li>

              <li class=" <?php echo e(Request::is('admin/setting/currency*') ? 'active' : '', false); ?>">
                <a href="<?php echo e(url('admin/setting/currency'), false); ?>">
                  <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.currencies'), false); ?>

                </a>
              </li>

              <li class=" <?php echo e(Request::is('admin/setting/language*') ? 'active' : '', false); ?>">
                <a href="<?php echo e(url('admin/setting/language'), false); ?>">
                  <i class="fa fa-angle-double-right"></i> <?php echo e(trans('app.languages'), false); ?>

                </a>
              </li>
            <?php endif; ?>
          </ul>
        </li>

        <?php if(Gate::allows('index', \App\Page::class) || Gate::allows('index', \App\EmailTemplate::class) || Gate::allows('index', \App\Blog::class) || Gate::allows('index', \App\Faq::class)): ?>
          <li class="treeview <?php echo e(Request::is('admin/utility*') ? 'active' : '', false); ?>">
            <a href="#">
              <i class="fa fa-asterisk"></i>
              <span><?php echo e(trans('nav.utilities'), false); ?></span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\EmailTemplate::class)): ?>
                <li class=" <?php echo e(Request::is('admin/utility/emailTemplate*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/utility/emailTemplate'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.email_templates'), false); ?>

                  </a>
                </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Page::class)): ?>
                <li class=" <?php echo e(Request::is('admin/utility/page*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/utility/page'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.pages'), false); ?>

                  </a>
                </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Blog::class)): ?>
                <li class=" <?php echo e(Request::is('admin/utility/blog*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/utility/blog'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <span><?php echo e(trans('nav.blogs'), false); ?></span>
                  </a>
                </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Faq::class)): ?>
                <li class=" <?php echo e(Request::is('admin/utility/faq*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(url('admin/utility/faq'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.faqs'), false); ?>

                  </a>
                </li>
              <?php endif; ?>
            </ul>
          </li>
        <?php endif; ?>

        <?php if(Auth::user()->isAdmin() || Auth::user()->isMerchant()): ?>
          <li class="treeview <?php echo e(Request::is('admin/report*') || Request::is('admin/shop/report*') ? 'active' : '', false); ?>">
            <a href="#">
              <i class="fa fa-map"></i>
              <span><?php echo e(trans('nav.reports'), false); ?></span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <?php if(Auth::user()->isAdmin()): ?>
                <li class=" <?php echo e(Request::is('admin/report/kpi*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(route('admin.kpi'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.performance'), false); ?>

                  </a>
                </li>
                <li class=" <?php echo e(Request::is('admin/report/visitors*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(route('admin.report.visitors'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.visitors'), false); ?>

                  </a>
                </li>
              <?php elseif(Auth::user()->isMerchant()): ?>
                <li class=" <?php echo e(Request::is('admin/shop/report/kpi*') ? 'active' : '', false); ?>">
                  <a href="<?php echo e(route('admin.shop-kpi'), false); ?>">
                    <i class="fa fa-angle-double-right"></i> <?php echo e(trans('nav.performance'), false); ?>

                  </a>
                </li>
              <?php endif; ?>
            </ul>
          </li>
        <?php endif; ?>

        <!--
        <li class="header">LABELS</li>
        <li><a href="#">
        <i class="fa fa-circle-o text-red"></i> <span>Important</span></a>
        </li>
        <li><a href="#">
        <i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a>
        </li>
        <li><a href="#">
        <i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a>
        </li>
        -->
      </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<?php /**PATH /home/amraibest.com/public_html/resources/views/admin/sidebar.blade.php ENDPATH**/ ?>