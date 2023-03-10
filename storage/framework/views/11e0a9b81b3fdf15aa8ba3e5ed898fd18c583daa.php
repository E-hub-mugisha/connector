<div>
    <div class="cta bg-image bg-dark pt-4 pb-5 mb-0" style="background-image: url(assets/images/demos/demo-4/bg-5.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-8 col-lg-6">
                    <div class="cta-heading text-center">
                        <h3 class="cta-title text-white">Get The Latest Deals</h3>
                        <p class="cta-desc text-white">and receive <span class="font-weight-normal">Discount</span> for first service</p>
                        <a role="button" href="#" data-toggle="modal" class="btn btn-lg btn-round btn-primary" data-target="#myModal" role="button">Subscribe</a>
                    </div>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-small" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-center">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <h2 class="modal-title" id="myModalLabel">Subscribe to our Newsletter.</h2>
                                    <p>We promise we will not spam you.</p>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <form action="/sendNewsletter" method="POST">
                                            <div class="form-group">
                                                <input type="text" name="names" id="names" class="form-control form-control-white" placeholder="Enter your Name" required>
                                                <?php $__errorArgs = ['names'];
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
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" class="form-control form-control-white" placeholder="Enter your Email Address" required>
                                                <?php $__errorArgs = ['email'];
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
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Subscribe">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\Users\kabos\Downloads\hiletask\hiletask\resources\views/livewire/admin/newsletter-component.blade.php ENDPATH**/ ?>