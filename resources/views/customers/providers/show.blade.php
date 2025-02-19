@extends('layouts.guest')
@section('title','Service Provider detail')
@section('content')


<style>
    .carousel-item {
        text-align: center;
        background-color: #f8f9fa;
        border-radius: 10px;
    }

    .carousel-item p {
        font-size: 1.2em;
        color: #333;
    }

    .carousel-item small {
        color: #666;
    }

    .rating {
        direction: rtl;
        font-size: 2rem;
    }

    .rating input {
        display: none;
    }

    .rating label {
        color: #006400;
        /* Dark green for unselected stars */
        cursor: pointer;
        font-size: 2.5rem;
    }

    /* Star color when hovered or selected */
    .rating label:hover,
    .rating label:hover~label,
    .rating input:checked~label {
        color: #FFD700;
        /* Gold for selected or hovered stars */
    }

    .rating input:checked+label,
    .rating input:checked+label~label {
        color: #FFD700;
        /* Gold for selected stars */
    }

    .average-rating {
        font-size: 1.5rem;
        color: #FFD700;
        /* Gold color for stars */
    }
</style>


<section class="candidates-profile pt-100 lg-pt-70 pb-150 lg-pb-80">
    <div class="container">
        <div class="row">
            <div class="col-xxl-3 col-lg-4">
                <!-- Sidebar with profile details -->
                <div class="cadidate-profile-sidebar ms-xl-5 ms-xxl-0 md-mt-60">
                    <div class="cadidate-bio bg-wrapper bg-color mb-6 md-mb-40">
                        <div class="pt-25">
                            <div class="cadidate-avatar m-auto">
                                <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{asset('image/profile')}}/{{$sproviders->image}}" alt="" class="lazy-img rounded-circle w-100">
                            </div>
                        </div>
                        <h3 class="cadidate-name text-center">{{$sproviders->sprovider_name}}</h3>
                        <div class="text-center pb-25">
                            @if($sproviders->service_category_id)
                            {{$sproviders->category->name}}
                            @endif
                        </div>
                        <ul class="style-none">
                            <li>
                                <span>Phone: </span>
                                <div><a href="tel:{{$sproviders->user->phone}}">{{$sproviders->user->phone}}</a></div>
                            </li>
                            <li><span>Location: </span>
                                <div>{{$sproviders->city}} </div>
                            </li>
                            <li><span>Total Served: </span>
                                <div>@php $totalSales = \App\Models\ServiceBooking::where('service_provider_id',$sproviders->id)->where('status','completed')->count(); @endphp</div><span>{{$totalSales}}</span>
                            </li>
                            <li><span>Email: </span>
                                <div><a href="mailto:{{$sproviders->proEmail}}">{{$sproviders->proEmail}}</a></div>
                            </li>
                            <li>
                                <span>Overall Rating: </span>
                                <div>
                                    <span class="average-rating">
                                        {{ $averageRating }}/5
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <=floor($averageRating))
                                            ★
                                            @elseif ($i==ceil($averageRating) && $averageRating - floor($averageRating)> 0)
                                            <span style="color: #FFD700;">&#9733;</span> <!-- Half star in gold -->
                                            @else
                                            <span style="color: #ddd;">★</span> <!-- Unfilled star -->
                                            @endif
                                            @endfor
                                    </span>
                                </div>
                            </li>
                            <li><span>Social:</span>
                                <div>
                                    <a href="#" class="me-3" onclick="shareOnFacebook()"><i class="bi bi-facebook"></i></a>
                                    <a href="#" class="me-3" onclick="shareOnWhatsApp()"><i class="bi bi-whatsapp"></i></a>
                                    <a href="#" class="me-3" onclick="shareOnInstagram()"><i class="bi bi-instagram"></i></a>
                                    <a href="#" class="me-3" onclick="shareOnTwitter()"><i class="bi bi-twitter"></i></a>
                                    <a href="#" class="me-3" onclick="shareOnLinkedIn()"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </li>
                        </ul>
                        <a href="#sendEmail" class="btn-ten fw-500 text-white w-100 text-center tran3s mt-15">Send email</a>
                    </div>
                    <!-- /.cadidate-bio -->

                    <!-- Working Hours Section -->
                    <!-- Working Hours Section -->
                    <h4 class="sidebar-title">Working Hours</h4>
                    <div class="working-hours bg-wrapper bg-color mb-6 md-mb-40">
                        <ul class="style-none">
                            @foreach($workingHours as $workingHour)
                            <li>
                                <span>{{ \Carbon\Carbon::parse($workingHour->day)->format('l') }}:</span>
                                @if($workingHour->is_closed)
                                Closed
                                @else
                                {{ \Carbon\Carbon::parse($workingHour->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($workingHour->end_time)->format('h:i A') }}
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>


                    <!-- Location Section -->
                    <h4 class="sidebar-title">Location</h4>
                    <div class="map-area mb-6 md-mb-40">
                        <div class="gmap_canvas h-100 w-100">
                            <iframe class="gmap_iframe h-100 w-100" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q={{$sproviders->city}}&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                        </div>
                    </div>

                    <!-- Email Form -->
                    <h4 class="sidebar-title">Email {{$sproviders->sprovider_name}}.</h4>
                    <div class="email-form bg-wrapper bg-color" id="sendEmail">
                        <p>Your email address & profile will be shown to the recipient.</p>
                        @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <form action="/sendEmailInquiry" method="POST">
                            @csrf
                            <div class="d-sm-flex mb-25">
                                <label for="">Name</label>
                                <input type="text" placeholder="Your Name*" name="name" id="name" required="required">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-sm-flex mb-25">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                                @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-sm-flex mb-25">
                                <label for="">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email *" required>
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-sm-flex mb-25">
                                <input type="text" class="form-control" id="proEmail" value="{{$sproviders->proEmail}}" name="proEmail" placeholder="Email *" required hidden>
                                @error('proEmail')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-sm-flex mb-25">
                                <label for="">subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="subject">
                                @error('subject')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-sm-flex mb-25 xs-mb-10">
                                <label for="">Message</label>
                                <textarea class="form-control" cols="30" rows="4" id="message" name="message" wire:model="message" required placeholder="Message *"></textarea>
                                @error('message')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-sm-flex">
                                <label for=""></label>
                                <button type="submit" class="btn-ten fw-500 text-white flex-fill text-center tran3s">Send </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.cadidate-profile-sidebar -->
            </div>
            <div class="col-xxl-9 col-lg-8">
                <div class="candidates-profile-details me-xxl-5 pe-xxl-4">
                    <!-- Overview Section -->
                    <div class="inner-card border-style mb-65 lg-mb-40">
                        <h3 class="title">About</h3>
                        <p>{!!$sproviders->about!!}</p>
                    </div>
                    
                    <div class="inner-card border-style mb-65 lg-mb-40">
                        <h3 class="title">Skills</h3>
                        <p>{!!$sproviders->skills!!}</p>
                    </div>
                    <div class="inner-card border-style mb-65 lg-mb-40">
                        <h3 class="title">Qualification</h3>
                        <p>{!!$sproviders->qualification!!}</p>
                    </div>
                    <div class="inner-card border-style mb-65 lg-mb-40">
                        <h3 class="title">Experience</h3>
                        <p>{!!$sproviders->experience!!}</p>
                    </div>

                    <!-- Reviews and Ratings Section -->
                    <div class="inner-card border-style mb-75 lg-mb-50">
                        <h3 class="title">Reviews & Ratings</h3>
                        @foreach($ratings as $rating)
                        <div>
                            <p>Rating: {{ $rating->rating }} stars</p>
                            <p>Comment: {{ $rating->message }}</p>
                            <p>By: {{ $rating->name }}</p>
                        </div>
                        @endforeach
                        <div class="rating-section">
                            <form action="{{ route('rating.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="input-group-meta position-relative rating mb-3">
                                        <!-- <label for="rating" class="form-label">Your Rating:</label> -->
                                        <input type="radio" class="form-control" name="rating" id="rating-5" value="5">
                                        <label for="rating-5" title="5 stars">★</label>

                                        <input type="radio" class="form-control" name="rating" id="rating-4" value="4">
                                        <label for="rating-4" title="4 stars">★</label>

                                        <input type="radio" class="form-control" name="rating" id="rating-3" value="3">
                                        <label for="rating-3" title="3 stars">★</label>

                                        <input type="radio" class="form-control" name="rating" id="rating-2" value="2">
                                        <label for="rating-2" title="2 stars">★</label>

                                        <input type="radio" class="form-control" name="rating" id="rating-1" value="1">
                                        <label for="rating-1" title="1 star">★</label>
                                    </div>
                                    <div class="input-group-meta position-relative">
                                        <label for="comment" class="form-label">Your Comment:</label>
                                        <textarea name="message" class="form-control" rows="4" placeholder="Leave a comment"></textarea>

                                    </div>
                                    <input type="text" class="form-control" id="Service_Provider_ID" value="{{$sproviders->id}}" name="Service_Provider_ID" required hidden>
                                    <div class="col-12">
                                        <button type="submit" class="btn-eleven fw-500 tran3s d-block mt-20">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Testimonials Section -->
                    <div class="inner-card border-style mb-75 lg-mb-50">
                        <h3 class="title">User Feedback</h3>
                        @if ($feedback->isEmpty())
                        <p>No feedback available.</p>
                        @else
                        <div id="feedbackCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                            <div class="carousel-inner">
                                @foreach ($feedback as $index => $item)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <div class="d-block w-100 p-4">
                                        <p>{{ $item->message }}</p>
                                        <small>Posted on: {{ $item->created_at->format('d M Y') }}</small>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#feedbackCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#feedbackCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        @endif
                        <a href="#!" data-bs-toggle="modal" data-bs-target="#FeedbackModal" class="btn-ten fw-500 text-white w-100 text-center tran3s mt-15">Add Your Feedback</a>
                        <div class="modal fade" id="FeedbackModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                                <div class="container">
                                    <div class="user-data-form modal-content">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                        <div class="form-wrapper m-auto">
                                            <form method="POST" action="{{ route('feedback.store')}}" class="mt-10">
                                                @csrf
                                                <div class="row">

                                                    <div class="input-group-meta position-relative">
                                                        <input type="text" class="form-control" id="Service_Provider_ID" value="{{$sproviders->id}}" name="Service_Provider_ID" required hidden>
                                                    </div>
                                                    <div class="input-group-meta position-relative">
                                                        <label for="">Message</label>
                                                        <textarea class="form-control" cols="30" rows="4" id="message" name="message" wire:model="message" required placeholder="Message *"></textarea>
                                                        @error('message')
                                                        <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn-eleven fw-500 tran3s d-block mt-20">Submit</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        <!-- /.form-wrapper -->
                                    </div>
                                    <!-- /.user-data-form -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Portfolio Section -->
                    <h3 class="title">Portfolio</h3>
                    <div class="candidate-portfolio-slider">
                        @foreach($portfolios as $portfolio)
                        <div class="item">
                            <a href="#" class="w-100 d-blok"><img src="{{ asset('image/portfolios') }}/{{$portfolio->image}}" alt="" style="height: 200px; width: 100%; object-fit: cover;"></a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- /.candidates-profile-details -->
            </div>
        </div>
        <!-- /.row -->
    </div>
</section>
<!-- /.candidates-profile -->

<div class="container">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="card-title card-title-dash">Services</h4>
                        </div>
                        <!--<div>-->
                        <!--    <a href="#" class="btn btn-primary btn-sm text-white mb-0 me-0" type="button"><i class="mdi mdi-eye"></i>Add Service</a>-->
                        <!--</div>-->
                    </div>
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover">
    <thead>
        <tr>
            <th>Image</th>
            <th>Service Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach(\App\Models\Service::where('service_provider_id',$sproviders->id)->get() as $service)
        <tr>
            <td class="py-1">
                <img src="{{asset('image/services')}}/{{$service->image}}" alt="{{$service->name}}" height="50" width="50" />
            </td>
            <td>{{$service->name}}</td>
            <td>{{$service->category->name}}</td>
            <td class="text-danger"> {{$service->price}}</td>
            <td>
                @if($service->status)
                <label class="bg bg-success">Active</label>
                @else
                <label class="bg bg-danger">Inactive</label>
                @endif
            </td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('CustomerService.show', $service->slug) }}">
                    <i class="fas fa-folder"></i> View Service
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<section class="candidates-profile pt-110 lg-pt-80 pb-160 xl-pb-150 lg-pb-80">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="ms-xxl-5 ms-xl-3">
                
                    <div class="accordion-box grid-style show">
                        <div class="row">
                            <div class="total-job-found">
                            <div class="heading heading-flex mb-3">
                                <div class="heading-left">
                                    <h2 class="title">Promotion Services For You</h2><!-- End .title -->
                                </div><!-- End .heading-left -->
                            </div>
                        </div>
                            @foreach( $promotions as $promotion)
                            @if(\Carbon\Carbon::now()->lessThanOrEqualTo($promotion->end_date))
                            
                            <div class="col-xxl-3 col-sm-6 d-flex">
                                <div class="candidate-profile-card favourite text-center grid-layout mb-25">
                                    <a href="{{route('home.service_details',['service_slug'=>$promotion->service->slug])}}" class="save-btn badge-danger tran3s"><span class="bg-danger" style="padding: 5px; border-radius: 10px; color: white;">{{ $promotion->discount}} % </span></a>
                                    <div class="cadidate-avatar online position-relative d-block m-auto"><a href="{{route('home.service_details',['service_slug'=>$promotion->service->slug])}}" class="rounded-circle"><img src="images/lazy.svg" data-src="{{asset('image/services')}}/{{$promotion->service->image}}" alt="" class="lazy-img rounded-circle"></a></div>
                                    <h4 class="candidate-name mt-15 mb-0"><a href="{{route('home.service_details',['service_slug'=>$promotion->service->slug])}}" class="tran3s">{{ $promotion->title }}</a></h4>
                                    <div class="candidate-post">{{ Str::limit($promotion->description,50) }}</div>
                                    <ul class="cadidate-skills style-none d-flex flex-wrap align-items-center justify-content-center justify-content-md-between pt-30 sm-pt-20 pb-10">
                                        <li>{{ $promotion->category->name}}</li>
                                        <li class="more">{{ $promotion->service->duration }}</li>
                                    </ul>
                                    <!-- /.cadidate-skills -->
                                    <div class="row gx-1">
                                        <div class="col-md-6">
                                            <div class="candidate-info mt-10">
                                                <span>Price</span>
                                                <div>{{$promotion->service->price}} / RWF</div>
                                            </div>
                                            <!-- /.candidate-info -->
                                        </div>
                                        <div class="col-md-6">
                                            <div class="candidate-info mt-10">
                                                <span>From:&nbsp;{{ $promotion->start_date }}</span>
                                                <div>End date:&nbsp;<span class="text-danger">{{ $promotion->end_date }}</span></div>
                                            </div>
                                            <!-- /.candidate-info -->
                                        </div>
                                    </div>
                                    <div class="row gx-2 pt-25 sm-pt-10">
                                        <div class="col-md-6">
                                            <a href="{{route('home.service_details',['service_slug'=>$promotion->service->slug])}}" class="profile-btn tran3s w-100 mt-5">View Service</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{route('home.booking',['service_slug'=>$promotion->service->slug])}}" class="msg-btn tran3s w-100 mt-5">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.candidate-profile-card -->
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>

                </div>
                <!-- /.-->
            </div>
            <!-- /.col- -->
        </div>
    </div>
</section>
    
@endsection