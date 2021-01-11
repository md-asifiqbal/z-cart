<!DOCTYPE html>
<html>
    <head>
        <title><?php echo app('translator')->getFromJson('app.marketplace_down'); ?></title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                padding: 0 20px;
                font-size: 42px;
                margin-top: 20px;
                margin-bottom: 40px;
            }
            .brand-logo {
              max-width: 140px;
              max-height: 50px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <a href="<?php echo e(url('/'), false); ?>">
                    <?php if( Storage::exists('logo.png') ): ?>
                        <img src="<?php echo e(get_storage_file_url('logo.png', 'full'), false); ?>" class="brand-logo" alt="<?php echo e(trans('app.logo'), false); ?>" title="<?php echo e(trans('app.logo'), false); ?>">
                    <?php else: ?>
                      <img src="https://placehold.it/140x60/eee?text=<?php echo e(get_platform_title(), false); ?>" class="brand-logo" alt="LOGO" title="LOGO" />
                    <?php endif; ?>
                </a>
                <div class="title"><?php echo e(trans('responses.404_not_found'), false); ?></div>
                <a href="<?php echo e(url()->previous(), false); ?>"><?php echo app('translator')->getFromJson('theme.button.go_back'); ?></a>
            </div>
        </div>
    </body>
</html>
<?php /**PATH /home/amraibes/public_html/resources/views/errors/404.blade.php ENDPATH**/ ?>