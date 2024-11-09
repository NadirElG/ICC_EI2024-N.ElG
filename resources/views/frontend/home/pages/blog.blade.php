@extends('frontend.layouts.master')

@section('content')    
    <!--============================
        BLOGS PAGE START
    ==============================-->
    <section id="wsus__blogs">
        <div class="container">
            @if(request()->has('search'))
            <h5>Search : {{request()->search}}</h5>
            <hr>
            @elseif(request()->has('category'))
            <h5>Category : {{request()->category}}</h5>
            <hr>
            @endif
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-xl-4 col-sm-6 col-lg-4 col-xxl-3">
                    <div class="wsus__single_blog wsus__single_blog_2">
                        <a class="wsus__blog_img" href="{{ route('blog-details', $blog->slug) }}">
                            <img src="{{ asset($blog->image) }}" alt="blog" class="img-fluid w-100">
                        </a>
                        <div class="wsus__blog_text">
                            <a class="blog_top red" href="{{ route('blog-details', $blog->slug) }}">
                                {{ Str::limit($blog->category->name, 10) }}
                            </a>
                            <div class="wsus__blog_text_center">
                                <a href="{{ route('blog-details', $blog->slug) }}">{{ Str::limit($blog->title, 20) }}</a>
                                <p class="date">{{ $blog->created_at->format('M d Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @if(count($blogs)===0)
            <div class="row">
                <div class="card">
                    <div class="card-body text-center">
                        <h3>No Blog Found !!</h3>
                    </div>       
                </div>
            </div>
            @endif

            <!-- Pagination -->
            <div id="pagination" class="mt-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <!-- Previous Button -->
                        @if (!$blogs->onFirstPage())
                            <li class="page-item">
                                <a class="page-link" href="{{ $blogs->previousPageUrl() }}" aria-label="Previous">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                        @endif

                        <!-- Page Numbers -->
                        @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $blogs->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        <!-- Next Button -->
                        @if ($blogs->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $blogs->nextPageUrl() }}" aria-label="Next">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <!--============================
        BLOGS PAGE END
    ==============================-->
@endsection
