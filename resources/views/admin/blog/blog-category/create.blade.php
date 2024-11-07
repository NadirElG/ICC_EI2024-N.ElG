@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Blog Category</h1>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h4>Create Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.blog-category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Category Name -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter category name" required>
                </div>

                <!-- Category Status -->
                <div class="form-group">
                    <label for="status">Category Status</label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
