@extends('coach.dashboard.layouts.master')

@section('content')

<!--=============================
    DASHBOARD START
==============================-->
<section id="wsus__dashboard">
    <div class="container-fluid">
    @include('coach.dashboard.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3><i class="fas fa-calendar-alt"></i> Slots</h3>
                        <a href="{{ route('coach.slots.create') }}" class="btn btn-primary">Create Slot</a>
                    </div>

                    <div class="wsus__dashboard_slots">
                        <div class="row">
                            <!-- Static Slot Item 1 -->
                            <div class="col-xl-6">
                                <div class="wsus__dashboard_review_item">
                                    <div class="wsus__dash_rev_img">
                                        <img src="images/slot_image.jpg" alt="slot" class="img-fluid w-100">
                                    </div>
                                    <div class="wsus__dash_rev_text">
                                        <h5>Yoga Session <span>12-05-2023</span></h5>
                                        <p><i class="fas fa-clock"></i> Start: 08:00 AM - End: 09:30 AM</p>
                                        <p><i class="fas fa-map-marker-alt"></i> Location: Fitness Center</p>
                                        <p><i class="fas fa-user-friends"></i> Capacity: 20</p>
                                        <p><i class="fas fa-dollar-sign"></i> Price: $25</p>
                                        <ul>
                                            <li><a href="#" class="text-warning"><i class="fal fa-edit"></i> Edit</a></li>
                                            <li><a href="#" class="text-danger"><i class="far fa-trash-alt"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Static Slot Item 2 -->
                            <div class="col-xl-6">
                                <div class="wsus__dashboard_review_item">
                                    <div class="wsus__dash_rev_img">
                                        <img src="images/slot_image2.jpg" alt="slot" class="img-fluid w-100">
                                    </div>
                                    <div class="wsus__dash_rev_text">
                                        <h5>Pilates Class <span>15-05-2023</span></h5>
                                        <p><i class="fas fa-clock"></i> Start: 10:00 AM - End: 11:30 AM</p>
                                        <p><i class="fas fa-map-marker-alt"></i> Location: Wellness Studio</p>
                                        <p><i class="fas fa-user-friends"></i> Capacity: 15</p>
                                        <p><i class="fas fa-dollar-sign"></i> Price: $30</p>
                                        <ul>
                                            <li><a href="#" class="text-warning"><i class="fal fa-edit"></i> Edit</a></li>
                                            <li><a href="#" class="text-danger"><i class="far fa-trash-alt"></i> Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Static Slot Items as needed -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=============================
    DASHBOARD END
==============================-->

@endsection
