@section('title', 'Blog Detail')

<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
        <h1 class="page-title">{{$blog->title}}</h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$blog->slug}}</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <article class="entry single-entry">
                    <figure class="entry-media">
                        <img src="{{asset('assets/images/blogs/thumbnails')}}/{{$blog->thumbnail}}" alt="image desc">
                    </figure><!-- End .entry-media -->

                    <div class="entry-body">
                        <div class="entry-meta">
                            <span class="entry-author">
                                by <a href="#">HileTasker</a>
                            </span>
                            <span class="meta-separator">|</span>
                            <a href="#">{{$blog->created_at}}</a>
                            <span class="meta-separator">|</span>
                            <a href="#">2 Comments</a>
                        </div><!-- End .entry-meta -->

                        <h2 class="entry-title">
                            {{$blog->title}}
                        </h2><!-- End .entry-title -->

                        <div class="entry-cats">
                            in <a href="#">{{$blog->blog_category}}</a>
                        </div><!-- End .entry-cats -->

                        <div class="entry-content editor-content">
                            <p>{{$blog->content}}</p>
                            <div class="pb-1"></div><!-- End .mb-1 -->

                            <img src="{{asset('assets/images/blogs')}}/{{$blog->image}}" alt="image" class="float-left">


                            <p>{{$blog->slug}}</p>

                        </div><!-- End .entry-content -->

                        <div class="entry-footer row no-gutters flex-column flex-md-row">
                            <div class="col-md">
                                <div class="entry-tags">
                                    <span>Post visitors:</span> <a href="#">{{$blog->views}}</a>
                                </div><!-- End .entry-tags -->
                            </div><!-- End .col -->

                            <div class="col-md-auto mt-2 mt-md-0">
                                <div class="social-icons social-icons-color">
                                    <div class="ss-box"></div>
                                    <!-- <span class="social-label">Share this post:</span> -->
                                    <!-- <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a> -->
                                    <!-- <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a> -->
                                    <!-- <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a> -->
                                    <!-- <a href="#" class="social-icon social-linkedin" title="Linkedin" target="_blank"><i class="icon-linkedin"></i></a> -->
                                </div>
                            </div><!-- End .col-auto -->
                        </div><!-- End .entry-footer row no-gutters -->
                    </div><!-- End .entry-body -->

                </article><!-- End .entry -->

                <div>
                    <div class="comments">
                        <h3 class="title">Comments</h3><!-- End .title -->

                        <ul>
                            @forelse($blog->comments as $comment)
                            <li>
                                <div class="comment">
                                    <figure class="comment-media">
                                        <a href="#">
                                            <img src="{{asset('assets/images/avatar.jpg') }}" alt="User name">
                                        </a>
                                    </figure>

                                    <div class="comment-body">
                                        <div class="comment-user">
                                            <h4>
                                                <a href="#">
                                                    @if($comment->user)
                                                    {{$comment->user->name}}
                                                    @endif
                                                </a>
                                            </h4>
                                            <span class="comment-date">{{$comment->created_at}}</span>
                                        </div><!-- End .comment-user -->

                                        <div class="comment-content">
                                            <p>{{$comment->comment_body}}</p>
                                        </div><!-- End .comment-content -->
                                    </div><!-- End .comment-body -->
                                </div><!-- End .comment -->
                            </li>
                            @empty
                            <h6>No Comment so far</h6>
                            @endforelse
                        </ul>
                    </div><!-- End .comments -->
                    <div class="reply">
                        <div class="heading">
                            <h3 class="title">Leave A Reply</h3><!-- End .title -->
                            <p class="title-desc">Your email address will not be published. Required fields are marked *</p>
                        </div><!-- End .heading -->

                        <form action="/sendComment" method="POST">
                            @csrf
                            <label for="reply-message" class="sr-only">Comment</label>
                            <textarea name="comment_body" id="comment_body" cols="30" rows="4" class="form-control" required placeholder="Comment *"></textarea>

                            <div class="row">

                                <div class="col-md-6">
                                    <input type="hidden" class="form-control" id="blog_id" name="blog_id" value="{{$blog->id}}" required>
                                </div><!-- End .col-md-6 -->
                            </div><!-- End .row -->

                            <button type="submit" class="btn btn-outline-primary-2">
                                <span>POST COMMENT</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </form>
                    </div><!-- End .reply -->
                </div>

                @if($r_blog)
                <div class="related-posts">
                    <h3 class="title">Related Posts</h3><!-- End .title -->

                    <div class="owl-carousel owl-simple" data-toggle="owl" data-owl-options='{
                                        "nav": false, 
                                        "dots": true,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":1
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            }
                                        }
                                    }'>
                        <article class="entry entry-grid">
                            <figure class="entry-media">
                                <a href="{{route('home.blog_detail',['blog_slug'=>$blog->slug])}}">
                                    <img src="{{asset('assets/images/blogs/thumbnails')}}/{{$r_blog->thumbnail}}" alt="{{$r_blog->slug}}">
                                </a>
                            </figure><!-- End .entry-media -->

                            <div class="entry-body">
                                <div class="entry-meta">
                                    <a href="#">{{$r_blog->created_at}}</a>
                                    <span class="meta-separator">|</span>
                                    <a href="#">2 Comments</a>
                                </div><!-- End .entry-meta -->

                                <h2 class="entry-title">
                                    <a href="{{route('home.blog_detail',['blog_slug'=>$blog->slug])}}">{{$r_blog->title}}</a>
                                </h2><!-- End .entry-title -->

                                <div class="entry-cats">
                                    in <a href="#">{{$r_blog->blog_category}}</a>
                                </div><!-- End .entry-cats -->
                            </div><!-- End .entry-body -->
                        </article><!-- End .entry -->
                    </div><!-- End .owl-carousel -->
                </div><!-- End .related-posts -->
                @endif

            </div><!-- End .col-lg-9 -->

            <aside class="col-lg-3">
                <div class="sidebar">
                    <div class="widget">
                        @if($r_blog)
                        <h3 class="widget-title">Popular Posts</h3><!-- End .widget-title -->

                        <ul class="posts-list">

                            <li>
                                <figure>
                                    <a href="{{route('home.blog_detail',['blog_slug'=>$blog->slug])}}">
                                        <img src="{{asset('assets/images/blogs/thumbnails')}}/{{$r_blog->thumbnail}}" alt="{{$r_blog->slug}}">
                                    </a>
                                </figure>

                                <div>
                                    <span>{{$r_blog->created_at}}</span>
                                    <h4><a href="{{route('home.blog_detail',['blog_slug'=>$blog->slug])}}">{{$r_blog->title}}</a></h4>
                                </div>
                            </li>
                        </ul><!-- End .posts-list -->
                        @endif
                    </div><!-- End .widget -->

                    <!-- <div class="widget widget-banner-sidebar">
                        <div class="banner-sidebar-title">ad box 280 x 280</div>

                        <div class="banner-sidebar">
                            <a href="#">
                                <img src="{{asset('assets/images/blog/sidebar/banner.jpg')}}" alt="banner">
                            </a>
                        </div>
                    </div> -->

                    <!-- <div class="widget">
                        <h3 class="widget-title">Browse Tags</h3>

                        <div class="tagcloud">
                            <a href="#">fashion</a>
                            <a href="#">style</a>
                            <a href="#">women</a>
                            <a href="#">photography</a>
                            <a href="#">travel</a>
                            <a href="#">shopping</a>
                            <a href="#">hobbies</a>
                        </div>
                    </div> -->

                    <!-- <div class="widget widget-text">
                        <h3 class="widget-title">About Blog</h3>

                        <div class="widget-text-content">
                            <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, pulvinar nunc sapien ornare nisl.</p>
                        </div>
                    </div> -->
                </div><!-- End .sidebar sidebar-shop -->
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .page-content -->