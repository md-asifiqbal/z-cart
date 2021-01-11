<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no">
        <title> <?php echo e(get_platform_title(), false); ?> </title>
        <link rel="icon" href="<?php echo e(Storage::url('icon.png'), false); ?>" type="image/x-icon" />
        <link rel="manifest" href="<?php echo e(asset('site.webmanifest'), false); ?>">
        <link rel="apple-touch-icon" href="<?php echo e(Storage::url('icon.png'), false); ?>">

        <!-- Theme CSS -->
        <link href="<?php echo e(selling_theme_asset_url('css/vendor.css'), false); ?>" rel="stylesheet">
        <link href="<?php echo e(selling_theme_asset_url('css/agency.css'), false); ?>" rel="stylesheet">
        <link href="<?php echo e(selling_theme_asset_url('css/style.css'), false); ?>" rel="stylesheet">

        <!-- Ionicons -->
        

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    </head>

    <body id="page-top" class="index">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Navigation -->
        <?php echo $__env->make('nav.mainnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Header -->
        <header>
            <div class="container">
                <div class="intro-text">
                    <div class="intro-lead-in"><?php echo e(__('theme.intro_lead'), false); ?></div>
                    <div class="intro-heading"><?php echo e(__('theme.intro_heading'), false); ?></div>
                    <a href="<?php echo e(route('register'), false); ?>" class="btn btn-primary btn-lg selling"><?php echo e(__('theme.button.selling'), false); ?></a>

                    <?php if(is_subscription_enabled()): ?>
                        <p class="sellin-price-tagline"><?php echo e(__('theme.selling_price_taglind', ['price' => get_formated_currency($subscription_plans->min('cost'))]), false); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </header>

        <!-- Services Section -->
        <section id="services">
            <?php echo $__env->yieldContent('content'); ?>
        </section>


        <!-- Contact Section -->
        <section id="contact">
            <?php echo $__env->make('contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </section>

        <footer class="page-footer font-small indigo pt-0">
            <div class="container">
                <ul class="quicklinks navbar nav-justified text-center">
                    <li><a href="<?php echo e(route('page.open', \App\Page::PAGE_ABOUT_US), false); ?>" target="_blank"><?php echo e(trans('theme.nav.about_us'), false); ?></a></li>
                    <li><a href="<?php echo e(route('page.open', \App\Page::PAGE_PRIVACY_POLICY), false); ?>" target="_blank"><?php echo e(trans('theme.nav.privacy_policy'), false); ?></a></li>
                    <li><a href="<?php echo e(route('page.open', \App\Page::PAGE_TNC_FOR_MERCHANT), false); ?>" target="_blank"><?php echo e(trans('theme.nav.term_and_conditions'), false); ?></a></li>
                    <li><a href="<?php echo e(route('page.open', \App\Page::PAGE_RETURN_AND_REFUND), false); ?>" target="_blank"><?php echo e(trans('theme.nav.return_and_refund_policy'), false); ?></a></li>
                </ul>

                <div class="row">
                    <div class="col-md-4">
                        <span class="copyright"><?php echo e(get_platform_title(), false); ?></span>
                    </div>
                    <div class="col-md-4 text-center">
                        <span class="copyright">
                            © <?php echo e(date('Y'), false); ?> <a href="<?php echo e(url('/'), false); ?>"><?php echo e(get_platform_title(), false); ?></a>
                        </span>
                    </div>
                    <div class="col-md-4 ">
                        <?php if($social_media_links = get_social_media_links()): ?>
                            <ul class="list-inline social-buttons pull-right">
                                <?php $__currentLoopData = $social_media_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social_media => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e($link, false); ?>" target="_blank"><i class="fa fa-<?php echo e($social_media, false); ?>"></i></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </footer> <!--/Footer-->

        <!-- Portfolio Modals -->
        <!-- Use the modals below to showcase details about your portfolio projects! -->

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- Plugin JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

        <!-- Contact Form JavaScript -->
        
        

        <!-- Theme JavaScript -->
        <script src="<?php echo e(selling_theme_asset_url('js/jqBootstrapValidation.min.js'), false); ?>"></script>
        <script src="<?php echo e(selling_theme_asset_url('js/app.js'), false); ?>"></script>
    </body>
</html>
<?php /**PATH /home/amraibes/public_html/public/themes/_selling/default/views/layouts/main.blade.php ENDPATH**/ ?>