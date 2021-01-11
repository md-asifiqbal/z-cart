<section>
  <div class="container">
    <header class="page-header">
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb nav-breadcrumb">
            <?php echo $__env->make('headers.lists.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('headers.lists.cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <li class="active"><?php echo e(trans('theme.checkout'), false); ?></li>
          </ol>
        </div>
      </div>
    </header>
  </div>
</section><?php /**PATH /home/amraibes/public_html/public/themes/default/views/headers/checkout_page.blade.php ENDPATH**/ ?>