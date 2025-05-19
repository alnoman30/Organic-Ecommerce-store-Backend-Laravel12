<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPUnit\Framework\fileExists;

class ProductController extends Controller
{
    public function store(Request $request){
        $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:products,slug',
        'category_id' => 'required|exists:categories,id',
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        'images.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        'regular_price' => 'required|numeric',
        'sale_price' => 'nullable|numeric',
        'discount_percent' => 'nullable|integer|min:0|max:100',
        'quantity' => 'required|integer|min:0',
        'stock_status' => 'required|in:instock,outofstock',
        'featured' => 'required|boolean',
    ]);

        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->slug);
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->discount_percent = $request->discount_percent ?? 0;
        $product->quantity = $request->quantity;
        $product->stock_status = $request->stock_status;
        $product->featured = $request->featured;
        $current_timestamp = Carbon::now()->timestamp;

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName = $current_timestamp . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products/'), $imageName);
            $product->image = $imageName; 
        }

        $images = [];

        if($request->hasFile('images'))
        {
            foreach($request->file('images') as $image){
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/products/gallery/'), $imageName);
                $images[] = 'uploads/products/gallery/' . $imageName;
                
            }
        }


        $product->images = json_encode($images); // Stored as JSON array
        $product->save();

        return redirect()->route('admin.products');
    }
        public function edit(Request $request, $id){
        $categories = Category::all();

        $products = Product::findOrFail($id);

         
        return view('admin.edit-products', compact('products','categories'));
    }


        public function update(Request $request , $id){

        $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        'images.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        'regular_price' => 'required|numeric',
        'sale_price' => 'nullable|numeric',
        'discount_percent' => 'nullable|integer|min:0|max:100',
        'quantity' => 'required|integer|min:0',
        'stock_status' => 'required|in:instock,outofstock',
        'featured' => 'required|boolean',
        ]);

        $products = Product::findOrFail($id);

        $products->name = $request->name;
        $products->slug = Str::slug($request->slug);
        $products->category_id = $request->category_id;
        $products->description = $request->description;
        $products->regular_price = $request->regular_price;
        $products->sale_price = $request->sale_price;
        $products->discount_percent = $request->discount_percent ?? 0;
        $products->quantity = $request->quantity;
        $products->stock_status = $request->stock_status;
        $products->featured = $request->featured;

        if($request->hasFile('image')){

            $oldImage = public_path('uploads/products/' .$products->image);
            if(fileExists($oldImage)){
                unlink($oldImage);
            }

            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/products/'), $imageName);

            $products->image = $imageName;

        }
        // ✅ Replace gallery images completely
    if ($request->hasFile('images')) {
        // Delete old gallery images
        $oldGalleryImages = json_decode($products->images, true);
        if ($oldGalleryImages) {
            foreach ($oldGalleryImages as $oldImagePath) {
                $oldImage = public_path($oldImagePath);
                if (file_exists($oldImage)) {
                    unlink($oldImage); // Delete old images from server
                }
            }
        }

        // Upload new gallery images
        $newGalleryImages = [];
        foreach ($request->file('images') as $image) {
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products/gallery/'), $imageName);
            $newGalleryImages[] = 'uploads/products/gallery/' . $imageName;
        }

        // Replace the old gallery images in the database with new ones
        $products->images = json_encode($newGalleryImages);
    }

    $products->save();


        return redirect()->route('admin.products')->with('success', 'Product item updated successfully!')->withErrors('error', 'something wrong');
    }

        public function destroy($id)
        {
            $product = Product::findOrFail($id);

            // Delete the main product image
            $imagePath = public_path('uploads/products/' . $product->image);
            if (file_exists($imagePath)) {
                @unlink($imagePath);
            }

            // Delete gallery images if they exist
            $galleryImages = json_decode($product->images, true);
            if (is_array($galleryImages)) {
                foreach ($galleryImages as $image) {
                    $galleryImagePath = public_path($image);
                    if (file_exists($galleryImagePath)) {
                        @unlink($galleryImagePath);
                    }
                }
            }

            $product->delete();

            return redirect()->route('admin.products')->with('success', 'Product item deleted successfully!');
        }

}
