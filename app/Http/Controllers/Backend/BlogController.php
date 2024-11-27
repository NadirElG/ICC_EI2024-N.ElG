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
        $blog = Blog::findOrFail($id);
        $this->removeImage($blog->image);
        $blog->comments()->delete();
        $blog->delete();
        return response(['status' => 'success' , 'message' => 'Deleted Successfully']);
    }

    public function getBlogsForApi()
    {
        return response()->json(Blog::all(), 200);
    }

    public function getBlogForApiWithId($id)
    {
        $blog = Blog::find($id); // Trouver le blog correspondant à l'ID
        if (!$blog) {
            return response()->json(['message' => 'Blog not found'], 404); // Si l'ID n'existe pas
        }

        return response()->json($blog, 200); // Retourne le blog trouvé
    }

    public function storeBlogForApi(Request $request)
    {
        // Valider les données reçues
        $validated = $request->validate([
            'image' => ['required', 'string'],
            'title' => ['required', 'string', 'max:255', 'unique:blogs,title'],
            'description' => ['required', 'string'],
            'category' => ['required', 'exists:categories,id'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:200'],
            'status' => ['required', 'boolean'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        // Créer un nouvel objet Blog
        $blog = new Blog();
        $blog->image = $validated['image'];
        $blog->title = $validated['title'];
        $blog->slug = Str::slug($validated['title']);
        $blog->category_id = $validated['category'];
        $blog->description = $validated['description'];
        $blog->user_id = $validated['user_id'];
        $blog->seo_title = $validated['seo_title'];
        $blog->seo_description = $validated['seo_description'];
        $blog->status = $validated['status'];

        // Sauvegarder le blog
        $blog->save();

        // Retourner une réponse JSON
        return response()->json([
            'message' => 'Le blog a été créé avec succès.',
            'blog' => $blog,
        ], 201);
    }

    public function updateBlogForApi(Request $request, string $id)
    {
        // Valider uniquement le titre et la description
        $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:blogs,title,' . $id],
            'description' => ['required', 'string'],
        ]);
    
        // Trouver le blog par ID
        $blog = Blog::findOrFail($id);
    
        // Mettre à jour uniquement le titre et la description
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title); // Mettre à jour le slug avec le nouveau titre
        $blog->description = $request->description;
    
        // Sauvegarder les modifications
        $blog->save();
    
        // Retourner une réponse JSON confirmant les modifications
        return response()->json([
            'message' => 'Le blog a été mis à jour avec succès.',
            'blog' => $blog,
        ], 200);
    }

    public function deleteBlogForApi(string $id)
    {
        // Trouver le blog par ID
        $blog = Blog::findOrFail($id);

        // Supprimer le blog
        $blog->delete();

        // Retourner une réponse JSON
        return response()->json([
            'message' => 'Le blog a été supprimé avec succès.',
        ], 200);
    }

    
    
    




    
    
    
    




}
