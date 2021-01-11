<div class="container filter-wrapper">
    <div class="row">
        <div class="col-md-12 ">
            <span>
                <?php echo app('translator')->getFromJson('theme.sort_by'); ?>:
                <select name="sort_by" class="selectBoxIt" id="filter_opt_sort">
                    <option value="best_match"><?php echo app('translator')->getFromJson('theme.best_match'); ?></option>
                    <option value="newest" <?php echo e(Request::get('sort_by') == 'newest' ? 'selected' : '', false); ?>><?php echo app('translator')->getFromJson('theme.newest'); ?></option>
                    <option value="oldest" <?php echo e(Request::get('sort_by') == 'oldest' ? 'selected' : '', false); ?>><?php echo app('translator')->getFromJson('theme.oldest'); ?></option>
                    <option value="price_acs" <?php echo e(Request::get('sort_by') == 'price_acs' ? 'selected' : '', false); ?>><?php echo app('translator')->getFromJson('theme.price'); ?>: <?php echo app('translator')->getFromJson('theme.low_to_high'); ?></option>
                    <option value="price_desc" <?php echo e(Request::get('sort_by') == 'price_desc' ? 'selected' : '', false); ?>><?php echo app('translator')->getFromJson('theme.price'); ?>: <?php echo app('translator')->getFromJson('theme.high_to_low'); ?></option>
                </select>
            </span>

            <div class="checkbox">
                <label>
                  <input name="free_shipping" class="i-check filter_opt_checkbox" type="checkbox" <?php echo e(Request::has('free_shipping') ? 'checked' : '', false); ?>> <?php echo app('translator')->getFromJson('theme.free_shipping'); ?> <span class="small">(<?php echo e($products->where('free_shipping', 1)->count(), false); ?>)</span>
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input name="has_offers" class="i-check filter_opt_checkbox" type="checkbox" <?php echo e(Request::has('has_offers') ? 'checked' : '', false); ?>/>
                    <?php echo app('translator')->getFromJson('theme.has_offers'); ?>
                    <span class="small">(<?php echo e($products->where('offer_price', '>', 0)->where('offer_start', '<', \Carbon\Carbon::now())->where('offer_end', '>', \Carbon\Carbon::now())->count(), false); ?>)</span>
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input name="new_arrivals" class="i-check filter_opt_checkbox" type="checkbox" <?php echo e(Request::has('new_arrivals') ? 'checked' : '', false); ?>/>
                    <?php echo app('translator')->getFromJson('theme.new_arrivals'); ?>
                    <span class="small">
                        (<?php echo e($products->where('created_at', '>', \Carbon\Carbon::now()->subDays(config('system.filter.new_arraival', 7)))->count(), false); ?>)
                    </span>
                </label>
            </div>

            <span class="pull-right text-muted">
              <a href="#" class="viewSwitcher btn btn-primary btn-sm flat">
                <i class="fa fa-th" data-toggle="tooltip" title="<?php echo app('translator')->getFromJson('theme.grid_view'); ?>"></i>
              </a>
              <a href="#" class="viewSwitcher btn btn-default btn-sm flat">
                <i class="fa fa-list" data-toggle="tooltip" title="<?php echo app('translator')->getFromJson('theme.list_view'); ?>"></i>
              </a>
            </span>
        </div>
    </div>
</div><!-- /.filter-wrapper -->

<div class="clearfix space20"></div><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/contents/product_list_top_filter.blade.php ENDPATH**/ ?>