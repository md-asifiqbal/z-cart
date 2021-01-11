$(document).ready(function(){
    $.notify({
        // oprions
        icon: 'fa fa-<?php echo e($icon ?? 'paw', false); ?>',
        title: "<strong><?php echo e(trans('theme.'.$type), false); ?>:</strong> ",
        message: '<?php echo e($message ?? '', false); ?>'
    },{
    	// settings
        type: '<?php echo e($type ?? 'info', false); ?>',
        delay: 1500,
        placement: {
            from: "top",
            align: "right"
        },
    });
});
<?php /**PATH /home/amraibest.com/public_html/public/themes/default/views/layouts/notification.blade.php ENDPATH**/ ?>