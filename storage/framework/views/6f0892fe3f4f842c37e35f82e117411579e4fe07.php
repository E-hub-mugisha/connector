<?php $__env->startSection('title','Add Hours'); ?>
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-10">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add Working hours</h6>
                </div>
                <div class="card-body">
                    <?php if(Session::has('message')): ?>
                    <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
                    <?php endif; ?>

    <form action="<?php echo e(route('working_hours.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="sprovider_id" value="<?php echo e($sprovider->id); ?>">
        <div class="mb-3">
            <label for="day" class="form-label">Day</label>
            <input type="text" class="form-control" name="day" id="day" placeholder="Enter Day">
            <?php $__errorArgs = ['day'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="mb-3">
            <label for="is_closed" class="form-label">Is Closed</label>
            <input type="checkbox" name="is_closed" id="is_closed" value="1">
        </div>
        <div class="mb-3">
            <label for="start_time" class="form-label">Start Time</label>
            <input type="time" class="form-control" name="start_time" id="start_time">
            <?php $__errorArgs = ['start_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="mb-3">
            <label for="end_time" class="form-label">End Time</label>
            <input type="time" class="form-control" name="end_time" id="end_time">
            <?php $__errorArgs = ['end_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="text-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
            </div>
        </div>
    </div>
</div>
<script>
document.getElementById('is_closed').addEventListener('change', function() {
    let timeFields = document.querySelectorAll('#time-fields');
    if (this.checked) {
        timeFields.forEach(function(field) {
            field.style.display = 'none';
        });
    } else {
        timeFields.forEach(function(field) {
            field.style.display = 'block';
        });
    }
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.staradmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/stadmin/working_hours/create.blade.php ENDPATH**/ ?>