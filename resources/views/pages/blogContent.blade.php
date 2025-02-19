<!--
		=====================================================
			Blog Section One
		=====================================================
		-->
<section class="blog-section-one mt-160 xl-mt-30 lg-mt-100">
    <div class="container">
        <div class="position-relative">
            <div class="row">
                <div class="col-xl-7">
                    <div class="heading text-center mb-3">
                        <h2 class="title">Today’s</h2><!-- End .title -->
                        <p class="title-desc">News</p><!-- End .title-desc -->
                    </div><!-- End .heading -->
                </div>
            </div>

            <div class="row gx-xl-5">
                @foreach($blogs as $blog)
                <div class="col-sm-4">
                    <article class="blog-meta-two mt-15 xs-mt-20 wow fadeInUp">
                        <figure class="post-img m0">
                            <a href="{{route('home.blog_detail',['blog_slug'=>$blog->slug])}}" class="w-100 d-block">
                                <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{asset('image/blog')}}/{{$blog->image}}" alt="" class="lazy-img w-100 tran4s" style="height: 300px; width: 100%; object-fit: cover;"></a>
                            <a href="{{ route('blogCategory.show', $blog->blog_category) }}" class="tags fw-500">{{$blog->blog_category}}</a>
                        </figure>
                        <div class="post-data mt-15 lg-mt-20">
                            <div class="date">
    <span class="fw-500 text-dark">Created BY:</span> 
    @if ($blog->author && $blog->author->utype === 'SVP')

    @php
        $sprovider = \App\Models\ServiceProvider::where('user_id', $blog->author->id)->first();
    @endphp

    @if ($sprovider)
        <a href="https://connector.rw/profile/{{ $sprovider->id }}">{{ $blog->author->name }}</a>
    @else
        <a href="#">{{ $blog->author ? $blog->author->name : 'Unknown Author' }}</a>
    @endif

@else
    <a href="#">{{ $blog->author ? $blog->author->name : 'Unknown Author' }}</a>
@endif

</div>


                            <a href="{{route('home.blog_detail',['blog_slug'=>$blog->slug])}}">
                                <h4 class="tran3s blog-title">{{ Str::limit($blog->title, 50)}}</h4>
                            </a>
                            <a href="{{route('home.blog_detail',['blog_slug'=>$blog->slug])}}" class="continue-btn tran3s d-flex align-items-center">
                                <span class="fw-500 me-2">Continue Reading</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                    <!-- /.blog-meta-two -->
                </div>
                @endforeach
            </div>

            <div class="text-center explore-btn sm-mt-50"><a href="{{route('home.blogs')}}" class="btn-six">Explore More</a></div>
        </div>
    </div>
</section>
<!-- /.blog-section-one -->

