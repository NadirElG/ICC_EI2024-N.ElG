@extends('frontend.layouts.master')

@section('content')

    <!--============================
        BLOGS DETAILS START
    ==============================-->
    <section id="wsus__blog_details">
        <div class="container">
            <div class="row">

                <!-- Main Blog Content Column -->
                <div class="col-xxl-9 col-xl-8 col-lg-8">
                    <div class="wsus__main_blog">

                        <!-- Blog Image -->
                        <div class="wsus__main_blog_img">
                            <img src="{{ asset($blog->image) }}" alt="blog" class="img-fluid w-100">
                        </div>

                        <!-- Blog Header (Author & Date) -->
                        <p class="wsus__main_blog_header">
                            <span><i class="fas fa-user-tie"></i> {{ \App\Helpers\TranslationHelper::translate('par') }} {{ $blog->user->name }}</span>
                            <span><i class="fal fa-calendar-alt"></i> {{ date('d M Y', strtotime($blog->created_at)) }}</span>
                        </p>

                        <!-- Blog Title and Content -->
                        <div class="wsus__description_area">
                            <h1>{{ \App\Helpers\TranslationHelper::translate($blog->title) }}</h1>
                            {!! \App\Helpers\TranslationHelper::translate($blog->description) !!}
                        </div>

                        <!-- Social Share Buttons -->
                        <div class="wsus__share_blog">
                            <p>{{ \App\Helpers\TranslationHelper::translate('Partager :') }}</p>
                            <ul>
                                <li><a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a class="twitter" href="https://twitter.com/share?url={{ url()->current() }}&text={{ $blog->title }}"><i class="fab fa-twitter"></i></a></li>
                                <li><a class="linkedin" href="https://www.linkedin.com/shareArticle?url={{ url()->current() }}&title={{ $blog->title }}&summary={{ Str::limit($blog->title, 20) }}"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>

                        <!-- Related Posts Section -->
                        <div class="wsus__related_post">
                            <div class="row">
                                <div class="col-xl-12">
                                    <h5>{{ \App\Helpers\TranslationHelper::translate('Plus de publications') }}</h5>
                                </div>
                            </div>
                            <div class="row blog_det_slider">
                                @foreach ($moreBlogs as $blogItem)
                                    <div class="col-xl-3">
                                        <div class="wsus__single_blog wsus__single_blog_2">
                                            <!-- Related Blog Image and Link -->
                                            <a class="wsus__blog_img" href="{{ route('blog-details', $blogItem->slug) }}">
                                                <img src="{{ asset($blogItem->image) }}" alt="blog" class="img-fluid w-100">
                                            </a>
                                            <div class="wsus__blog_text">
                                                <!-- Category and Title of Related Blog -->
                                                <a class="blog_top red" href="{{ route('blog-details', $blogItem->slug) }}">{{ Str::limit(\App\Helpers\TranslationHelper::translate($blogItem->category->name), 10) }}</a>
                                                <div class="wsus__blog_text_center">
                                                    <a href="{{ route('blog-details', $blogItem->slug) }}">{{ Str::limit(\App\Helpers\TranslationHelper::translate($blogItem->title), 20) }}</a>
                                                    <p class="date">{{ $blogItem->created_at->format('d M Y') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Comments Section -->
                        <div class="wsus__comment_area">
                            <h4>{{ \App\Helpers\TranslationHelper::translate('Commentaires') }} <span>{{ count($comments) }}</span></h4>
                            @foreach($comments as $comment)
                                <div class="wsus__main_comment">
                                    <div class="wsus__comment_text replay">
                                        <h6>{{ $comment->user->name }}<span>{{ date('d M Y', strtotime($comment->created_at)) }}</span></h6>
                                        <p>{{ \App\Helpers\TranslationHelper::translate($comment->comment) }}</p>
                                    </div>
                                </div>
                            @endforeach
                            @if(count($comments) === 0)
                                <i>{{ \App\Helpers\TranslationHelper::translate('Soyez le premier à commenter') }}</i>
                            @endif

                            <!-- Pagination for Comments -->
                            <div id="pagination">
                                <div class="mt-5">
                                    @if($comments->hasPages())
                                        {{ $comments->withQueryString()->links() }}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Comment Form -->
                        <div class="wsus__post_comment">
                            <h4>{{ \App\Helpers\TranslationHelper::translate('Publier un commentaire') }}</h4>
                            <form action="{{ route('blog-comment') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="wsus__single_com">
                                            <textarea rows="5" name="comment" placeholder="{{ \App\Helpers\TranslationHelper::translate('Votre commentaire') }}"></textarea>
                                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                        </div>
                                    </div>
                                </div>
                                <button class="common_btn" type="submit">{{ \App\Helpers\TranslationHelper::translate('Publier') }}</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Blog Sidebar with Categories and Recent Posts -->
                <div class="col-xxl-3 col-xl-4 col-lg-4">
                    <div class="wsus__blog_sidebar" id="sticky_sidebar">

                        <!-- Blog Search Form -->
                        <div class="wsus__blog_search">
                            <h4>{{ \App\Helpers\TranslationHelper::translate('Recherche') }}</h4>
                            <form action="{{ route('blog') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ \App\Helpers\TranslationHelper::translate('Recherche') }}" class="form-control">
                                    <button type="submit" class="btn btn-primary"><i class="far fa-search"></i></button>
                                </div>
                            </form>
                        </div>

                        <!-- Blog Categories List -->
                        <div class="wsus__blog_category">
                            <h4>{{ \App\Helpers\TranslationHelper::translate('Catégories') }}</h4>
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('blog', ['category' => $category->slug]) }}">{{ \App\Helpers\TranslationHelper::translate($category->name) }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Recent Blog Posts Section -->
                        <div class="wsus__blog_post">
                            <h4>{{ \App\Helpers\TranslationHelper::translate('Articles récents') }}</h4>
                            @foreach ($recentBlogs as $recentBlog)
                                <div class="wsus__blog_post_single">
                                    <a href="{{ route('blog-details', $recentBlog->slug) }}" class="wsus__blog_post_img">
                                        <img src="{{ asset($recentBlog->image) }}" alt="blog" class="img-fluid w-60">
                                    </a>
                                    <div class="wsus__blog_post_text">
                                        <a href="{{ route('blog-details', $recentBlog->slug) }}">{{ Str::limit(\App\Helpers\TranslationHelper::translate($recentBlog->title), 30) }}</a>
                                        <p><span>{{ $recentBlog->created_at->format('d M Y') }}</span> {{ $recentBlog->comments->count() }} {{ \App\Helpers\TranslationHelper::translate('Commentaire') }}{{ $recentBlog->comments->count() > 1 ? 's' : '' }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BLOGS DETAILS END
    ==============================-->

@endsection
