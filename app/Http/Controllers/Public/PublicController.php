<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->where('status', 1)->get();
        $posts_limit3 = Post::orderBy('id', 'DESC')->where('status', 1)->limit(3)->get();
        $posts_limit4 = Post::orderBy('id', 'DESC')->where('status', 1)->limit(4)->get();
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('public.index', compact('posts', 'posts_limit3', 'posts_limit4', 'categories'));
    }

    public function post($slug)
    {
        if (!$post = Post::where('slug', $slug)->where('status', 1)->first())
            return redirect()->route('public.index');

        return view('public.post', compact('post'));
    }

    public function blog()
    {
        $posts = Post::orderBy('id', 'DESC')->where('status', 1)->paginate(5);
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('public.blog', compact('posts','categories'));
    }

    public function category($name)
    {
        if (!$category = Category::where('name', $name)->first())
            return redirect()->route('public.index');

            $posts = Post::where('category_id', $category->id)->get();
            $categories = Category::orderBy('id', 'DESC')->get();

        return view('public.category', compact('category','posts','categories'));
    }

}
