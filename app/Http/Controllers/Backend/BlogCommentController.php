<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\BlogCommentDataTable;
use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    function index(BlogCommentDataTable $datatable)
    {
        return $datatable->render('admin.blog.blog-comment.index');
    }

    function destroy(string $id)
    {
        try {
            $category = BlogComment::findOrFail($id);
            $category->delete();
    
            return response(['status' => 'success', 'message' => 'Comment deleted successfully']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
