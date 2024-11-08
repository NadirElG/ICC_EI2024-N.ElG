<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogDetails(string  $slug)
    {
        $blog = Blog::with(['comments'])->where('slug', $slug)->where('status',1)->firstOrFail();
        $moreBlogs = Blog::where('slug', '!=' , $slug)->where('status', 1)->orderBy('id', 'DESC')->take(15)->get();
        $comments = $blog->comments()->paginate(20);
        return  view('frontend.home.pages.blog-details', compact('blog' , 'moreBlogs' , 'comments'));
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
