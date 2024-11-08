<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(BlogDataTable $dataTable)
    {   
        return $dataTable->render('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::where('status' , 1)->get();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required' , 'image' , 'max:3000'],
            'title' =>  ['required' , 'string' , 'max:255' , 'unique:blogs,title'],
            'description' => ['required' , 'string'],
            'category' => ['required'],
            'seo_title' =>  ['nullable' , 'string' , 'max:255'],
            'seo_description' => ['nullable' , 'string' , 'max:200'],
        ]);

        $imagePath = $this->uploadImage($request, 'image' , 'uploads');

        $blog = new Blog();
        $blog->image = $imagePath;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);

        $blog->category_id = $request->category;
        $blog->description = $request->description;
        $blog->user_id = Auth::user()->id;
        $blog->seo_title = $request->seo_title;
        $blog->seo_description = $request->seo_description;

        $blog->status = $request->status;

        $blog->save();

        return redirect()->route('admin.blog.index')->with('success', 'Le blog a été créé avec succès.');
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
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::where('status',1)->get();
        return view('admin.blog.edit',compact('blog','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['nullable' , 'image' , 'max:3000'],
            'title' =>  ['required' , 'string' , 'max:255' , 'unique:blogs,title,'.$id],
            'description' => ['required' , 'string'],
            'category' => ['required'],
            'seo_title' =>  ['nullable' , 'string' , 'max:255'],
            'seo_description' => ['nullable' , 'string' , 'max:200'],
        ]);

        $blog = Blog::findOrFail($id);

        $imagePath = $this->updateImage($request, 'image' , 'uploads' , $blog->image);

        $blog->image =!empty($imagePath) ? $imagePath : $blog->image;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);

        $blog->category_id = $request->category;
        $blog->description = $request->description;
        $blog->user_id = Auth::user()->id;
        $blog->seo_title = $request->seo_title;
        $blog->seo_description = $request->seo_description;

        $blog->status = $request->status;

        $blog->save();

        return redirect()->route('admin.blog.index')->with('success', 'Le blog a été créé avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
