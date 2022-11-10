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
                                    <span>Tags:</span> <a href="#">photography</a> <a href="#">style</a>
                                </div><!-- End .entry-tags -->
                            </div><!-- End .col -->

                            <div class="col-md-auto mt-2 mt-md-0">
                                <div class="social-icons social-icons-color">
                                    <span class="social-label">Share this post:</span>
                                    <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                    <a href="#" class="social-icon social-linkedin" title="Linkedin" target="_blank"><i class="icon-linkedin"></i></a>
                                </div><!-- End .soial-icons -->
                            </div><!-- End .col-auto -->
                        </div><!-- End .entry-footer row no-gutters -->
                    </div><!-- End .entry-body -->

                    <div class="entry-author-details">
                        <figure class="author-media">
                            <a href="#">
                                <img src="assets/images/blog/single/author.jpg" alt="User name">
                            </a>
                        </figure><!-- End .author-media -->

                        <div class="author-body">
                            <div class="author-header row no-gutters flex-column flex-md-row">
                                <div class="col">
                                    <h4><a href="#">John Doe</a></h4>
                                </div><!-- End .col -->
                                <div class="col-auto mt-1 mt-md-0">
                                    <a href="#" class="author-link">View all posts by John Doe <i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .col -->
                            </div><!-- End .row -->

                            <div class="author-content">
                                <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas auguae, eu vulputate magna eros eu erat. Aliquam erat volutpat. </p>
                            </div><!-- End .author-content -->
                        </div><!-- End .author-body -->
                    </div><!-- End .entry-author-details-->
                </article><!-- End .entry -->

                <nav class="pager-nav" aria-label="Page navigation">
                    <a class="pager-link pager-link-prev" href="#" aria-label="Previous" tabindex="-1">
                        Previous Post
                        <span class="pager-link-title">Cras iaculis ultricies nulla</span>
                    </a>

                    <a class="pager-link pager-link-next" href="#" aria-label="Next" tabindex="-1">
                        Next Post
                        <span class="pager-link-title">Praesent placerat risus</span>
                    </a>
                </nav><!-- End .pager-nav -->

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
                    <div class="widget widget-search">
                        <h3 class="widget-title">Search</h3><!-- End .widget-title -->

                        <form action="#">
                            <label for="ws" class="sr-only">Search in blog</label>
                            <input type="search" class="form-control" name="ws" id="ws" placeholder="Search in blog" required>
                            <button type="submit" class="btn"><i class="icon-search"></i><span class="sr-only">Search</span></button>
                        </form>
                    </div><!-- End .widget -->

                    <div class="widget widget-cats">
                        <h3 class="widget-title">Categories</h3><!-- End .widget-title -->

                        <ul>
                            <li><a href="#">Lifestyle<span>3</span></a></li>
                            <li><a href="#">Shopping<span>3</span></a></li>
                            <li><a href="#">Fashion<span>1</span></a></li>
                            <li><a href="#">Travel<span>3</span></a></li>
                            <li><a href="#">Hobbies<span>2</span></a></li>
                        </ul>
                    </div><!-- End .widget -->

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

                    <div class="widget widget-banner-sidebar">
                        <div class="banner-sidebar-title">ad box 280 x 280</div><!-- End .ad-title -->

                        <div class="banner-sidebar">
                            <a href="#">
                                <img src="{{asset('assets/images/blog/sidebar/banner.jpg')}}" alt="banner">
                            </a>
                        </div><!-- End .banner-ad -->
                    </div><!-- End .widget -->

                    <div class="widget">
                        <h3 class="widget-title">Browse Tags</h3><!-- End .widget-title -->

                        <div class="tagcloud">
                            <a href="#">fashion</a>
                            <a href="#">style</a>
                            <a href="#">women</a>
                            <a href="#">photography</a>
                            <a href="#">travel</a>
                            <a href="#">shopping</a>
                            <a href="#">hobbies</a>
                        </div><!-- End .tagcloud -->
                    </div><!-- End .widget -->

                    <div class="widget widget-text">
                        <h3 class="widget-title">About Blog</h3><!-- End .widget-title -->

                        <div class="widget-text-content">
                            <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, pulvinar nunc sapien ornare nisl.</p>
                        </div><!-- End .widget-text-content -->
                    </div><!-- End .widget -->
                </div><!-- End .sidebar sidebar-shop -->
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .page-content -->