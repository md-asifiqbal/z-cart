<div class="clearfix space20"></div>
<section>
  	<div class="container">
    	<div class="row">
      		<div class="col-md-12">

				<?php if($products->count()): ?>

		        	<?php echo $__env->make('contents.product_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				<?php else: ?>

					<div class="clearfix space50"></div>
					<p class="lead text-center space50">
					  	<span class="space50"><?php echo app('translator')->getFromJson('theme.no_product_found'); ?></span><br/>
					  	<div class="space50 text-center">
						  	<a href="<?php echo e(url('categories'), false); ?>" class="btn btn-primary btn-sm flat"><?php echo app('translator')->getFromJson('theme.button.choose_from_categories'); ?></a>
					  	</div>
					</p>
					<div class="clearfix space50"></div>

				<?php endif; ?>
      		</div><!-- /.col-md-12 -->
    	</div><!-- /.row -->
  	</div><!-- /.container -->
</section>
<div class="clearfix space20"></div><?php /**PATH /home/amraibes/public_html/public/themes/default/views/contents/shop_page.blade.php ENDPATH**/ ?>