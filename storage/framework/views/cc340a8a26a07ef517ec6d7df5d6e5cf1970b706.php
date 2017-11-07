<?php $__env->startSection('css'); ?>
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo e(asset('admin_nguyenmanh/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>">
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
  
  <?php if(!is_null(Cookie::get('create_post'))): ?>
    <div class="popupunder alert alert-success fade in">
      <button type="button" class="close close-sm" data-dismiss="alert">
        <i class="glyphicon glyphicon-remove"></i>
      </button>
      <strong>Success : </strong> <?php echo e(Cookie::get('create_post')); ?>

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
              <input type="text" class="form-control" id="title-post" name="title" placeholder="Tiêu đề bài viết">
            </div>
            <div class="form-group">
              <label for="description-post">Description:</label>
              <textarea class="form-control" rows="5" id="description-post" name="description" value="<?php echo e(old('description')); ?>">
                
              </textarea>
            </div> 
            <div class="form-group">
              <label for="category-post">Select list:</label>
              <select class="form-control" id="category-post" name="category_id">
                <?php if(isset($categories)): ?>
                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </select>
            </div> 
            <div class="form-group">
              <textarea id="editor-post" name="content" rows="50" cols="80" placeholder="Thêm nội dung bài viết....">
                <?php echo e(old('content')); ?>

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
      CKEDITOR.replace('editor-post');
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5();

      $('.popovers').popover();
        window.setTimeout(function() {
          $(".alert").fadeTo(2000, 500).slideUp(500, function(){
          $(this).remove(); 
          });
        // 500 : Time will remain on the screen
        }, 500);
    })
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>