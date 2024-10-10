@extends('admin.layouts.master')

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>

        <div class="col-12 col-md-12 col-lg-7">
            <div class="card">
            <form method="post" action="{{ route('admin.profile.update') }}">
                    @csrf

                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>First Name</label>
                                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                                <div class="invalid-feedback">
                                    Please fill in the first name
                                </div>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" value="{{ Auth::user()->username }}" required>
                                <div class="invalid-feedback">
                                    Please fill in the username
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-7 col-12">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
                                <div class="invalid-feedback">
                                    Please fill in the email
                                </div>
                            </div>

                            <!-- <div class="form-group col-md-5 col-12">
                                <label>Phone</label>
                                <input type="tel" name="phone" class="form-control" value="{{ Auth::user()->phone ?? '' }}">
                            </div> -->
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Role</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->role }}" disabled>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label>Status</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->status }}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
