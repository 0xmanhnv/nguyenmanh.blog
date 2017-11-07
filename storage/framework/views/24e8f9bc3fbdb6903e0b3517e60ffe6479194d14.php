<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('blog_asset/css/style_custom.css')); ?>" rel="stylesheet" type="text/css"></link>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6">
                <div class="card">
                    <div class="header bg-red">
                        <h2 class="text-center">
                            <?php echo e($category->name); ?>

                            
                        </h2>
                        
                    </div>
                    <div class="body">
                        Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra.
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
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

<?php echo $__env->make('blog.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>