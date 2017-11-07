<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('blog_asset/css/style_custom.css')); ?>" rel="stylesheet" type="text/css"></link>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
     <div class="card">
        <div class="header text-center">
            <h2>Groups Facebook</h2>
        </div>
        <div class="body">
            <div class="table-responsive">
            	<table class="table table-hover table-bordered">
            		<thead>
            			<tr>
            				<th>Tên</th>
            				<th>Hành động</th>
            			</tr>
            		</thead>
            		<tbody>
            			<?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	            			<tr>
	            				<td><?php echo e($group['name']); ?></td>
	    						<td>
	    							 <div class="btn-group">
										 <button type="button" class="btn btn-info">Vào</button>
										 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#group-<?php echo e($group['id']); ?>">Đăng bài</button>
										 <a href="<?php echo e(url('zentgroup/'.$group['id'].'/members')); ?>" class="btn btn-primary">Thành Viên</a>
									</div> 
	    						</td>
	            			</tr>
	            			<div id="group-<?php echo e($group['id']); ?>" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							        <h4 class="modal-title text-center"><?php echo e($group['name']); ?></h4>
							      </div>
							      <div class="modal-body">
							         <form method="post" action="<?php echo e(url('zentgroup/group/'.$group['id'].'/feed')); ?>">
							         	<?php echo e(csrf_field()); ?>

									  <div class="form-group form-float">
		                                    <div class="form-line">
		                                        <textarea name="messages" cols="30" rows="5" class="form-control no-resize" required></textarea>
		                                        <label class="form-label">messages</label>
		                                    </div>
		                                </div>
									  <button type="submit" class="btn btn-info">Đăng bài</button>
									</form> 
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							      </div>
							    </div>

							  </div>
							</div>
            			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('zentgroup.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>