@extends('layouts.base')
@section('title', 'Blogs in ' . $category)
@section('content')

<!-- Inner Banner -->
<div class="inner-banner-one position-relative">
    <div class="container">
        <div class="position-relative">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Explore blogs in <span>{{ $category }}</span></h3>
                    <p class="text-lg text-white mt-40 md-mt-30 mb-50 md-mb-30">Discover insights, stories, and creativity under the <strong>{{ $category }}</strong> category.</p>
                </div>
            </div>
        </div>
    </div>
    <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/shape/shape_02.svg')}}" alt="" class="lazy-img shapes shape_01">
    <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('asset/images/shape/shape_03.svg')}}" alt="" class="lazy-img shapes shape_02">
</div>

<!-- Blog Section -->
<section class="blog-section-one mt-160 xl-mt-30 lg-mt-100">
    <div class="container">
        <div class="position-relative">
            <div class="row">
                <div class="col-lg-6">
                    <div class="heading text-center mb-3">
                        <h2 class="title">{{ $category }} Blogs</h2>
                        <p class="title-desc">Latest articles in {{ $category }}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="{{ route('searchBlog.home') }}" method="GET">
                        <input type="text" name="query" placeholder="Search..." value="{{ request('query') }}" required>
                        <button type="submit" class="btn apply-btn" style="color: #fff; background: #6B9080;">Search</button>
                    </form>
                </div>
            </div>

            <div class="row gx-xl-5">
                @foreach($blogs as $blog)
                <div class="col-sm-4">
                    <article class="blog-meta-two mt-15 xs-mt-20 wow fadeInUp">
                        <figure class="post-img m0">
                            <a href="{{ route('home.blog_detail', ['blog_slug' => $blog->slug]) }}" class="w-100 d-block">
                                <img src="{{ asset('asset/images/lazy.svg')}}" data-src="{{ asset('image/blog/' . $blog->image) }}" alt="" class="lazy-img w-100 tran4s" style="height: 300px; width: 100%; object-fit: cover;">
                            </a>
                            <a href="{{ route('blogCategory.show', $blog->blog_category) }}" class="tags fw-500">{{ $blog->blog_category }}</a>
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
                            <a href="{{ route('home.blog_detail', ['blog_slug' => $blog->slug]) }}">
                                <h4 class="tran3s blog-title">{{ Str::limit($blog->title, 50) }}</h4>
                            </a>
                            <a href="{{ route('home.blog_detail', ['blog_slug' => $blog->slug]) }}" class="continue-btn tran3s d-flex align-items-center">
                                <span class="fw-500 me-2">Continue Reading</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>

            <div class="row mt-2">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{ $blogs->links() }}
                    </ul>
                </nav>
            </div>
            <div class="text-center explore-btn sm-mt-50">
                <a href="{{ route('home.blogs') }}" class="btn-six">Explore More</a>
            </div>
        </div>
    </div>
</section>

@include('includes.call-to-action')
@endsection
