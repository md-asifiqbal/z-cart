<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-body" style="padding: 0px;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="position: absolute; top: 5px; right: 10px; z-index: 9;">×</button>
			<div class="card hovercard">
			    <div class="card-background">
					<img src="<?php echo e(get_storage_file_url(optional($user->image)->path, 'small'), false); ?>" class="card-bkimg img-circle" alt="<?php echo e(trans('app.avatar'), false); ?>">
			    </div>
			    <div class="useravatar">
            		<img src="<?php echo e(get_avatar_src($user, 'small'), false); ?>" class="img-circle" alt="<?php echo e(trans('app.avatar'), false); ?>">
			    </div>
			    <div class="card-info">
			        <span class="card-title"><?php echo e($user->getName(), false); ?></span>
			    </div>
			</div>

			<!-- Custom Tabs -->
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs nav-justified">
				  <li class="active"><a href="#tab_1" data-toggle="tab">
				  	<?php echo e(trans('app.basic_info'), false); ?>

				  </a></li>
				  <li><a href="#tab_2" data-toggle="tab">
				  	<?php echo e(trans('app.description'), false); ?>

				  </a></li>
				  <li><a href="#tab_3" data-toggle="tab">
				  	<?php echo e(trans('app.contact'), false); ?>

				  </a></li>
				</ul>
				<div class="tab-content">
				    <div class="tab-pane active" id="tab_1">
				        <table class="table">
				            <?php if($user->name): ?>
				                <tr>
				                	<th><?php echo e(trans('app.full_name'), false); ?>: </th>
				                	<td><?php echo e($user->name, false); ?></td>
				                </tr>
				            <?php endif; ?>
				            <?php if($user->shop): ?>
				                <tr>
				                	<th><?php echo e(trans('app.shop'), false); ?>: </th>
				                	<td><?php echo e($user->shop->name, false); ?></td>
				                </tr>
				            <?php endif; ?>
			                <tr>
			                	<th><?php echo e(trans('app.roles'), false); ?>: </th>
			                	<td>
						          	<span class="label label-outline"><?php echo e($user->role->name, false); ?></span>
				                </td>
			               	</tr>
				            <?php if($user->dob): ?>
				                <tr>
				                	<th><?php echo e(trans('app.dob'), false); ?>: </th>
				                	<td><?php echo date('F j, Y', strtotime($user->dob)) . '<small> (' . get_age($user->dob) . ')</small>'; ?></td>
				                </tr>
				            <?php endif; ?>
				            <?php if($user->sex): ?>
				                <tr>
				                	<th><?php echo e(trans('app.sex'), false); ?>: </th>
				                	<td><?php echo get_formated_gender($user->sex); ?></td>
				                </tr>
				            <?php endif; ?>
			                <tr>
			                	<th><?php echo e(trans('app.status'), false); ?>: </th>
			                	<td><?php echo e(($user->active) ? trans('app.active') : 	trans('app.inactive'), false); ?></td>
			                </tr>
				            <?php if($user->created_at): ?>
				                <tr>
				                	<th><?php echo e(trans('app.member_since'), false); ?>: </th>
				                	<td><?php echo e($user->created_at->diffForHumans(), false); ?></td>
				                </tr>
				            <?php endif; ?>
				        </table>
				    </div> <!-- /.tab-pane -->
				    <div class="tab-pane" id="tab_2">
			            <?php echo $user->description ?? trans('app.info_not_found'); ?>

				    </div> <!-- /.tab-pane -->
				    <div class="tab-pane" id="tab_3">
				        <table class="table">
							<tr>
								<th class="text-right"><?php echo e(trans('app.email'), false); ?>:</th>
								<td style="width: 75%;"><?php echo e($user->email, false); ?></td>
							</tr>
				            <?php if($user->primaryAddress): ?>
							<tr>
								<th class="text-right"><?php echo e(trans('app.address'), false); ?>:</th>
								<td style="width: 75%;">
				        			<?php echo $user->primaryAddress->toHtml(); ?>

								</td>
							</tr>
							<?php endif; ?>
				        </table>

	            		<?php if(config('system_settings.address_show_map')): ?>
					        <div class="row">
			                    <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo e(urlencode(optional($user->primaryAddress)->toGeocodeString()), false); ?>&output=embed"></iframe>
					        </div>
					        <div class="help-block" style="margin-bottom: -10px;"><i class="fa fa-warning"></i> <?php echo e(trans('app.map_location'), false); ?></div>
				       	<?php endif; ?>
				    </div> <!-- /.tab-pane -->
				</div> <!-- /.tab-content -->
			</div>
        </div>
    </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog --><?php /**PATH /home/amraibes/public_html/resources/views/admin/user/_show.blade.php ENDPATH**/ ?>