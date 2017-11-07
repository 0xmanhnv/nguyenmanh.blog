<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('blog_asset/css/style_custom.css')); ?>" rel="stylesheet" type="text/css"></link>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
     <div class="card">
        <div class="header text-center">
            <h2><?php echo e('Thành Viên'); ?></h2>
        </div>
        <div class="body">
            <div class="table-responsive">
            	<table class="table table-hover table-bordered">
            		<thead>
            			<tr>
            				<th>Tên</th>
                            <th>Admin</th>
            				<th>Hành động</th>
            			</tr>
            		</thead>
            		<tbody>
            			<?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	            			<tr>
	            				<td><?php echo e($member['name']); ?></td>
                                <td>
                                    <?php if($member['administrator']): ?>
                                        <?php echo e('1'); ?>

                                    <?php endif; ?>
                                </td>
	    						<td>
	    							 <div class="btn-group">
										 <button type="button" class="btn btn-info">Vào</button>
										 <button type="button" class="btn btn-danger">Đăng bài</button>
										 <a href="<?php echo e(url('zentgroup/'.$member['id'].'/members')); ?>" class="btn btn-primary">Thành Viên</a>
									</div> 
	    						</td>
	            			</tr>
            			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('zentgroup.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>