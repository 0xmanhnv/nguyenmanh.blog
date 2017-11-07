<?php $__env->startSection('css'); ?>
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo e(asset('admin_nguyenmanh/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
  
  <?php if(!is_null(Cookie::get('success'))): ?>
    <div class="popupunder alert alert-success fade in">
      <button type="button" class="close close-sm" data-dismiss="alert">
        <i class="glyphicon glyphicon-remove"></i>
      </button>
      <strong>Success : </strong> <?php echo e(Cookie::get('success')); ?>

    </div>
  <?php endif; ?>
  
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">NỘI DUNG
          </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body pad">
          <form action="" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="form-group">
              <label for="title-post">Title:</label>
              <input type="text" class="form-control" id="title-post" name="title" value="<?php echo e($post->title); ?>">
            </div>
            <div class="form-group">
              <label for="description-post">Description:</label>
              <textarea class="form-control" rows="5" id="description-post" name="description">
                <?php echo e($post->description); ?>

              </textarea>
            </div> 
            <div class="form-group">
              <textarea id="editor-post" name="content" rows="50" cols="80" height="500px">
                <?php echo e($post->content); ?>

              </textarea>
            </div>
            <div class="pull-right box-tools">
              <button type="submit" class="btn btn-success">Cập nhật</button>
            </div>
          </form>
        </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
  <script src="<?php echo e(asset('admin_nguyenmanh/bower_components/ckeditor/ckeditor.js')); ?>"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?php echo e(asset('admin_nguyenmanh/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
  <script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor-post')
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5()
    })
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>