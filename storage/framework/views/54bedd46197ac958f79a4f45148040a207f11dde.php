<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
        <title><?php if(trim($__env->yieldContent('template_title'))): ?><?php echo $__env->yieldContent('template_title'); ?> | <?php endif; ?> <?php echo e(trans('installer_messages.title'), false); ?></title>
        <link rel="icon" type="image/png" href="<?php echo e(asset('images/favicon.png'), false); ?>" sizes="32x32"/>
        <link href="<?php echo e(asset('installer/css/style.css'), false); ?>" rel="stylesheet"/>
        <?php echo $__env->yieldContent('style'); ?>
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body>
        <div class="master">
            <div class="box">
                <div class="header">
                    <h1 class="header__title"><?php echo $__env->yieldContent('title'); ?></h1>
                </div>
                <ul class="step">
                    <li class="step__divider"></li>
                    <li class="step__item <?php echo e(isActive('Installer.final'), false); ?>">
                        <i class="step__icon fa fa-server" aria-hidden="true"></i>
                    </li>
                    <li class="step__divider"></li>
                    <li class="step__item <?php echo e(isActive('Installer.activate'), false); ?>">
                        <?php if(Request::is('install/activate') || Request::is('install/verify') || Request::is('install/environment/wizard') || Request::is('install/environment/classic') ): ?>
                            <a href="<?php echo e(route('Installer.activate'), false); ?>">
                                <i class="step__icon fa fa-key" aria-hidden="true"></i>
                            </a>
                        <?php else: ?>
                            <i class="step__icon fa fa-key" aria-hidden="true"></i>
                        <?php endif; ?>
                    </li>
                    <li class="step__divider"></li>
                    <li class="step__item <?php echo e(isActive('Installer.environment'), false); ?> <?php echo e(isActive('Installer.environmentWizard'), false); ?> <?php echo e(isActive('Installer.environmentClassic'), false); ?>">
                        <?php if(Request::is('install/environment') || Request::is('install/environment/wizard') || Request::is('install/environment/classic') ): ?>
                            <a href="<?php echo e(route('Installer.environment'), false); ?>">
                                <i class="step__icon fa fa-cog" aria-hidden="true"></i>
                            </a>
                        <?php else: ?>
                            <i class="step__icon fa fa-cog" aria-hidden="true"></i>
                        <?php endif; ?>
                    </li>
                    <li class="step__divider"></li>
                    <li class="step__item <?php echo e(isActive('Installer.permissions'), false); ?>">
                        <?php if(Request::is('install/permissions') || Request::is('install/environment') || Request::is('install/environment/wizard') || Request::is('install/environment/classic') ): ?>
                            <a href="<?php echo e(route('Installer.permissions'), false); ?>">
                                <i class="step__icon fa fa-key" aria-hidden="true"></i>
                            </a>
                        <?php else: ?>
                            <i class="step__icon fa fa-key" aria-hidden="true"></i>
                        <?php endif; ?>
                    </li>
                    <li class="step__divider"></li>
                    <li class="step__item <?php echo e(isActive('Installer.requirements'), false); ?>">
                        <?php if(Request::is('install') || Request::is('install/requirements') || Request::is('install/permissions') || Request::is('install/environment') || Request::is('install/environment/wizard') || Request::is('install/environment/classic') ): ?>
                            <a href="<?php echo e(route('Installer.requirements'), false); ?>">
                                <i class="step__icon fa fa-list" aria-hidden="true"></i>
                            </a>
                        <?php else: ?>
                            <i class="step__icon fa fa-list" aria-hidden="true"></i>
                        <?php endif; ?>
                    </li>
                    <li class="step__divider"></li>
                    <li class="step__item <?php echo e(isActive('Installer.welcome'), false); ?>">
                        <?php if(Request::is('install') || Request::is('install/requirements') || Request::is('install/permissions') || Request::is('install/environment') || Request::is('install/environment/wizard') || Request::is('install/environment/classic') ): ?>
                            <a href="<?php echo e(route('Installer.welcome'), false); ?>">
                                <i class="step__icon fa fa-home" aria-hidden="true"></i>
                            </a>
                        <?php else: ?>
                            <i class="step__icon fa fa-home" aria-hidden="true"></i>
                        <?php endif; ?>
                    </li>
                    <li class="step__divider"></li>
                </ul>
                <div class="main" id="main-content">
                    <?php if(session('message')): ?>
                        <p class="alert text-center">
                            <strong>
                                <?php if(is_array(session('message'))): ?>
                                    <?php echo e(session('message')['message'], false); ?>

                                <?php else: ?>
                                    <?php echo e(session('message'), false); ?>

                                <?php endif; ?>
                            </strong>
                        </p>
                    <?php endif; ?>
                    <?php if(session()->has('errors')): ?>
                        <div class="alert alert-danger" id="error_alert">
                            <h4>
                                <i class="fa fa-fw fa-exclamation-triangle" aria-hidden="true"></i>
                                <?php echo e(trans('installer_messages.forms.errorTitle'), false); ?>

                            </h4>
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error, false); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php echo $__env->yieldContent('container'); ?>
                </div>
            </div>
        </div>
        <?php echo $__env->yieldContent('scripts'); ?>
        <script type="text/javascript">
            var x = document.getElementById('error_alert');
            var y = document.getElementById('close_alert');
            if(y){
                y.onclick = function() {
                    x.style.display = "none";
                };
            }

            function btnBusy(e) {
                e.target.children[0].className = "fa fa-spinner fa-spin";
            }

            function changeText() {
                document.getElementById('main-content').innerHTML = '<div class="alert alert-info"><i class="fa fa-cog fa-spin"></i> <?php echo trans('installer_messages.wait'); ?></div>';
            };
        </script>
    </body>
</html>
<?php /**PATH /home/amraibest.com/public_html/resources/views/installer/layouts/master.blade.php ENDPATH**/ ?>