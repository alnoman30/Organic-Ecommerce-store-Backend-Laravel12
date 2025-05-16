<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            BlogCategory::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);

            flash()->success('Blog category created');
            return redirect()->route('admin.all-blog-categories');
        }
        public function edit($id){

            $category = BlogCategory::findOrFail($id);
            return view('admin.edit-blog-categories', compact('category'));
        }

        public function update(Request $request, $id)
            {
                $request->validate([
                    'name' => 'required|string|max:255',
                ]);

                $category = BlogCategory::findOrFail($id);

                // Update the category data
                $category->name = $request->name;
                $category->slug = Str::slug($request->name);  // Optional: regenerate slug

                // Save the updated category
                $category->save();

               
                return redirect()->route('admin.all-blog-categories');
}

        public function destroy($id){

            $category = BlogCategory::findOrFail($id);
            $category->delete();

            flash()->success('Blog category has been deleted!');
            return redirect()->route('admin.all-blog-categories');
        }
}
