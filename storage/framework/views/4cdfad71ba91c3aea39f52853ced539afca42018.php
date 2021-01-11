<?php $__env->startSection('content'); ?>
	<div class="box">
		<?php
			$active_theme = $storeFrontThemes->firstWhere('slug', active_theme());

			$storeFrontThemes = $storeFrontThemes->filter(function ($value, $key) {
			    return $value['slug'] != active_theme();
			});
		?>
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs nav-justified">
				<li class="active"><a href="#storeFrontThemes_tab" data-toggle="tab">
					<i class="fa fa-paint-brush hidden-sm"></i>
					<?php echo e(trans('app.storefront_themes'), false); ?>

				</a></li>
				<li><a href="#sellingThemes_tab" data-toggle="tab">
					<i class="fa fa-handshake-o hidden-sm"></i>
					<?php echo e(trans('app.selling_themes'), false); ?>

				</a></li>
			</ul>
			<div class="tab-content">
			    <div class="tab-pane active" id="storeFrontThemes_tab">
			    	<div class="row themes">
				  		<div class="theme col-sm-6 col-md-4">
						    <div class="thumbnail active">
								<img src="<?php echo e(theme_asset_url('screenshot.png'), false); ?>" alt="" scale="0">
								<div class="caption">
									<p class="lead"><?php echo e($active_theme['name'], false); ?> <small class="pull-right">v-<?php echo e($active_theme['version'], false); ?></small></p>
									<p><?php echo e($active_theme['description'], false); ?></p>
									<p><button class="btn btn-success" disabled><?php echo e(trans('app.current_theme'), false); ?></button></p>
								</div>
						    </div>
				  		</div>

				    	<?php $__currentLoopData = $storeFrontThemes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  		<div class="theme col-sm-6 col-md-4 nopadding-left">
							    <div class="thumbnail">
									<img src="<?php echo e(theme_asset_url('screenshot.png', $theme['slug']), false); ?>" alt="" scale="0">
									<div class="caption">
										<p class="lead"><?php echo e($theme['name'], false); ?> <small class="pull-right">v-<?php echo e($theme['version'], false); ?></small></p>
										<p><?php echo e($theme['description'], false); ?></p>
								    	<?php echo Form::open(['route' => ['admin.appearance.theme.activate', $theme['slug']], 'method' => 'PUT']); ?>

								            <?php echo Form::submit(trans('app.activate'), ['class' => 'confirm btn btn-flat btn-default']); ?>

								        <?php echo Form::close(); ?>

									</div>
							    </div>
					  		</div>
				    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    	</div>
			    </div>

			    <div class="tab-pane" id="sellingThemes_tab">
					<div class="row themes">
			    		<?php $__currentLoopData = $sellingThemes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  		<div class="theme col-sm-6 col-md-4">
							    <div class="thumbnail <?php echo e($theme['slug'] == active_selling_theme() ? 'active' : '', false); ?>">
									<img src="<?php echo e(selling_theme_asset_url('screenshot.png', $theme['slug']), false); ?>" alt="" scale="0">
									<div class="caption">
										<p class="lead"><?php echo e($theme['name'], false); ?> <small class="pull-right">v-<?php echo e($theme['version'], false); ?></small></p>
										<p><?php echo e($theme['description'], false); ?></p>
										<?php if($theme['slug'] == active_selling_theme()): ?>
											<p><button class="btn btn-success" disabled><?php echo e(trans('app.current_theme'), false); ?></button></p>
										<?php else: ?>
									    	<?php echo Form::open(['route' => ['admin.appearance.theme.activate', $theme['slug'], 'selling'], 'method' => 'PUT']); ?>

									            <?php echo Form::submit(trans('app.activate'), ['class' => 'confirm btn btn-flat btn-default']); ?>

									        <?php echo Form::close(); ?>

										<?php endif; ?>
									</div>
							    </div>
					  		</div>
			    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
			    </div>
			</div>
			<!-- /.tab-content -->
		</div>
		<!-- /.nav-tabs-custom -->
	</div> <!-- /.box -->

	<div class="panel panel-success">
		<div class="panel-heading">
			<i class="fa fa-rocket"></i>
			Looking for more personalized theme?
		</div>
		<div class="panel-body">
			Send us an email for any kind of modification or custom work as we know the code better than everyone.
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/admin/theme/index.blade.php ENDPATH**/ ?>