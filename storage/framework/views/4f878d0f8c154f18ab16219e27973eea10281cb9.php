<!doctype html>
<html class="no-js" lang="<?php echo e(str_replace('_', '-', app()->getLocale()), false); ?>">
    <head>
        <?php echo $__env->make('meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <link href='https://fonts.googleapis.com/css?family=Roboto:500,300,700,400italic,400' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>

        <link href="<?php echo e(theme_asset_url('css/vendor.css'), false); ?>" rel="stylesheet">
        <link href="<?php echo e(theme_asset_url('css/style.css'), false); ?>" rel="stylesheet">
    </head>
    <body class="<?php echo e(config('active_locales')->firstWhere('code', App::getLocale())->rtl ? 'rtl' : 'ltr', false); ?>">
        <!--[if lte IE 9]>
          <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <?php if(Session::has('global_announcement')): ?>
            <div id="global-announcement">
                <?php echo session('global_announcement')->parsed_body; ?>

                <?php if(session('global_announcement')->action_url): ?>
                  <span class="indent10">
                    <a href="<?php echo e(session('global_announcement')->action_url, false); ?>" class="btn btn-sm">
                        <?php echo e(session('global_announcement')->action_text, false); ?>

                    </a>
                  </span>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div id="global-wrapper" class="clearfix">
            <!-- VALIDATION ERRORS -->
            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong><?php echo e(trans('theme.error'), false); ?>!</strong> <?php echo e(trans('messages.input_error'), false); ?><br><br>
                  <ul class="list-group">
                      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item list-group-item-danger"><?php echo e($error, false); ?></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </div>
            <?php endif; ?>

            <!-- MAIN NAVIGATIONS -->
            <?php echo $__env->make('nav.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- MAIN CONTENT -->
            <div id="content-wrapper">
                <?php echo $__env->yieldContent('content'); ?>
            </div>

            <!-- MAIN FOOTER -->
            <?php echo $__env->make('nav.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- COPYRIGHT AREA -->
            <?php echo $__env->make('nav.copyright', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div><!-- /#global-wrapper -->

        <div id="loading">
            <img id="loading-image" src="<?php echo e(theme_asset_url('img/loading.gif'), false); ?>" alt="busy...">
        </div>

        <!-- MODALS -->
        <?php if (! (Auth::guard('customer')->check())): ?>
            <?php echo $__env->make('auth.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <!-- Quick View Modal-->
        <div id="quickViewModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false"></div>

        <!-- my Dynamic Modal-->
        <div id="myDynamicModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false"></div>

        <!-- SCRIPTS -->
        <script src="<?php echo e(theme_asset_url('js/vendor.js'), false); ?>"></script>
        <script src="<?php echo e(theme_asset_url('js/jquery.simplecolorpicker.js'), false); ?>"></script>

        <!-- Notification -->
        <?php echo $__env->make('notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- AppJS -->
        <?php echo $__env->make('scripts.appjs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Page Scripts -->
        <?php echo $__env->yieldContent('scripts'); ?>

    </body>
</html><?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/layouts/main.blade.php ENDPATH**/ ?>