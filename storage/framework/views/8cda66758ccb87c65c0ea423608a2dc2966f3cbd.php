<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> <?php echo e(trans('theme.nav.menu'), false); ?> <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="<?php echo e(url('/'), false); ?>">
                <?php if( Storage::exists('logo.png') ): ?>
                  <img src="<?php echo e(url('image/logo.png'), false); ?>" class="brand-logo" alt="<?php echo e(trans('app.logo'), false); ?>" title="<?php echo e(trans('app.logo'), false); ?>" />
                <?php else: ?>
                  <img src="https://placehold.it/140x60/eee?text=<?php echo e(get_platform_title(), false); ?>" class="brand-logo" alt="LOGO" title="LOGO" />
                <?php endif; ?>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    
                </li>
                <li>
                    <a class="page-scroll" href="#contact"><?php echo e(trans('theme.nav.contact_us'), false); ?></a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<?php /**PATH /home/amraibes/public_html/public/themes/_selling/default/views/nav/mainnav.blade.php ENDPATH**/ ?>