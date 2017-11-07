<?php $__env->startSection('css'); ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('admin_nguyenmanh/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">
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
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Danh sách sản phẩm</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="posts-table" class="table table-condensed table-bordered">
            <thead>
              <tr>
                <th class="text-center">Id</th>
                <th class="text-center">title</th>
                <th class="text-center">Ngày tạo</th>
                <th class="text-center">Hành động</th>
              </tr>
            </thead>
          </table>
          
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>
  <!-- DataTables -->
  <script src="<?php echo e(asset('admin_nguyenmanh/bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
  <script src="<?php echo e(asset('admin_nguyenmanh/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
  <script type="text/javascript">
    $(function () {
      $('#posts-table').DataTable( {
          processing: true,
          serverSide: true,
          responsive:true,
          "ajax": "http://127.0.0.1:8000/admin/json/posts",
          "columns": [
              { "data": "id" },
              { "data": "title"},
              { "data": "created_at" },
              { "data": "action", orderable: false, searchable: false},
          ]
      } );
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>