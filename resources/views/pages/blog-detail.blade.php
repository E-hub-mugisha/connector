@extends('layouts.base')
@section('title','Blog Detail')
@section('content')

<!-- 
		=============================================
			Inner Banner
		============================================== 
		-->
<div class="inner-banner-one position-relative">
    <div class="container">
        <div class="position-relative">
            <div class="row">
                <div class="col-xl-6 m-auto text-center">
                    <div class="title-two">
                        <h2 class="text-white">Blog</h2>
                    </div>
                    <p class="text-lg text-white mt-30 lg-mt-20">{{$blog->title}}</p>
                </div>
            </div>

        </div>
    </div>
    <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/shape/shape_02.svg')}}" alt="" class="lazy-img shapes shape_01">
    <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/shape/shape_03.svg')}}" alt="" class="lazy-img shapes shape_02">
</div> <!-- /.inner-banner-one -->



<!-- 
		=============================================
			Blog
		============================================== 
		-->
<section class="blog-section pt-100 lg-pt-80">
    <div class="container">
        <div class="border-bottom pb-160 xl-pb-130 lg-pb-80">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-page pe-xxl-5 me-xxl-3">
                        <article class="blog-details-meta">
                            
                            <h2 class="blog-heading">{{$blog->title}}</h2>
                            <div class="img-meta mb-15"><img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{asset('image/blog')}}/{{$blog->image}}" alt="" class="lazy-img"></div>
                            <div class="blog-pubish-date">{{$blog->blog_category}} . {{$blog->created_at}} . Read By <a href="#">{{$blog->views}}</a></div>
                            <p>{!!$blog->content!!}</p> <br>
                            <div class="img-meta mb-15"><img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{asset('image/blog')}}/{{$blog->image}}" alt="" class="lazy-img"></div>

                            <div class="bottom-widget border-bottom d-sm-flex align-items-center justify-content-between">
    <ul class="d-flex tags style-none pb-20">
        <li>Tag:</li>
        <li>
            <a href="{{ route('blogCategory.show', $blog->blog_category) }}">
                {{ $blog->blog_category }}
            </a>
        </li>
    </ul>
    
    <ul class="d-flex share-icon align-items-center style-none pb-20">
        <li>Share:</li>
        
        <!-- Facebook -->
        <li>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank">
                <i class="bi bi-facebook"></i>
            </a>
        </li>
        
        <!-- Twitter -->
        <li>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank">
                <i class="bi bi-twitter"></i>
            </a>
        </li>
        
        <!-- LinkedIn -->
        <li>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}" target="_blank">
                <i class="bi bi-linkedin"></i>
            </a>
        </li>

        <!-- WhatsApp -->
        <li>
            <a href="https://api.whatsapp.com/send?text={{ urlencode(request()->fullUrl()) }}" target="_blank">
                <i class="bi bi-whatsapp"></i>
            </a>
        </li>
        
        <!-- Snapchat (Snapchat does not support direct URL sharing) -->
        <li>
            <a href="https://www.snapchat.com" target="_blank">
                <i class="bi bi-snapchat"></i>
            </a>
        </li>
        
        <!-- Email -->
        <li>
            <a href="mailto:?subject=Check%20out%20this%20blog&body={{ urlencode(request()->fullUrl()) }}">
                <i class="bi bi-envelope"></i>
            </a>
        </li>
    </ul>
</div>

                        </article>
                        <!-- /.blog-details-meta -->
                        <div class="blog-comment-area">
                            <h3 class="blog-inner-title pb-15">2 Comments</h3>
                            @forelse($blog->comments as $comment)
                            <div class="comment d-flex">
                                <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{asset('assets/images/avatar.jpg') }}" alt="" class="lazy-img user-avatar rounded-circle">
                                <div class="comment-text">
                                    <div class="name fw-500 tx-dark">
                                        @if($comment->user)
                                        {{$comment->user->name}}
                                        @endif
                                    </div>
                                    <div class="date">{{$comment->created_at}}</div>
                                    <p>{{$comment->comment_body}}</p>
                                    <a href="#" class="reply-btn fw-500 tran3s">Reply</a>
                                </div> <!-- /.comment-text -->
                            </div> <!-- /.comment -->
                            @empty
                            <h6>No Comment so far</h6>
                            @endforelse
                        </div>
                        <!-- /.blog-comment-area -->
                        <div class="blog-comment-form">
                            <h3 class="blog-inner-title">Leave A Comment</h3>
                            <!-- <p><a href="signin.html" class="text-decoration-underline">Sign</a> in to post your comment or signup if you don't have any account.</p> -->
                            <form action="/sendComment" method="POST" class="mt-30">
                                @csrf
                                <div class="input-wrapper mb-35">
                                    <input type="hidden" class="form-control" id="blog_id" name="blog_id" value="{{$blog->id}}" required>
                                </div><!-- End .col-md-6 -->
                                <div class="input-wrapper mb-30">
                                    <textarea id="comment_body" name="comment_body" placeholder="Your Comment"></textarea>
                                </div> <!-- /.input-wrapper -->
                                <button type="submit" class="btn-ten fw-500 text-white text-center pe-5 ps-5 tran3s">Post Comment</button>
                            </form>
                        </div> <!-- /.blog-comment-form -->
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="blog-sidebar ps-xl-4 md-mt-60">
                        <div class="sidebar-recent-news mb-60 lg-mb-40">
                            <h4 class="sidebar-title">Recent News</h4>
                            @foreach($r_blog as $r_blog)
                            <div class="news-block d-flex align-items-center pt-20 pb-20 border-top">
                                <div><img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{asset('image/blog')}}/{{$r_blog->image}}" alt="" class="lazy-img"></div>
                                <div class="post ps-4">
                                    <h4 class="mb-5">
                                        <a href="{{route('home.blog_detail',['blog_slug'=>$r_blog->slug])}}" class="title tran3s">{{$r_blog->title}}</a>
                                    </h4>
                                    <div class="date">{{$r_blog->created_at}}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /.blog-sidebar -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./blog-section -->


<!--
		=====================================================
			Footer One
		=====================================================
		-->
<section class="job-portal-intro">
    <div class="container">
        <div class="wrapper bottom-border pt-65 md-pt-50 pb-65 md-pb-50">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="text-center text-lg-start">
                        <h2>Most complete job portal.</h2>
                        <p class="text-md m0 md-pb-20">Signup and start find your service or talents.</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <ul class="btn-group style-none d-flex flex-wrap justify-content-center justify-content-lg-end">
                        <li class="me-2"><a href="{{ route('home.services')}}" class="btn-three">Looking for service?</a></li>
                        <li class="ms-2"><a href="{{ route('register')}}" class="btn-four">Join for a service</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.job-portal-intro -->
@endsection