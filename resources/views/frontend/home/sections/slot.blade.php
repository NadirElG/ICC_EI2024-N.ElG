<!--============================
    HOME SLOTS START
==============================-->
<section id="wsus__blogs" class="home_blogs">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header">
                    <h3>{{ \App\Helpers\TranslationHelper::translate('Recent Slots') }}</h3>
                    <a class="see_btn" href="#">{{ \App\Helpers\TranslationHelper::translate('See more') }} <i class="fas fa-caret-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row home_blog_slider">
            @foreach ($recentSlots as $slot)
                <div class="col-xl-3">
                    <div class="wsus__single_blog wsus__single_blog_2">
                        <a class="wsus__blog_img" href="{{ route('slots.details', $slot->id) }}">
                            <img src="{{ asset($slot->image ?? '/uploads/default-slot.jpg') }}" alt="slot" class="img-fluid w-100">
                        </a>
                        <div class="wsus__blog_text">
                            <a class="blog_top red" href="{{ route('slots.details', $slot->id) }}">
                                {{ Str::limit($slot->category->name ?? \App\Helpers\TranslationHelper::translate('Non spécifié'), 10) }}
                            </a>
                            <div class="wsus__blog_text_center">
                                <a href="{{ route('slots.details', $slot->id) }}">
                                    {{ \App\Helpers\TranslationHelper::translate(Str::limit($slot->title, 20)) }}
                                </a>
                                <p class="date">{{ \Carbon\Carbon::parse($slot->date)->format('M d Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--============================
    HOME SLOTS END
==============================-->
