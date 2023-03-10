<div>
    <div class="container">
        <h1>Laravel Send Email to Multiple Users - ItSolutionStuff.com</h1>
        <?php if(Session::has('message')): ?>
        <div class="alert alert-success" role="alert"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>

        <button class="btn btn-success send-email">Send Email</button>

        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><input type="checkbox" class="user-checkbox" name="users[]" value="<?php echo e($user->id); ?>"></td>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <?php echo e($users->links()); ?>

    </div>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".send-email").click(function() {
            var selectRowsCount = $("input[class='user-checkbox']:checked").length;

            if (selectRowsCount > 0) {

                var ids = $.map($("input[class='user-checkbox']:checked"), function(c) {
                    return c.value;
                });

                $.ajax({
                    type: 'POST',
                    url: "<?php echo e(route('ajax.send.email')); ?>",
                    data: {
                        ids: ids
                    },
                    success: function(data) {
                        alert(data.success);
                    }
                });

            } else {
                alert("Please select at least one user from list.");
            }
            console.log(selectRowsCount);
        });
    </script>}
</div><?php /**PATH C:\Users\kabos\Downloads\hiletask\hiletask\resources\views/livewire/admin/admin-user-mail-component.blade.php ENDPATH**/ ?>