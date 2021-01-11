<div class="modal fade" id="contactSellerModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content flat">
        <div class="modal-header">
            <a class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
            <?php echo e(trans('theme.button.contact_seller'), false); ?>

        </div>
        <div class="modal-body">
            <?php echo Form::open(['route' => ['seller.contact', $item->shop->slug], 'data-toggle' => 'validator']); ?>

                <?php echo Form::hidden('product_id', $item->id); ?>

                <div class="form-group">
                    <?php echo Form::label('subject', trans('theme.subject').'*'); ?>

                    <?php echo Form::text('subject', Null, ['class' => 'form-control flat', 'placeholder' => trans('theme.placeholder.contact_us_subject'), 'required']); ?>

                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <?php echo Form::label('message', trans('theme.write_your_message').'*'); ?>

                    <?php echo Form::textarea('message', Null, ['class' => 'form-control flat', 'rows' => '4', 'placeholder' => trans('theme.placeholder.message'), 'required']); ?>

                    <div class="help-block with-errors"></div>
                </div>

                <div class="row">
                    <div class="col-md-6 nopadding-right">
                        <div class="form-group">
                            <?php if(config('services.recaptcha.key')): ?>
                              <div class="g-recaptcha" data-sitekey="<?php echo e(config('services.recaptcha.key'), false); ?>"></div>
                            <?php endif; ?>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6 nopadding-left">
                        <div class="form-group">
                            <div class="space10"></div>
                            <button type="submit" class='btn btn-primary btn-lg pull-right flat'><i class="fa fa-paper-plane"></i> <?php echo e(trans('theme.button.send_message'), false); ?></button>
                        </div>
                    </div>
                </div>
            <?php echo Form::close(); ?>

            <small class="help-block text-muted">* <?php echo e(trans('theme.help.required_fields'), false); ?></small>
        </div><!-- /.modal-body -->
        <div class="modal-footer">
        </div>
    </div><!-- /.modal-content -->
</div><!-- /#disputeOpenModal -->

<script src='https://www.google.com/recaptcha/api.js'></script>
<?php /**PATH /home/amraibes/public_html/public/themes/default/views/modals/contact_seller.blade.php ENDPATH**/ ?>