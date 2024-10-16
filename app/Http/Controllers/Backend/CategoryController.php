<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\DataTables\CategoryDataTable;
use App\Http\Requests\Admin\CategoryCreateRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;
use App\Traits\FileUploadTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class CategoryController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    { 
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request)
    {
        // Gérer l'upload de l'image
        $imagePath = $this->uploadImage($request, 'image');
    
        // Créer une nouvelle instance de Category
        $category = new Category();
        
        // Assigner les valeurs du formulaire à l'objet Category
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->status = $request->input('status'); // Prendre la valeur du select
        $category->image = $imagePath; // Assigner le chemin de l'image
    
        // Sauvegarder la catégorie dans la base de données
        $category->save();
    
        // Rediriger avec un message de succès
        return to_route('admin.category.index')->with('success', 'Category created successfully.');
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
    public function edit(string $id) :  View
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $id) : RedirectResponse
    {
        /*Handle Upload*/
        $category = Category::findOrFail($id);
        $imagePath = $this->uploadImage($request, 'image', $category->image);

        // Assigner les valeurs du formulaire à l'objet Category
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->status = $request->input('status'); // Prendre la valeur du select
        $category->image = !empty($imagePath) ? $imagePath : $category->image; // Assigner le chemin de l'image
    
        // Sauvegarder la catégorie dans la base de données
        $category->save();

        //toastr()->success('Updated Successfully');
        
        return to_route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
