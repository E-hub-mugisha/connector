@extends('layouts.app')
@section('title','Dashboard')
@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="{{{route('exportExcel')}}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Sales</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalSales}} - RWF</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Revenue</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalRevenue}} - RWF</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Service Providers
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$totalSprovider}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Users Registration by Month</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <canvas id="users-chart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-6">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Services by status</h6>
                </div>
                <div class="card-body">
                    <canvas id="service-chart"></canvas>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Service Provider by category</h6>
                </div>
                <div class="card-body">
                    <canvas id="user-chart"></canvas>
                </div>
            </div>

        </div>
        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bookings per week</h6>
                </div>
                <div class="card-body">
                    <canvas id="booking-chart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Services by category</h6>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Services by status</h6>
                </div>
                <div class="card-body">
                    <canvas id="payment-chart"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="container-fluid">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Sessions</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="total-sessions">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="total-users">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Pageviews</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="total-pageviews">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- --------------- Bookings per week-------------- -->
<script>
    var data = @json($data);
    var ctx = document.getElementById('booking-chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data.map(function(d) {
                return d.week
            }),
            datasets: [{
                label: 'Bookings per week',
                data: data.map(function(d) {
                    return d.count
                }),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }]
            }
        }
    });
</script>

<!-- --------------------- Services by status ---------------- -->
<script>
    var data = @json($done);

    var ctx = document.getElementById('service-chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: data.map(function(d) {
                return d.status
            }),
            datasets: [{
                label: 'Services by status',
                data: data.map(function(d) {
                    return d.count
                }),
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
            maintainAspectRatio: false
        }
    });
</script>

<!-- --------------------- Users by category ---------------- -->

<!-- --------------------- Users Registration by Month ---------------- -->
<script>
    var userData = {
        !!json_encode($userData) !!
    };

    var months = [];
    var counts = [];

    userData.forEach(function(data) {
        months.push(data.month);
        counts.push(data.count);
    });

    var ctx = document.getElementById('users-chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: 'Users Registration by Month',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                data: counts
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<!-- --------------------- Payment Mode ---------------- -->

<script>
    var bookingData = {
        !!json_encode($bookingData) !!
    };

    var paymentModes = [];
    var counts = [];

    bookingData.forEach(function(data) {
        paymentModes.push(data.payment_mode);
        counts.push(data.count);
    });

    var ctx = document.getElementById('payment-chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: paymentModes,
            datasets: [{
                label: 'Payment Mode',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                data: counts
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>
    function initClient() {
        gapi.load('client:auth2', function() {
            gapi.auth2.init({
                client_id: 'G-HWQ435LMGE.apps.googleusercontent.com', // Replace with your Client ID
                scope: 'https://www.googleapis.com/auth/analytics.readonly'
            }).then(function () {
                // Sign in the user if not already signed in
                if (!gapi.auth2.getAuthInstance().isSignedIn.get()) {
                    gapi.auth2.getAuthInstance().signIn();
                } else {
                    fetchAnalyticsData();
                }
            });
        });
    }

    function fetchAnalyticsData() {
        gapi.client.load('analyticsreporting', 'v4', function() {
            var request = gapi.client.analyticsreporting.reports.batchGet({
                "reportRequests": [
                    {
                        "viewId": "G-HWQ435LMGE", // Replace with your Google Analytics View ID
                        "dateRanges": [{"startDate": "30daysAgo", "endDate": "today"}],
                        "metrics": [
                            {"expression": "ga:sessions"},
                            {"expression": "ga:users"},
                            {"expression": "ga:pageviews"}
                        ],
                        "dimensions": [{"name": "ga:date"}]
                    }
                ]
            });

            request.then(function(response) {
                var data = response.result.reports[0].data.totals[0].values;
                document.getElementById('total-sessions').innerText = data[0];
                document.getElementById('total-users').innerText = data[1];
                document.getElementById('total-pageviews').innerText = data[2];
            }, function(err) {
                console.error("Error fetching analytics data:", err);
            });
        });
    }

    // Load the client after the page has loaded
    window.onload = function() {
        gapi.load('client:auth2', initClient);
    };
</script>

@endsection