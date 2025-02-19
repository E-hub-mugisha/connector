
<?php $__env->startSection('title', 'Services media'); ?>
<?php $__env->startSection('content'); ?>

<div class="container">
    <h2 class="mb-4">Service Media</h2>

    <!-- Button to Open the Modal -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#uploadModal">
        Add Media
    </button>

    <!-- Display Images and Videos -->
    <div class="row">
        <?php $__currentLoopData = $medias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $media): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 mb-3">
            <div class="card">
                <?php if($media->type === 'image'): ?>
                <img src="<?php echo e(asset('image/services/' . $media->file_path)); ?>" class="card-img-top" alt="Service Image">
                <?php elseif($media->type === 'video'): ?>
                <video class="card-img-top" controls>
                    <source src="<?php echo e(asset('image/services/' . $media->file_path)); ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <?php endif; ?>
                <div class="card-body text-center">
                    <form action="<?php echo e(route('service-media.destroy', $media->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<!-- Modal for Uploading Media -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload Media</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="uploadForm" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group col-md-4">
                        <label for="service_id" value="<?php echo e(__('service_id')); ?>">Service Name</label>
                        <select class="form-control" name="service_id" id="service_id" required>
                            <option value="">Select service name</option>
                            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['service_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-danger"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <label for="mediaFiles" class="form-label">Select Images or Videos</label>
                        <input type="file" class="form-control" name="files[]" id="mediaFiles" multiple>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('uploadForm').addEventListener('submit', function(event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch("<?php echo e(route('service-media.store')); ?>", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                alert("Files uploaded successfully!");
                location.reload();
            })
            .catch(error => console.error("Error:", error));
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.staradmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\connector\well-known\hiletask\resources\views/stadmin/media/index.blade.php ENDPATH**/ ?>