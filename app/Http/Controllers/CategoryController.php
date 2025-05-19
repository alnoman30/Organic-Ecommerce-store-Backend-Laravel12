<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPUnit\Framework\fileExists;

class CategoryController extends Controller
{
    public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|unique:categories,slug',
                'image' => 'required|image|mimes:png,jpg,svg,jpeg',
            ]);

            $categories = new Category();

            $categories->name = $request->name;
            $categories->slug = Str::slug($request->slug);

            if($request->hasFile('image')){
                $image = $request->file('image');

                $imageName = time() . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('uploads/categories/'), $imageName);

                $categories->image = $imageName;

            }

                try {
                $categories->save();
                return redirect()->route('admin.categories')->with('success', 'Category created successfully!');
            } catch (\Exception $e) {
                return back()->withErrors(['error' => 'An error occurred while saving the Category.'])->withInput();
            }
}
        public function edit(Request $request, $id){
        $categories = Category::findOrFail($id);

         
        return view('admin.edit-categories', compact('categories'));
    }


    public function update(Request $request , $id){

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required',
            'image' => 'required|image|mimes:png,jpg,svg,jpeg',
        ]);

        $categories = Category::findOrFail($id);

        $categories->name = $request->name;
        $categories->slug = Str::slug($request->slug);

        if($request->hasFile('image')){

            $oldImage = public_path('uploads/categories/' .$categories->image);
            if(fileExists($oldImage)){
                unlink($oldImage);
            }

            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/categories/'), $imageName);

            $categories->image = $imageName;

        }

        $categories->save();


        return redirect()->route('admin.categories')->with('success', 'Category item updated successfully!');
    }

    public function destroy($id){

        $categories = Category::findOrFail($id);

        $imagePath = public_path('uploads/categories/' .$categories->image);
        if(fileExists($imagePath)){
            unlink($imagePath);
        }
        $categories->delete();
        return redirect()->route('admin.categories')->with('success', 'Category item deleted successfully!');

    }


}
