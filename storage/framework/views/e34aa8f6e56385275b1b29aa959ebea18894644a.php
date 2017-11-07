<?php $__env->startSection('content'); ?>
    <?php if(isset($posts)): ?>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="row article">
                <div class="col-xs-12">
                    <div class="block-postMeta postMeta-previewHeader">
                        <div class="u-floatLeft">
                            <div class="postMetaInline-avatar">
                                <a class="link avatar u-color--link" href="#">
                                    <img class="img-responsive avatar-image u-xs-size32x32 u-sm-size36x36" src="https://scontent.fhan2-3.fna.fbcdn.net/v/t1.0-9/23032754_1319030634909161_8414838974445845780_n.jpg?oh=ff67e0299b2a3e30c556bac49c904748&oe=5A69004F">
                                </a>
                            </div>
                            <div class="postMetaInline-feedSummary">
                                <a class="link link link--darken link--accent u-accentColor--textNormal u-accentColor--textDarken u-color--link" href="#">
                                    
                                </a>
                                <span class="POSTMETAINLINE postMetaInline--supplemental">
                                    <?php echo e($post->created_at->diffForHumans()); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <a href="<?php echo e(url('blog/'.$post->slug.'/'.$post->id)); ?>">
                        <h3 class="title"><?php echo e($post->title); ?></h3>
                    </a>
                    <span>
                        <?php echo e(\Illuminate\Support\Str::words($post->description , 30, ' ...')); ?>

                        <a href="<?php echo e(url('blog/'.$post->slug.'/'.$post->id)); ?>"> Xem thêm</a>
                    </span>
                </div>
            </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="text-center">
            
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('blog.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>