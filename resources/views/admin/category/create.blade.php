@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Category</h1>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h4>Create Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.category.store') }}" method="POST">
                @csrf

                <!-- Category Name -->
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter category name" required>
                </div>

                <!-- Category Image -->
                <div class="form-group">
                    <label>
                        Image
                    </label>
                    <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">
                            Choose File
                        </label>
                        <input type="file" name="image" id="image-upload" />
                    </div>
                </div>

                <!-- Category Description -->
                <div class="form-group">
                    <label for="description">Category Description</label>
                    <textarea name="description" class="form-control" placeholder="Enter category description" rows="4" required></textarea>
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
                    <button type="submit" class="btn btn-primary">Create Category</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
