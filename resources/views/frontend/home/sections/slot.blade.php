<!--============================
        RECENT SLOTS START  
==============================-->
<section id="wsus__recent_slots">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header">
                    <h3>Recent Slots</h3>
                    <a class="see_btn" href="{{ route('slots.index') }}">see more <i class="fas fa-caret-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row flash_sell_slider">
            @foreach ($recentSlots as $slot)
                <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__new">New</span>
                        <a class="wsus__pro_link" href="{{ route('slots.slot-details', $slot->id) }}">
                            <img src="{{ asset($slot->image) }}" alt="{{ $slot->title }}" class="img-fluid w-100 img_1" />
                            <img src="{{ asset($slot->image) }}" alt="{{ $slot->title }}" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="{{ route('slots.slot-details', $slot->id) }}"><i class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">{{ $slot->category->name ?? 'General' }}</a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($slot->date)->format('M d, Y') }}
                            </p>
                            <a class="wsus__pro_name" href="{{ route('slots.slot-details', $slot->id) }}">{{ Str::limit($slot->title, 20) }}</a>
                            <p class="wsus__price">${{ number_format($slot->price, 2) }}</p>
                            <a class="add_cart" href="{{ route('slots.slot-details', $slot->id) }}">View Slot</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!--============================
        RECENT SLOTS END  
==============================-->


<!--============================
    HOME SLOTS START
==============================-->
<section id="wsus__slots" class="home_slots">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header">
                    <h3>{{ \App\Helpers\TranslationHelper::translate('Recent Slots') }}</h3>
                    <a class="see_btn" href="#">{{ \App\Helpers\TranslationHelper::translate('See more') }} <i class="fas fa-caret-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row home_slot_slider">
            @foreach ($recentSlots as $slot)
                <div class="col-xl-3">
                    <div class="wsus__single_slot wsus__single_slot_2">
                        <a class="wsus__slot_img" href="{{ route('slots.slot-details', $slot->id) }}">
                            <img src="{{ asset($slot->image) }}" alt="{{ $slot->title }}" class="img-fluid w-100">
                        </a>
                        <div class="wsus__slot_text">
                            <a class="slot_top red" href="{{ route('slots.slot-details', $slot->id) }}">
                                {{ Str::limit($slot->category->name, 10) }}
                            </a>
                            <div class="wsus__slot_text_center">
                                <a href="{{ route('slots.slot-details', $slot->id) }}">{{ \App\Helpers\TranslationHelper::translate(Str::limit($slot->title, 20)) }}</a>
                                <p class="date">{{ \Carbon\Carbon::parse($slot->date)->format('M d Y') }}</p>
                                <p class="capacity">{{ $slot->remainingSeats() }} seats left out of {{ $slot->capacity }}</p>
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
