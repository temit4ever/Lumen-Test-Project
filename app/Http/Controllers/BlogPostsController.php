<?php


namespace App\Http\Controllers;


use App\BlogPost;
use Illuminate\Http\Request;


class BlogPostsController extends Controller {

    //Create blog post
    public function createBlogPosts(Request $request) {
        $blog_posts = BlogPost::create($request->all());
        return response()->json($blog_posts);
    }

    //Update blog post
    public function updateBlogPosts(Request $request, $id) {

        $blog_posts = BlogPost::find($id);
        $blog_posts->title = $request->input('title');
        $blog_posts->body = $request->input('body');
        $blog_posts->view = $request->input('views');
        $blog_posts->saved();

        return response()->json($blog_posts);
    }

    //View Blog post
    public function viewBlogPosts($id) {
        $blog_posts = BlogPost::find($id);
        return response()->json($blog_posts);
    }

    //Delete Blog post
    public function deleteBlogPosts($id) {
        $blog_posts = BlogPost::find($id);
        $blog_posts->delete();
        return response()->json('Blog removed successfully');
    }

    // List blog post
    public function index() {
        $blog_posts = BlogPost::all();
        return response()->json($blog_posts);
    }
}
