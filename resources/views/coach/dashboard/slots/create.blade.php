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
                    <h3><i class="fas fa-calendar-plus"></i> Create Slot</h3>
                    <div class="wsus__dashboard_profile">
                        <div class="wsus__dash_pro_area">
                            <h4>Slot Information</h4>
                            <form action="" method="POST">
                                @csrf
                                <div class="col-xl-9">
                                    <div class="row">
                                        <!-- Title -->
                                        <div class="col-xl-12">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fas fa-edit"></i>
                                                <input type="text" name="title" placeholder="Slot Title" required>
                                            </div>
                                        </div>
                                        
                                        <!-- Description -->
                                        <div class="col-xl-12">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fas fa-align-left"></i>
                                                <textarea name="description" placeholder="Description (optional)" rows="3"></textarea>
                                            </div>
                                        </div>

                                        <!-- Date -->
                                        <div class="col-xl-12">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fas fa-calendar-alt"></i>
                                                <input type="date" name="date" placeholder="Date" required>
                                            </div>
                                        </div>
                                        
                                        <!-- Start Time and End Time on the same row -->
                                        <div class="col-xl-6 col-md-6">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fas fa-clock"></i>
                                                <input type="time" name="start_time" placeholder="Start Time" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xl-6 col-md-6">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fas fa-clock"></i>
                                                <input type="time" name="end_time" placeholder="End Time" required>
                                            </div>
                                        </div>
                                        
                                        <!-- Capacity -->
                                        <div class="col-xl-12">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fas fa-users"></i>
                                                <input type="number" name="capacity" placeholder="Capacity" min="1" required>
                                            </div>
                                        </div>

                                        <!-- Location -->
                                        <div class="col-xl-12">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <input type="text" name="location" placeholder="Location (optional)">
                                            </div>
                                        </div>

                                        <!-- Price without decimal support -->
                                        <div class="col-xl-12">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fas fa-dollar-sign"></i>
                                                <input type="number" name="price" placeholder="Price per participant" step="1" min="0" value="0" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <button class="common_btn mb-4 mt-2" type="submit">Create Slot</button>
                                </div>
                            </form>
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
