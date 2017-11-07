<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('blog_asset/css/style_custom.css')); ?>" rel="stylesheet" type="text/css"></link>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="header text-center">
            <h2><u>CATEGORY:</u> <?php echo e($category->name); ?></h2>
        </div>
        <div class="body">
        	<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="media media-post" >
                    <div class="col-md-4">
                        <div class="media-left">
                            <a href="javascript:void(0);">
                                <img class="media-object media-post-thumbnail" src="<?php echo e($post->thumbnail); ?>" >
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="media-body">
                            <a href="<?php echo e($post->slug); ?>" class="media-post-title">
                                <h4 class="media-heading"><?php echo e($post->title); ?></h4>
                            </a>
                            <div class="media-post-info">
                                
                                   
                                
                                <a href="" class="media-post-author">
                                     <span class="label label-danger">Tác giả: </span>
                                    <?php echo e($post->author); ?>

                                </a>
                            </div>
                            <div class="media-post-description">
                                <?php echo e(\Illuminate\Support\Str::words($post->description , 20, ' ...')); ?>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="text-center">
                <?php echo e($posts->links()); ?>

            </div>
        </div>
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