<script <?php echo $chart->displayScriptAttributes(); ?>>
    function <?php echo e($chart->id, false); ?>_create(data) {
        <?php echo e($chart->id, false); ?>_rendered = true;
        document.getElementById("<?php echo e($chart->id, false); ?>_loader").style.display = 'none';
        window.<?php echo e($chart->id, false); ?> = new Highcharts.Chart("<?php echo e($chart->id, false); ?>", {
            series: data,
            <?php echo $chart->formatOptions(false, true); ?>

        });
    }
    <?php if($chart->api_url): ?>
    let <?php echo e($chart->id, false); ?>_refresh = function (url) {
        document.getElementById("<?php echo e($chart->id, false); ?>").style.display = 'none';
        document.getElementById("<?php echo e($chart->id, false); ?>_loader").style.display = 'flex';
        if (typeof url !== 'undefined') {
            <?php echo e($chart->id, false); ?>_api_url = url;
        }
        fetch(<?php echo e($chart->id, false); ?>_api_url)
            .then(data => data.json())
            .then(data => {
                document.getElementById("<?php echo e($chart->id, false); ?>_loader").style.display = 'none';
                document.getElementById("<?php echo e($chart->id, false); ?>").style.display = 'block';
                <?php echo e($chart->id, false); ?>.update({series: data});
            });
    };
    <?php endif; ?>
    <?php echo $__env->make('charts::init', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</script>
<?php /**PATH /home/amraibest.com/public_html/vendor/consoletvs/charts/src/Views/highcharts/script.blade.php ENDPATH**/ ?>