@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Category</h1>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h4>Update Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Category Name -->
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter category name" value="{{ $category->name }}" required>
                </div>

                <!-- Category Image -->
                <div class="form-group">
                    <label for="image">Category Image</label>
                    <input type="file" name="image" class="form-control" id="image-upload">
                </div>

                <!-- Category Description -->
                <div class="form-group">
                    <label for="description">Category Description</label>
                    <textarea name="description" class="form-control" placeholder="Enter category description" rows="4">{{ old('description', $category->description) }}</textarea>
                </div>

                <!-- Category Status -->
                <div class="form-group">
                    <label for="status">Category Status</label>
                    <select name="status" class="form-control">
                        <option @selected($category->status === 1) value="1">Active</option>
                        <option @selected($category->status === 0) value="0">Inactive</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </div>
                
            </form>
        </div>
    </div>
</section>

@endsection
