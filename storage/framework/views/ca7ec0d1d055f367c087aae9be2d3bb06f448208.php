<!DOCTYPE html>
<html>
    <head>
        <title><?php echo e(trans('messages.permission.denied'), false); ?></title>
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
                font-size: 72px;
                margin-bottom: 40px;
            }
            a{
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title"><?php echo e(trans('messages.permission.denied'), false); ?></div>
                <a href="<?php echo e(route('admin.admin.dashboard'), false); ?>" class="btn btn-default">::Back to dashboard::</a>
            </div>
        </div>
    </body>
</html>
<?php /**PATH /home/amraibest.com/public_html/resources/views/errors/forbidden.blade.php ENDPATH**/ ?>