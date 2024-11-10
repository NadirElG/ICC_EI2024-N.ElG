@extends('coach.dashboard.layouts.master')

@section('content')

<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('coach.dashboard.layouts.sidebar')
        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content mt-2 mt-md-0">
                    <h3><i class="fal fa-calendar"></i> Create New Slot</h3>
                    <div class="wsus__dashboard_add wsus__add_slot">
                        <form id="slotForm" action="{{ route('coach.slots.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-xl-6 col-md-6">
                                    <div class="wsus__add_address_single">
                                        <label>Title <b>*</b></label>
                                        <input type="text" name="title" placeholder="Slot Title" value="{{ old('title') }}" required>
                                    </div>
                                </div>
                                
                                <div class="col-xl-6 col-md-6">
                                    <div class="wsus__add_address_single">
                                        <label>Date <b>*</b></label>
                                        <input type="date" name="date" value="{{ old('date') }}" required>
                                    </div>
                                </div>
                                
                                <div class="col-xl-6 col-md-6">
                                    <div class="wsus__add_address_single">
                                        <label>Start Time <b>*</b></label>
                                        <input type="time" name="start_time" value="{{ old('start_time') }}" required>
                                    </div>
                                </div>
                                
                                <div class="col-xl-6 col-md-6">
                                    <div class="wsus__add_address_single">
                                        <label>End Time <b>*</b></label>
                                        <input type="time" name="end_time" value="{{ old('end_time') }}" required>
                                    </div>
                                </div>
                                
                                <div class="col-xl-6 col-md-6">
                                    <div class="wsus__add_address_single">
                                        <label>Capacity <b>*</b></label>
                                        <input type="number" name="capacity" placeholder="Max Participants" value="{{ old('capacity') }}" min="1" required>
                                    </div>
                                </div>
                                
                                <div class="col-xl-6 col-md-6">
                                    <div class="wsus__add_address_single">
                                        <label>Location</label>
                                        <input type="text" name="location" placeholder="Location" value="{{ old('location') }}">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6">
                                    <div class="wsus__add_address_single">
                                        <label>Category <b>*</b></label>
                                        <div class="wsus__topbar_select">
                                            <select name="category_id" required>
                                                <option value="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xl-6 col-md-6">
                                    <div class="wsus__add_address_single">
                                        <label>Price (per person) <b>*</b></label>
                                        <input type="number" name="price" placeholder="Price" value="{{ old('price') }}" min="0" required>
                                    </div>
                                </div>
                                
                                <div class="col-xl-6 col-md-6">
                                    <div class="wsus__add_address_single">
                                        <label>Status <b>*</b></label>
                                        <div class="wsus__topbar_select">
                                            <select name="status" required>
                                                <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>Open</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xl-12">
                                    <div class="wsus__add_address_single">
                                        <label>Image <b>*</b></label>
                                        <input type="file" name="image" accept="image/*" required>
                                    </div>
                                </div>
                                
                                <div class="col-xl-12">
                                    <div class="wsus__add_address_single">
                                        <label>Description</label>
                                        <textarea name="description" cols="3" rows="5" placeholder="Slot Description">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                
                                <div class="col-xl-6">
                                    <button type="button" class="common_btn" onclick="confirmCreation()">Create Slot</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal de confirmation -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirm Slot Creation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Creating a slot will deduct 10 credits from your balance. Do you wish to proceed?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitForm()">Confirm</button>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmCreation() {
        var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
        confirmationModal.show();
    }

    function submitForm() {
        document.getElementById('slotForm').submit();
    }
</script>

@endsection
