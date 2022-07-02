<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::with('post')->orderBy('id', 'DESC')->get();
        return view('admin.category.index', compact('data'));
    }

    public function store(Request $request)
    {

        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'name' => 'required|string|max:255|min:4',
                'description' => 'required|string|max:150|min:4',
                'image' => 'nullable|image',
            ]);

            $imageUpload = $request->file('image')->store('posts');

            $data = $request->all();
            $data['image'] = $imageUpload;

            if (Category::create($data)) {
                return redirect()->route('admin.category.index')->withSuccess('Categoria criada com sucesso');
            }
        }

        return view('admin.category.store');
    }

    public function edit($id)
    {
        if (!$category = Category::find($id))
            return redirect()->route('admin.category.index');

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {

        if (!$category = Category::find($id))
            return redirect()->route('admin.category.index');

        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'name' => 'required|string|max:255|min:4',
                'description' => 'required|string|max:150|min:4',
                'image' => 'nullable|image',
            ]);

            $data = $request->all();

            if ($request->file('image')) {

                if (Storage::exists($category->image)) {
                    Storage::delete($category->image);
                }

                $imageUpload = $request->file('image')->store('category');
                $data['image'] = $imageUpload;
            }

            $category->update($data);
            return back()->withSuccess('Categoria editada com sucesso');
        }
    }

    public function destroy($id)
    {
        if (!$category = Category::find($id))
            return redirect()->route('admin.category.index');

        if (!$category->verify_post_category($id)) {

            if (Storage::exists($category->image)) {
                Storage::delete($category->image);
            }
            $category->delete();
            return back()->withSuccess('Categoria excluída com sucesso');

        } else {
            return back()->withErrors('Categoria não foi excluída devido está vinculada algum post');
        }

    }
}
