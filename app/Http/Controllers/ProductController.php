<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
}
