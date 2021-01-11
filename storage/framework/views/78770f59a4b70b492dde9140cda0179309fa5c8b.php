<!-- CONTENT SECTION -->
<div class="clearfix space50"></div>
<section>
  <div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="contact-info">
                <h2 class="space20">&nbsp;</h2>
                <div class="media-list">
                    <?php if(config('system_settings.support_phone')): ?>
                        <div class="media space20">
                            <i class="pull-left fa fa-phone"></i>
                            <div class="media-body">
                                <h4><?php echo app('translator')->getFromJson('theme.phone'); ?>:</h4>
                                <?php echo e(config('system_settings.support_phone'), false); ?>

                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if(config('system_settings.support_phone_toll_free')): ?>
                        <div class="media space20">
                            <i class="pull-left fa fa-phone-square"></i>
                            <div class="media-body">
                                <h4><?php echo app('translator')->getFromJson('theme.phone'); ?>: (<?php echo app('translator')->getFromJson('theme.toll_free'); ?>)</h4>
                                <?php echo e(config('system_settings.support_phone_toll_free'), false); ?>

                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if(config('system_settings.support_email')): ?>
                        <div class="media space20">
                            <i class="pull-left fa fa-envelope-o"></i>
                            <div class="media-body">
                                <h4><?php echo app('translator')->getFromJson('theme.email'); ?>:</h4>
                                <a href="mailto:<?php echo e(config('system_settings.support_email'), false); ?>"><?php echo e(config('system_settings.support_email'), false); ?></a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div><!-- /.col-md-4 -->

        <div class="col-md-8">

            <?php echo $__env->make('forms.contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div><!-- /.col-md-8 -->
    </div>
  </div>
</section>
<!-- END CONTENT SECTION -->
<div class="clearfix space50"></div><?php /**PATH /home/amraibes/public_html/public/themes/default/views/layouts/contact_us.blade.php ENDPATH**/ ?>