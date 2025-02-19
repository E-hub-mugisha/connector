
<?php $__env->startSection('title', 'Working Hours'); ?>
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true"><?php echo $__env->yieldContent('title'); ?></a>
                        </li>
                    </ul>
                    <div>
                        <div class="btn-wrapper">
                            <a href="<?php echo e(route('working_hours.create')); ?>" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Add Working Hours</a>
                        </div>
                    </div>
                </div>

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>

    <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-lg-12 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="table-responsive  mt-1">
                                                    <table class="table select-table" id="dataTable">
                                                        <thead>
                                                            <tr>
            <th>Day</th>
            <th>Is Closed</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th width="280px">Action</th>
        </tr>
        <?php $__currentLoopData = $workingHours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workingHour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($workingHour->day); ?></td>
            <td><?php echo e($workingHour->is_closed ? 'Yes' : 'No'); ?></td>
            <td><?php echo e($workingHour->start_time); ?></td>
            <td><?php echo e($workingHour->end_time); ?></td>
            <td>
                <a class="btn btn-primary" href="<?php echo e(route('working_hours.edit', $workingHour->id)); ?>">Edit</a>
                <form action="<?php echo e(route('working_hours.destroy', $workingHour->id)); ?>" method="POST" style="display:inline-block;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </thead>
        
    </table>
</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.staradmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/stadmin/working_hours/index.blade.php ENDPATH**/ ?>