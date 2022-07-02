<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        $data = Post::orderBy('id', 'DESC')->get();
        return view('admin.post.index', compact('data'));
    }

    public function store(Request $request)
    {

        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'title' => 'required|string|max:255|min:8',
                'description' => 'required|string|max:150|min:8',
                'slug' => 'required|string|max:255|min:8',
                'content' => 'required|string|min:8',
                'image' => 'required|image',
                'category_id' => 'required',
                'status' => 'required',
                'author_id' => 'required',
            ]);

            $imageUpload = $request->file('image')->store('posts');

            $data = $request->all();
            $data['image'] = $imageUpload;

            if (Post::create($data)) {
                return redirect()->route('admin.post.index')->withSuccess('Post realizado com sucesso');
            }
        }

        $category = Category::orderBy('name', 'ASC')->get();

        return view('admin.post.store', compact('category'));
    }

    public function edit($id)
    {
        if (!$post = Post::find($id))
            return redirect()->route('admin.post.index');

            $category = Category::all();

        return view('admin.post.edit', compact('post','category'));
    }

    public function update(Request $request, $id)
    {

        if (!$post = Post::find($id))
            return redirect()->route('admin.post.index');

        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'title' => 'required|string|max:255|min:8',
                'description' => 'required|string|max:150|min:8',
                'slug' => 'required|string|max:255|min:8',
                'content' => 'required|string|min:8',
                'image' => 'nullable|image',
                'category_id' => 'required',
                'status' => 'required',
            ]);

            $data = $request->all();

            if ($request->file('image')) {

                if (Storage::exists($post->image)) {
                    Storage::delete($post->image);
                }

                $imageUpload = $request->file('image')->store('posts');
                $data['image'] = $imageUpload;
            }

            $post->update($data);
            return back()->withSuccess('Post editado com sucesso');
        }
    }

    public function destroy($id)
    {
        if (!$post = Post::find($id))
            return redirect()->route('admin.post.index');

        if (Storage::exists($post->image)) {
            Storage::delete($post->image);
        }

        $post->delete();
        return back()->withSuccess('Post excluído com sucesso');
    }
}
