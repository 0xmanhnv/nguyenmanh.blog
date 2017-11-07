<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('blog_asset/css/style_custom.css')); ?>" rel="stylesheet" type="text/css"></link>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebarRight'); ?>
    <div class="card">
        <div class="header text-center">
            <h2>Sidebar</h2>
        </div>
        <div class="body">
            <div id="real_time_chart" class="dashboard-flot-chart"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('zentgroup.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>