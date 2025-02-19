
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>

<?php
    $labels = [];
    $data = [];

    foreach ($revenueByServiceType as $revenue) {
        $labels[] = $revenue->service_type;
        $data[] = $revenue->total_revenue;
    }
?>

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
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(route('home.service-provider_profile', ['sprovider_id' => $sprovider->id]))); ?>" target="_blank" class="btn btn-otline-dark align-items-center"><i class="icon-facebook"></i> Share on Facebook</a>
                            <a href="https://www.instagram.com/?url=<?php echo e(urlencode(route('home.service-provider_profile', ['sprovider_id' => $sprovider->id]))); ?>" target="_blank" class="btn btn-otline-dark"><i class="icon-instagram"></i> Share on Instagram</a>
                            <a href="https://api.whatsapp.com/send?text=<?php echo e(urlencode('Check out my profile: ' . route('home.service-provider_profile', ['sprovider_id' => $sprovider->id]))); ?>" target="_blank" class="btn btn-primary text-white me-0"><i class="icon-whatsapp"></i> Share on whatsapp</a>
                        </div>
                    </div>
                </div>
                <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="statistics-details d-flex align-items-center justify-content-between">
                                    <div>
                                        <p class="statistics-title">Appointment</p>
                                        <h3 class="rate-percentage"><?php echo e($percentage); ?>%</h3>
                                    </div>
                                    <div>
                                        <p class="statistics-title">Total Services</p>
                                        <h3 class="rate-percentage"><?php echo e($totalService); ?></h3>
                                    </div>
                                    <div>
                                        <p class="statistics-title">Total Sales</p>
                                        <h3 class="rate-percentage"><?php echo e($totalAmount); ?></h3>
                                    </div>
                                    <div class="d-none d-md-block">
                                        <p class="statistics-title">Customer Satisfactory</p>
                                        <h3 class="rate-percentage"><?php echo e($percentageRating); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="d-sm-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h4 class="card-title card-title-dash">Performance Line Chart</h4>
                                                        
                                                    </div>
                                                    <div id="performance-line-legend"></div>
                                                </div>
                                                <div class="chartjs-wrapper mt-5">
                                                    <canvas id="performaneLine"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="chartjs-wrapper mt-5">
                                                    <canvas id="revenuePieChart"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-4 d-flex flex-column">
                                <div class="row flex-grow">
                                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                        <div class="card bg-primary card-rounded">
                                            <div class="card-body pb-0">
                                                <h4 class="card-title card-title-dash text-white mb-4">Service Bookings by Status</h4>
                                                        <div class="chart-wrapper pb-4">
                                                            <canvas id="bookingsChart" width="200" height="200"></canvas>
                                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body pb-0">
                                                <h4 class="card-title card-title-dash text-black mb-4">Service Bookings by Location</h4>
                                                        <div class="chart-wrapper pb-4">
                                                            <canvas id="locationChart" width="200" height="200"></canvas>
                                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-flex flex-column">
                                
                                <div class="row flex-grow">
                                    <div class="col-12 grid-margin stretch-card">
                                        <div class="card card-rounded">
                                            <div class="card-body">
                                                <div class="d-sm-flex justify-content-between align-items-start">
                                                    <div>
                                                        <h4 class="card-title card-title-dash">Pending Requests</h4>
                                                        <p class="card-subtitle card-subtitle-dash">You have 50+ new requests</p>
                                                    </div>
                                                    <div>
                                                        <a href="<?php echo e(route('serviceProviderBooking.index')); ?>" class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-eye"></i>View All</a>
                                                    </div>
                                                </div>
                                                <div class="table-responsive  mt-1">
                                                    <table class="table select-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Service</th>
                                                                <th>Names</th>
                                                                <th>Address</th>
                                                                <th>When</th>
                                                                <th>Status</th>
                                                                <th>action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td>
                                                                    <a href="<?php echo e(route('serviceProviderBooking.show',['id'=>$order->id])); ?>">
                                                                        <h6><?php echo e($order->service->name); ?></h6>
                                                                       
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <h6><?php echo e($order->names); ?></h6>
                                                                    <p><?php echo e($order->email); ?></p>
                                                                </td>
                                                                <td>
                                                                    <h6><?php echo e($order->phone); ?></h6>
                                                                    <p><?php echo e($order->location); ?></p>
                                                                </td>
                                                                <td>
                                                                    <h6><?php echo e($order->date); ?></h6>
                                                                    <p><?php echo e($order->time); ?></p>
                                                                </td>
                                                                <td>
                                                                    <?php if($order->status == 'completed'): ?>
                                                                    <div class="badge badge-opacity-success"><?php echo e($order->status); ?></div>
                                                                    <?php elseif($order->status == "pending"): ?>
                                                                    <div class="badge badge-opacity-warning"><?php echo e($order->status); ?></div>
                                                                    <?php elseif($order->status == "approved"): ?>
                                                                    <div class="badge badge-opacity-primary"><?php echo e($order->status); ?></div>
                                                                    <?php elseif($order->status == "decline"): ?>
                                                                    <div class="badge badge-opacity-danger"><?php echo e($order->status); ?></div>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <a class="btn badge badge-opacity-success btn-sm" href="<?php echo e(route('serviceProviderBooking.show', $order->id)); ?>">
                                                                        <i class="fas fa-folder">
                                                                        </i>
                                                                        View
                                                                    </a>
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
                        <?php if($showModal): ?>
    <!-- Modal -->
    <div class="modal fade show" id="profileIncompleteModal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true" style="display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Profile Incomplete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Your profile is incomplete. Please update your name and email to proceed.
                </div>
                <div class="modal-footer">
                    <a href="<?php echo e(route('sprovider.edit_profile')); ?>" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Overlay and Auto Show Script -->
    <script>
        $(document).ready(function() {
            $('#profileIncompleteModal').modal('show');
        });
    </script>
<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<canvas id="revenuePieChart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
        document.addEventListener('DOMContentLoaded', function () {
            // Prepare data for Chart.js
            const labels = <?php echo json_encode($ordersGraph->pluck('status'), 15, 512) ?>;
            const counts = <?php echo json_encode($ordersGraph->pluck('count'), 15, 512) ?>;

            // Create the pie chart
            const ctx = document.getElementById('bookingsChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Service Bookings by Status',
                        data: counts,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw;
                                }
                            }
                        }
                    }
                }
            });
            // Prepare data for the location bar chart
            const locationLabels = <?php echo json_encode($locationData->pluck('location'), 15, 512) ?>;
            const locationCounts = <?php echo json_encode($locationData->pluck('count'), 15, 512) ?>;

            // Create the location bar chart
            const locationCtx = document.getElementById('locationChart').getContext('2d');
            new Chart(locationCtx, {
                type: 'bar',
                data: {
                    labels: locationLabels,
                    datasets: [{
                        label: 'Service Bookings by Location',
                        data: locationCounts,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Number of Bookings'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Location'
                            }
                        }
                    }
                }
            });
        });
    </script>

<script>
    var ctx = document.getElementById('revenuePieChart').getContext('2d');
    var revenuePieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($labels, 15, 512) ?>,
            datasets: [{
                data: <?php echo json_encode($data, 15, 512) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
            }
        }
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.staradmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\connector\well-known\hiletask\resources\views/stadmin/ServicePadminDashboard.blade.php ENDPATH**/ ?>