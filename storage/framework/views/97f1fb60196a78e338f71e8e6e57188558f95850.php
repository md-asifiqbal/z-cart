<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="author" content="Incevio | incevio.com">

    <title><?php echo $title ?? get_site_title(); ?></title>

    <link rel="manifest" href="<?php echo e(asset('site.webmanifest'), false); ?>">
    <link rel="icon" href="<?php echo e(get_storage_file_url('icon.png', 'full'), false); ?>" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo e(get_storage_file_url('icon.png', 'full'), false); ?>">

    <!-- Scripts -->
    <link href="<?php echo e(mix("css/app.css"), false); ?>" rel="stylesheet">

    <!-- START Page specific Stylesheets -->
    <?php echo $__env->yieldContent("page-style"); ?>
    <!-- END Page specific Stylesheets -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-blue-light                         |
  |               | skin-black                              |
  |               | skin-black-light                        |
  |               | skin-purple                             |
  |               | skin-purple-light                       |
  |               | skin-yellow                             |
  |               | skin-yellow-light                       |
  |               | skin-red                                |
  |               | skin-red-light                          |
  |               | skin-green                              |
  |               | skin-green-light                        |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">

      <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <?php if(View::hasSection('buttons') || isset($page_title)): ?>
            <section class="content-header">
              <h1>
                <?php echo $page_title ?? ''; ?>

                <small><?php echo $page_description ?? ''; ?></small>
              </h1>
              <span class='opt-button'>

                <?php echo $__env->yieldContent("buttons"); ?>

              </span>
            </section>
          <?php endif; ?>

          <!-- Main content -->
          <section class="content">
              
              <?php if(Request::session()->has('impersonated')): ?>
                <div class="callout callout-info">
                  <p>
                    <strong><i class="icon ion-md-nuclear"></i> <?php echo e(trans('app.alert'), false); ?></strong>
                    <?php echo e(trans('messages.you_are_impersonated'), false); ?>

                    <a href="<?php echo e(route('admin.secretLogout'), false); ?>" class="nav-link pull-right"><i class="fa fa-sign-out" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('app.log_out'), false); ?>"></i></a>
                  </p>
                </div>
              <?php endif; ?>

              <!-- VALIDATION ERRORS -->
              <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                  <strong><?php echo e(trans('app.error'), false); ?>!</strong> <?php echo e(trans('messages.input_error'), false); ?><br><br>
                  <ul class="list-group">
                      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item list-group-item-danger"><?php echo e($error, false); ?></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </div>
              <?php endif; ?>

              
              <?php echo $__env->make('admin.partials._global_notice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              
              <?php if(Auth::user()->isFromMerchant()): ?>

                <?php if(Auth::user()->hasBillingInfo() || ! is_billing_info_required()): ?>
                    <?php if(! Auth::user()->isVerified()): ?>
                        <div class="alert alert-info alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <strong><i class="icon fa fa-info-circle"></i><?php echo e(trans('app.notice'), false); ?></strong>
                          <?php echo e(trans('messages.email_verification_notice'), false); ?>

                            <a href="<?php echo e(route('verify'), false); ?>"><?php echo e(trans('app.resend_verification_link'), false); ?></a>
                        </div>
                    <?php endif; ?>

                    <?php echo $__env->make('admin.partials._listings_notice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
              <?php endif; ?>

              
              <?php echo $__env->yieldContent("content"); ?>

          </section>
          <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <?php echo $__env->make('admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <?php echo $__env->make('admin.control_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

      <!--Modal-->
      <div id="myDynamicModal" class="modal fade" aria-hidden="true" data-backdrop="static" data-keyboard="false"></div>
    </div><!-- ./wrapper -->

    <div class="loader">
      <center>
        <img class="loading-image" src="<?php echo e(asset('images/gears.gif'), false); ?>" alt="busy...">
      </center>
    </div>

    <script src="<?php echo e(mix("js/app.js"), false); ?>"></script>

    
    
    <!-- jQuery 2.1.4  -->
    
    

    <!-- Notification -->
    <?php echo $__env->make('admin.notification', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- START Page specific Script -->
    <?php echo $__env->yieldContent("page-script"); ?>
    <!-- END Page specific Script -->

    <!-- Scripts -->
    <?php echo $__env->make('admin.footer_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
</html><?php /**PATH /home/amraibes/public_html/resources/views/admin/layouts/master.blade.php ENDPATH**/ ?>