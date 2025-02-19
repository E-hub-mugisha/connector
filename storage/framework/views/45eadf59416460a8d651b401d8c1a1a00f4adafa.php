
<?php $__env->startSection('title', 'Promotions'); ?>
<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                        </li>
                    </ul>
                    <div>
                        <div class="btn-wrapper">
                            <button type="button" class="btn btn-primary text-white me-0" data-bs-toggle="modal" data-bs-target="#addPromotionModal">
                                <i class="icon-download"></i> Add Promotion
                            </button>
                        </div>
                    </div>
                </div>
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-lg-12 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="table-responsive mt-1">
                                                    <table class="table select-table" id="dataTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Title</th>
                                                                <th>Service</th>
                                                                <th>Category</th>
                                                                <th>Discount</th>
                                                                <th>Price</th>
                                                                <th>Start Date</th>
                                                                <th>End Date</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo e($promotion->title); ?></td>
                                                                    <td><?php echo e($promotion->service->name); ?></td>
                                                                    <td><?php echo e($promotion->category->name); ?></td>
                                                                    <td><?php echo e($promotion->discount); ?>%</td>
                                                                    <td><?php echo e($promotion->service->price); ?></td>
                                                                    <td><?php echo e($promotion->start_date); ?></td>
                                                                    <td><?php echo e($promotion->end_date); ?></td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editPromotionModal-<?php echo e($promotion->id); ?>">Edit</button>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
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

<!-- Add Promotion Modal -->
<div class="modal fade" id="addPromotionModal" tabindex="-1" aria-labelledby="addPromotionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPromotionModalLabel">Add Promotion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('promotions.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="service_provider_id" value="<?php echo e($sprovider->id); ?>">

                    <div class="mb-3">
                        <label for="service_id" class="form-label">Select Service</label>
                        <select name="service_id" class="form-select" required>
                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Select Category</label>
                        <select name="category_id" class="form-select" required>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Promotion Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Promotion Title" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" placeholder="Promotion Description" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="discount" class="form-label">Discount (%)</label>
                        <input type="number" name="discount" class="form-control" placeholder="Discount (%)" required>
                    </div>

                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" name="end_date" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Promotion</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Promotion Modals -->
<?php $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="editPromotionModal-<?php echo e($promotion->id); ?>" tabindex="-1" aria-labelledby="editPromotionModalLabel-<?php echo e($promotion->id); ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPromotionModalLabel-<?php echo e($promotion->id); ?>">Edit Promotion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('promotions.update', $promotion->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="service_provider_id" value="<?php echo e($sprovider->id); ?>">
                    
                    <!-- Form fields pre-filled with promotion data for editing -->
                    <div class="mb-3">
                        <label for="service_id" class="form-label">Select Service</label>
                        <select name="service_id" class="form-select" required>
                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($service->id); ?>" <?php echo e($promotion->service_id == $service->id ? 'selected' : ''); ?>><?php echo e($service->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Select Category</label>
                        <select name="category_id" class="form-select" required>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>" <?php echo e($promotion->category_id == $category->id ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Promotion Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo e($promotion->title); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" required><?php echo e($promotion->description); ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="discount" class="form-label">Discount (%)</label>
                        <input type="number" name="discount" class="form-control" value="<?php echo e($promotion->discount); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control" value="<?php echo e($promotion->start_date); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" name="end_date" class="form-control" value="<?php echo e($promotion->end_date); ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Promotion</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.staradmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home4/connector/public_html/hiletask/resources/views/stadmin/promotions/index.blade.php ENDPATH**/ ?>