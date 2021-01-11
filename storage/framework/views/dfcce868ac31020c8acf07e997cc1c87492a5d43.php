<section>
  <div class="container">
    <header class="page-header">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb nav-breadcrumb">
            <?php echo $__env->make('headers.lists.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('headers.lists.categories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if(Request::has('ingrp')): ?>

              <li class="active"><?php echo e($category->name, false); ?></li>

            <?php elseif(Request::has('insubgrp') && Request::get('insubgrp') != 'all'): ?>

              <li>
                <a class="link-filter-opt" data-name="ingrp" data-value="<?php echo e($category->group->slug, false); ?>">
                  <?php echo e($category->group->name, false); ?>

                </a>
              </li>
              <li class="active"><?php echo e($category->name, false); ?></li>

            <?php elseif(Request::has('in')): ?>

              <li>
                <a class="link-filter-opt" data-name="ingrp" data-value="<?php echo e($category->subGroup->group->slug, false); ?>">
                  <?php echo e($category->subGroup->group->name, false); ?>

                </a>
              </li>
              <li>
                <a class="link-filter-opt" data-name="insubgrp" data-value="<?php echo e($category->subGroup->slug, false); ?>">
                  <?php echo e($category->subGroup->name, false); ?>

                </a>
              </li>
              <li class="active"><?php echo e($category->name, false); ?></li>

            <?php endif; ?>

            <li class="active">
              "<strong class="text-primary"><?php echo e(Request::get('q'), false); ?></strong>"
              <span class="indent10">(<?php echo e(trans('app.search_result_found', ['count' => $products->count()]), false); ?>)</span>
            </li>
          </ol>
        </div>
      </div>
    </header>
  </div>
</section><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/headers/search_results.blade.php ENDPATH**/ ?>