<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-cart-arrow-down"></i> <?php echo e(trans('app.cart_list'), false); ?></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div> <!-- /.box-header -->
    <div class="box-body">
        <table class="table table-hover table-no-option">
            <thead>
                <tr>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Cart::class)): ?>
                        <th class="massActionWrapper">
                            <!-- Check all button -->
                            <div class="btn-group ">
                                <button type="button" class="btn btn-xs btn-default checkbox-toggle">
                                    <i class="fa fa-square-o" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.select_all'), false); ?>"></i>
                                </button>
                                <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only"><?php echo e(trans('app.toggle_dropdown'), false); ?></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.order.cart.massTrash'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-trash"></i> <?php echo e(trans('app.trash'), false); ?></a></li>
                                    <li><a href="javascript:void(0)" data-link="<?php echo e(route('admin.order.cart.massDestroy'), false); ?>" class="massAction " data-doafter="reload"><i class="fa fa-times"></i> <?php echo e(trans('app.delete_permanently'), false); ?></a></li>
                                </ul>
                            </div>
                        </th>
                    <?php endif; ?>
                    <th><?php echo e(trans('app.created_at'), false); ?></th>
                    <th><?php echo e(trans('app.customer'), false); ?></th>
                    <th><?php echo e(trans('app.items'), false); ?></th>
                    <th><?php echo e(trans('app.quantities'), false); ?></th>
                    <th><?php echo e(trans('app.grand_total'), false); ?></th>
                    <th class="text-right"><?php echo e(trans('app.option'), false); ?></th>
                </tr>
            </thead>
            <tbody id="massSelectArea">
                <?php $__currentLoopData = $cart_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('massDelete', App\Cart::class)): ?>
                            <td><input id="<?php echo e($cart_list->id, false); ?>" type="checkbox" class="massCheck"></td>
                        <?php endif; ?>
                        <td><?php echo e($cart_list->created_at->diffForHumans(), false); ?></td>
                        <td><?php echo e($cart_list->customer->name, false); ?></td>
                        <td><?php echo e($cart_list->item_count, false); ?></td>
                        <td><?php echo e($cart_list->quantity, false); ?></td>
                        <td><?php echo e(get_formated_currency($cart_list->grand_total, true, 2), false); ?></td>
                        <td class="row-options">
                            <div class="btn-group">
                                <?php if(Gate::allows('create', App\Order::class) || Gate::allows('update', $cart_list)): ?>
                                    <?php echo Form::open(['route' => ['admin.order.order.create'], 'method' => 'get', 'style' => 'display:inline;']); ?>

                                        <?php echo e(Form::hidden('customer_id',$cart_list->customer->id), false); ?>

                                        <?php echo e(Form::hidden('cart_id',$cart_list->id), false); ?>

                                        <button type="submit" class="btn btn-sm btn-default">
                                            <i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.use_this_cart'), false); ?>" class="fa fa-check"></i> <?php echo e(trans('app.use'), false); ?>

                                        </button>
                                    <?php echo Form::close(); ?>

                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $cart_list)): ?>
                                    <a href="javascript:void(0)" data-link="<?php echo e(Route('admin.order.cart.show', $cart_list->id), false); ?>" class="ajax-modal-btn btn btn-sm btn-default">
                                        <i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.detail'), false); ?>" class="fa fa-expand"></i>
                                    </a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $cart_list)): ?>
                                    <?php echo Form::open(['route' => ['admin.order.cart.trash', $cart_list->id], 'method' => 'delete', 'style' => 'display:inline;']); ?>

                                        <button type="submit" class="btn btn-sm btn-default confirm ajax-silent">
                                            <i data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.trash'), false); ?>" class="fa fa-trash-o"></i>
                                        </button>
                                    <?php echo Form::close(); ?>

                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div> <!-- /.box-body -->
</div> <!-- /.box -->
<?php /**PATH /home/amraibes/public_html/resources/views/admin/partials/_cart_list.blade.php ENDPATH**/ ?>