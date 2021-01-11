<section>
  <div class="container">
    <header class="page-header">
      <div class="row">
        <div class="col-md-12">
          <?php
            $t_category = $item->product->categories->first();
          ?>
          <ol class="breadcrumb nav-breadcrumb">
            <?php if($t_category && $t_category->subGroup): ?>

              <?php if($t_category->subGroup->group): ?>
                <?php echo $__env->make('headers.lists.category_grp', ['category' => $t_category->subGroup->group], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <?php endif; ?>

              <?php echo $__env->make('headers.lists.category_subgrp', ['category' => $t_category->subGroup], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              <?php echo $__env->make('headers.lists.category', ['category' => $t_category], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php endif; ?>
            <li class="active"><?php echo $item->title; ?></li>
          </ol>
        </div>
      </div>
    </header>
  </div>
</section><?php /**PATH /home/amraibes/public_html/public/themes/default/views/headers/product_page.blade.php ENDPATH**/ ?>