<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BlogCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.blog-category.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    { 
        return view('admin.blog.blog-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name',
            'status' => 'required|boolean',
        ]);
    
        $category = new BlogCategory();
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->status = $request->input('status');
        $category->save();
    
        return to_route('admin.blog-category.index')->with('success', 'Category created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = BlogCategory::findOrFail($id);
        return view('admin.blog.blog-category.edit', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name,' . $id,
            'status' => 'required|boolean',
        ], [
            'name.required' => 'Category name is required',
            'name.unique' => 'Category name must be unique',
        ]);

        $category = BlogCategory::findOrFail($id);
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name')); // Génère le slug à partir du nom
        $category->status = $request->input('status');
        $category->save();

        return redirect()->route('admin.blog-category.index')->with('success', 'Category updated successfully.');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    try {
        $category = BlogCategory::findOrFail($id);
        $category->delete();

        return response(['status' => 'success', 'message' => 'Category deleted successfully']);
    } catch (\Exception $e) {
        return response(['status' => 'error', 'message' => $e->getMessage()]);
    }
}


}
