

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <h2 class="card-title card-title-dash">Staff Members</h2>

                        <!-- Button to trigger modal -->
                        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staffModal" onclick="resetForm()">Add Staff</button>
                    </div>
                    <!-- Staff Members Table -->
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Services</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $staffMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($staff->name); ?></td>
                                    <td><?php echo e($staff->email); ?></td>
                                    <td><?php echo e($staff->role); ?></td>
                                    <td>
                                        <?php $__currentLoopData = $staff->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="badge bg-info"><?php echo e($service->name); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" onclick="editStaff(<?php echo e($staff); ?>)" data-bs-toggle="modal" data-bs-target="#staffModal">Edit</button>

                                        <!-- Manage Services Button -->
                                        <button class="btn btn-secondary btn-sm" onclick="manageServices(<?php echo e($staff); ?>)" data-bs-toggle="modal" data-bs-target="#servicesModal">Manage Services</button>

                                        <form action="<?php echo e(route('staff-members.destroy', $staff->id)); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
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

<!-- Add/Edit Staff Modal -->
<div class="modal fade" id="staffModal" tabindex="-1" aria-labelledby="staffModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staffModalLabel">Add Staff</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="staffForm" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="staff_id" name="staff_id">
                    <input type="hidden" id="_method" name="_method" value="POST">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" required>
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" required>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="role" name="role" required>
                        <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Manage Services Modal -->
<div class="modal fade" id="servicesModal" tabindex="-1" aria-labelledby="servicesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="servicesModalLabel">Manage Services</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('staff-members.updateServices', ['id' => 'staff_services_id'])); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="staff_services_id" name="staff_id">

                    <div class="mb-3">
                        <label for="serviceSelect" class="form-label">Select Services</label>
                        <select class="form-select" id="serviceSelect" name="services[]" multiple required>
                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Services</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function resetForm() {
        // Reset form fields
        document.getElementById('staffForm').reset();
        document.getElementById('staff_id').value = '';
        document.getElementById('_method').value = 'POST'; // Reset to POST
        document.getElementById('staffModalLabel').textContent = "Add Staff";
        document.getElementById('staffForm').action = "<?php echo e(route('staff-members.store')); ?>";

        // Reset multi-select options
        let serviceSelect = document.getElementById('services');
        for (let option of serviceSelect.options) {
            option.selected = false;
        }
    }

    function editStaff(staff) {
        document.getElementById('staff_id').value = staff.id;
        document.getElementById('name').value = staff.name;
        document.getElementById('email').value = staff.email;
        document.getElementById('role').value = staff.role;

        // Select services for editing
        let serviceSelect = document.getElementById('services');
        for (let option of serviceSelect.options) {
            option.selected = staff.services.some(s => s.id == option.value);
        }

        // Update form action for PUT request
        document.getElementById('_method').value = 'PUT';
        document.getElementById('staffModalLabel').textContent = "Edit Staff";
        document.getElementById('staffForm').action = "<?php echo e(url('/staff-members')); ?>/" + staff.id;
    }

    // Manage Services for Staff
    function manageServices(staff) {
        document.getElementById('staff_services_id').value = staff.id;
        let serviceSelect = document.getElementById('serviceSelect');

        // Unselect all first
        for (let option of serviceSelect.options) {
            option.selected = false;
        }

        // Select existing services
        staff.services.forEach(service => {
            let option = serviceSelect.querySelector(`option[value="${service.id}"]`);
            if (option) option.selected = true;
        });

        document.getElementById('servicesModalLabel').textContent = "Manage Services for " + staff.name;
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.staradmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\connector\well-known\hiletask\resources\views/stadmin/staff/index.blade.php ENDPATH**/ ?>