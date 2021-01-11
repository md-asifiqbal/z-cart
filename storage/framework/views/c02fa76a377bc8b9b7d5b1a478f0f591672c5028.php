<section>
  	<div class="container">
  		<div class="row">
	  		<div class="col-md-8 col-md-offset-2">
		  		<p class="lead"><?php echo app('translator')->getFromJson('theme.notify.order_placed_thanks'); ?></p>
		    	<?php if(optional($order->paymentMethod)->type == \App\PaymentMethod::TYPE_MANUAL): ?>
		    		<p class="text-primary space50">
		    			<strong>Payment Method:  </strong>
		    			<?php echo DB::table('payment_methods')->where('id', $order->payment_method_id)->first()->name; ?>

		    		</p>
		    	<?php elseif(! $order->isPaid()): ?>
		    		<p class="text-danger space50">
		    			<strong><?php echo app('translator')->getFromJson('theme.payment_status'); ?>: </strong> <?php echo $order->paymentStatusName(); ?>

		    		</p>
				<?php endif; ?>

		  		<p class="small space30"><i class="fa fa-info-circle"></i>
		  			<?php echo e(trans('theme.notify.order_will_ship_to'), false); ?>: <em>"<?php echo $order->shipping_address; ?>"</em>
		  		</p>

	  			<p class="lead text-center space50">
		            <a class="btn btn-primary flat" href="<?php echo e(url('/'), false); ?>"><?php echo e(trans('theme.button.continue_shopping'), false); ?></a>

			    	<?php if(\Auth::guard('customer')->check()): ?>
		                <a class="btn btn-default flat" href="<?php echo e(route('order.detail', $order), false); ?>"><?php echo app('translator')->getFromJson('theme.button.order_detail'); ?></a>
					<?php endif; ?>
				</p>
	  		</div><!-- /.col-md-8 -->
		</div><!-- /.row -->
  	</div> <!-- /.container -->
</section><?php /**PATH /home/amraibes/public_html/public/themes/default/views/contents/order_complete.blade.php ENDPATH**/ ?>