<div>
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Services<span>Providers</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Services Providers</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="toolbox">

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sort by:</label>
                                <div class="select-custom">
                                    <select name="sortby" id="sortby" class="form-control">
                                        <option value="popularity" selected="selected">Most Popular</option>
                                        <option value="rating">Most Rated</option>
                                        <option value="date">Date</option>
                                    </select>
                                </div>
                            </div><!-- End .toolbox-sort -->
                            <!-- <div class="toolbox-layout">
                                <a href="category-list.html" class="btn-layout">
                                    <svg width="16" height="10">
                                        <rect x="0" y="0" width="4" height="4" />
                                        <rect x="6" y="0" width="10" height="4" />
                                        <rect x="0" y="6" width="4" height="4" />
                                        <rect x="6" y="6" width="10" height="4" />
                                    </svg>
                                </a>

                                <a href="category-2cols.html" class="btn-layout">
                                    <svg width="10" height="10">
                                        <rect x="0" y="0" width="4" height="4" />
                                        <rect x="6" y="0" width="4" height="4" />
                                        <rect x="0" y="6" width="4" height="4" />
                                        <rect x="6" y="6" width="4" height="4" />
                                    </svg>
                                </a>

                                <a href="category.html" class="btn-layout active">
                                    <svg width="16" height="10">
                                        <rect x="0" y="0" width="4" height="4" />
                                        <rect x="6" y="0" width="4" height="4" />
                                        <rect x="12" y="0" width="4" height="4" />
                                        <rect x="0" y="6" width="4" height="4" />
                                        <rect x="6" y="6" width="4" height="4" />
                                        <rect x="12" y="6" width="4" height="4" />
                                    </svg>
                                </a>

                                <a href="category-4cols.html" class="btn-layout">
                                    <svg width="22" height="10">
                                        <rect x="0" y="0" width="4" height="4" />
                                        <rect x="6" y="0" width="4" height="4" />
                                        <rect x="12" y="0" width="4" height="4" />
                                        <rect x="18" y="0" width="4" height="4" />
                                        <rect x="0" y="6" width="4" height="4" />
                                        <rect x="6" y="6" width="4" height="4" />
                                        <rect x="12" y="6" width="4" height="4" />
                                        <rect x="18" y="6" width="4" height="4" />
                                    </svg>
                                </a>
                            </div> -->
                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->

                    <div class="entry-container">

                        <?php $__currentLoopData = $sproviders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sprovider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!empty($sprovider->sprovider_name)): ?>
                        <div class="entry-item lifestyle shopping col-sm-6 col-lg-4">
                            <article class="entry entry-mask">
                                <figure class="entry-media">
                                    <a href="<?php echo e(route('home.service-provider_profile',['sprovider_name'=>$sprovider->sprovider_name])); ?>">
                                        <?php if($sprovider->image): ?>
                                        <img src="<?php echo e(asset('assets/images/sproviders')); ?>/<?php echo e($sprovider->image); ?>" alt="<?php echo e($sprovider->user->name); ?>">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset('assets/images/sproviders/avatar.jpg')); ?>" alt="<?php echo e($sprovider->user->name); ?>">
                                        <?php endif; ?>
                                    </a>
                                </figure><!-- End .entry-media -->

                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <a href="#"><?php echo e($sprovider->city); ?></a>
                                        <span class="meta-separator">|</span>
                                        <a href="#">2 Comments</a>
                                    </div><!-- End .entry-meta -->

                                    <h2 class="entry-title">
                                        <a href="<?php echo e(route('home.service-provider_profile',['sprovider_name'=>$sprovider->sprovider_name])); ?>"><?php echo e($sprovider->user->name); ?></a>
                                    </h2><!-- End .entry-title -->

                                    <div class="entry-cats">
                                        in <a href="<?php echo e(route('home.service_provider_by_category',['service_category_name'=>$sprovider->category->slug])); ?>"><?php if($sprovider->service_category_id): ?>
                                            <?php echo e($sprovider->category->name); ?>

                                            <?php endif; ?></a>
                                    </div><!-- End .entry-cats -->
                                </div><!-- End .entry-body -->
                            </article><!-- End .entry -->
                        </div><!-- End .entry-item -->
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div><!-- End .entry-container -->

                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            
                            <li class="page-item "><a class="page-link" href="#">
                            <?php echo e($sproviders->links()); ?>

                            </a></li>
                        </ul>
                    </nav>
                </div><!-- End .col-lg-9 -->
                <aside class="col-lg-3 order-lg-first">
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-clean">
                            <label>Filters:</label>
                            <a href="#" class="sidebar-filter-clear">Clean All</a>
                        </div><!-- End .widget widget-clean -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                    Category
                                </a>
                            </h3><!-- End .widget-title -->

                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                    <?php $__currentLoopData = \App\Models\ServiceProvider::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sprovider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(!empty($sprovider->sprovider_name)): ?>
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <a href="<?php echo e(route('home.service_provider_by_category',['service_category_name'=>$sprovider->category->slug])); ?>" class="custom-control-label" for="cat-1">
                                                    <?php if($sprovider->service_category_id): ?>
                                    <?php echo e($sprovider->category->name); ?>

                                    <?php endif; ?> </a>
                                            </div><!-- End .custom-checkbox -->
                                            <span class="item-count">3</span>
                                        </div><!-- End .filter-item -->
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->
                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</div>
<?php /**PATH D:\hile\hiletasker\resources\views/livewire/service-provider-by-category-component.blade.php ENDPATH**/ ?>