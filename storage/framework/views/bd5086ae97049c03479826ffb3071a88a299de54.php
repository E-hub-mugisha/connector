<?php $__env->startSection('title','Service Category'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
  <button type="button" class="btn btn-primary btn-sm m-2" data-toggle="modal" data-target="#CategoryModal">
    Add Category
  </button>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><?php echo $__env->yieldContent('title'); ?></h6>

    </div>
    <!-- add category Modal-->
    <div class="modal fade" id="CategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <?php if(Session::has('message')): ?>
          <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
          <?php endif; ?>
          <form action="<?php echo e(route('admin.create_service_category')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="modal-body">

              <div class="form-group">
                <label for="name" value="<?php echo e(__('Category name')); ?>">Category name *</label>
                <input type="text" class="form-control" id="name" name="name" required>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div><!-- End .form-group -->

              <div class="form-group">
                <label for="subcategory" value="<?php echo e(__('SubCategory')); ?>">subcategory</label>
                <select class="form-control" name="service_category_id" id="service_category_id">
                  <option value="">None</option>
                  <?php $__currentLoopData = $scategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div><!-- End .form-group -->
              <div class="form-group">
                <label for="image" value="<?php echo e(__('Category image')); ?>">Category image</label>
                <input type="file" class="form-control" id="image" name="image" required>
                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

              </div><!-- End .form-group -->


            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">
                Add Category
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <?php if(Session::has('message')): ?>
        <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>image</th>
              <th>category name</th>
              <th>Featured</th>
              <th>Subcategory</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>image</th>
              <th>category name</th>
              <th>Featured</th>
              <th>Subcategory</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            <?php $__currentLoopData = $scategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($scategory->id); ?></td>
              <td>
                <a href="#">
                  <img src="<?php echo e(asset('image/categories')); ?>/<?php echo e($scategory->image); ?>" alt="<?php echo e($scategory->name); ?>" height="50" width="60">
                </a>
              </td>
              <td>
                <?php echo e($scategory->name); ?>

              </td>
              <td>
                <?php if($scategory->featured): ?>
                Yes
                <?php else: ?>
                No
                <?php endif; ?>
              </td>
              <td>
                <ul class="sclist">
                  <?php $__currentLoopData = $scategory->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($scat->name); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </td>
              <td class="action-col">
                <a href="<?php echo e(route('admin.service_by_category',['category_slug'=>$scategory->slug])); ?>" class="btn btn-success btn-circle">
                  <i class="fas fa-check"></i>
                </a>
                <a href="<?php echo e(route('admin.edit_service_category',$scategory->id)); ?>" class="btn btn-info btn-circle">
                  <i class="fas fa-info-circle"></i>
                </a>
                <form id="delete-form" action="<?php echo e(route('admin.delete_service_category',$scategory->id)); ?>" method="POST">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button type="submit" class="btn btn-danger btn-circle" onclick="return confirm('Are you sure you want to delete this category?')">

                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- DataTales Example -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/admin/service-category/index.blade.php ENDPATH**/ ?>