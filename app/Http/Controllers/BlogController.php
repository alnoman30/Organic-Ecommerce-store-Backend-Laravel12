<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPUnit\Framework\fileExists;

class BlogController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'title' => 'required|string|max:100',
            'slug' => 'required|string|max:100|unique:blogs,slug',
            'description' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg,svg',
            'blog_category_id' => 'required'
        ]);

        $items = new Blog();

        $items->title = $request->title;
        $items->description = $request->description;
        $items->slug = Str::slug($request->slug);
        $items->blog_category_id = $request->blog_category_id;

         if($request->hasFile('image')){
            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/blogs/'), $imageName);

            $items->image = $imageName;

        }

            try {
            $items->save();
            return redirect()->route('admin.blogs')->with('success', 'Blog created successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while saving the blog.'])->withInput();
        }

    }

        public function edit(Request $request, $id){
        $categories = BlogCategory::all();
        $items = Blog::findOrFail($id);

         
        return view('admin.eidt-blogs', compact('items', 'categories'));
    }


    public function update(Request $request , $id){

        $request->validate([
            'title' => 'string|max:100',
            'image' => 'image|mimes:png,jpg,jpeg,svg'
        ]);

        $items = Blog::findOrFail($id);

        $items->title = $request->title;
        $items->description = $request->description;
        $items->slug = Str::slug($request->title);
        $items->blog_category_id = $request->blog_category_id;

        if($request->hasFile('image')){

            $oldImage = public_path('uploads/blogs/' .$items->image);
            if(fileExists($oldImage)){
                unlink($oldImage);
            }

            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/blogs/'), $imageName);

            $items->image = $imageName;

        }

        $items->save();


        return redirect()->route('admin.blogs')->with('success', 'Blog item updated successfully!');
    }

    public function destroy(Request $request, $id){

        $items = Blog::findOrFail($id);

        $imagePath = public_path('uploads/blogs/' .$items->image);
        if(fileExists($imagePath)){
            unlink($imagePath);
        }
        $items->delete();
        return redirect()->route('admin.blogs')->with('success', 'Blog item deleted successfully!');

    }
}
