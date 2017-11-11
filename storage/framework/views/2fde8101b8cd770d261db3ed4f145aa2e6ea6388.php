<?php $__env->startSection('css'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('blog_nguyenmanh/css/author.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="https://scontent.fhan2-3.fna.fbcdn.net/v/t1.0-9/23032754_1319030634909161_8414838974445845780_n.jpg?oh=ff67e0299b2a3e30c556bac49c904748&oe=5A69004F" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo e($user->user_name); ?>

					</div>
					<div class="profile-usertitle-job">
						Developer
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="fa fa-facebook-official" aria-hidden="true"></i>
							Facebook </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
	        <div class="profile-content">
			   <div class="row">
			   	<div class="col-md-12">
					<div class="row">
				    
				        <div class="timeline-centered">
							<?php $__currentLoopData = $user->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						        <article class="timeline-entry">

						            <div class="timeline-entry-inner">
										<?php if($key % 2 != 0): ?>
							                <div class="timeline-icon bg-success">
							                    <i class="entypo-feather"></i>
							                </div>
										<?php else: ?>
											<div class="timeline-icon bg-secondary">
							                    <i class="entypo-suitcase"></i>
							                </div>
							            <?php endif; ?>
						                <div class="timeline-label">
						                    <h2>
						                    	<a href="<?php echo e(route('blog.post', [$post->id, $post->slug])); ?>"><?php echo e($post->title); ?></a> 
						                    	<p style="color: red;">
						                    		<a href="<?php echo e(route('blog.category', [$post->category->id, $post->category->slug])); ?>">
							                    		<span class="label label-danger">
							                    			<?php echo e($post->category->name); ?> 
							                    		</span>
							                    	</a>
						                    	</p>
						                    </h2>
						                    <p><?php echo e($post->description); ?></p>
						                </div>
						            </div>

						        </article>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					    </div>
					</div>
			   	</div>
			   </div>
	        </div>
		</div>
	</div>
	<center>
	</center>
	<br>
	<br>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	<script type="text/javascript" src="<?php echo e(asset('blog_nguyenmanh/js/author.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('blog.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>