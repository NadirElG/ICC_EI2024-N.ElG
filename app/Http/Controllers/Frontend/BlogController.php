<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(Request $request) 
    {
        // Vérifier si une recherche par titre ou catégorie est demandée
        $query = Blog::query()->where('status', 1);

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->has('category')) {
            // Récupérer l'ID de la catégorie à partir du slug
            $category = BlogCategory::where('slug', $request->category)->first();
            
            // Si la catégorie existe, filtrer les blogs
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // Exécuter la requête et paginer les résultats
        $blogs = $query->orderBy('id', 'DESC')->paginate(12);

        return view('frontend.home.pages.blog', compact('blogs'));
    }

    public function blogDetails(string $slug)
    {
        $blog = Blog::with(['comments'])->where('slug', $slug)->where('status', 1)->firstOrFail();
        $moreBlogs = Blog::where('slug', '!=', $slug)->where('status', 1)->orderBy('id', 'DESC')->take(15)->get();
        $comments = $blog->comments()->paginate(20);
        $categories = BlogCategory::where('status', 1)->get();
    
        // Récupère les articles les plus récents pour la section "Recent Post"
        $recentBlogs = Blog::where('status', 1)->orderBy('created_at', 'DESC')->take(5)->get();
    
        return view('frontend.home.pages.blog-details', compact('blog', 'moreBlogs', 'comments', 'categories', 'recentBlogs'));
    }
    

    public function comment(Request $request)
    {
        $request->validate([
            'comment' => ['required', 'max:1000']
        ]);

        $comment = new BlogComment();
        $comment->blog_id = $request->blog_id;
        $comment->user_id = auth()->user()->id;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->back()->with('success', 'Comment Added Successfully');
    }

}
