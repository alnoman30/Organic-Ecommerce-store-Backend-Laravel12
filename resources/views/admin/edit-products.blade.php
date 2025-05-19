@extends('layouts.panel')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Edit Product</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('admin.products') }}"><div class="text-tiny">Products</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Edit product</div></li>
            </ul>
        </div>

        <!-- form-add-product -->
<form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data" action="{{ route('admin.products.update', $products->id) }}">
    @csrf
    @method('PUT')
    <div class="wg-box">
        <!-- Product Name -->
        <fieldset class="name">
            <div class="body-title mb-10">Product name <span class="tf-color-1">*</span></div>
            <input type="text" name="name" value="{{ old('name', $products->name) }}" placeholder="Enter product name" required>
            @error('name')
            <p style="color: red;">{{ $message}}</p>
                
            @enderror
        </fieldset>

        <!-- Slug -->
        <fieldset class="name">
            <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
            <input type="text" name="slug" value="{{ old('slug', $products->slug) }}" placeholder="Enter product slug" required>
            @error('slug')
            <p style="color: red;">{{ $message}}</p>
                
            @enderror
        </fieldset>

        <!-- Category -->
        <fieldset class="category">
            <div class="body-title mb-10">Category <span class="tf-color-1">*</span></div>
            <div class="select">
                <select name="category_id" required>
                    <option value="">Choose category</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $products->category_id) == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
                @error('category')
               <p style="color: red;">{{ $message}}</p>
                @enderror
            </div>
        </fieldset>

        <!-- Description -->
        <fieldset class="description">
            <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
            <textarea name="description" placeholder="Description" required>{{ old('description', $products->description) }}</textarea>
        </fieldset>
        @error('description')
        <p style="color: red;">{{ $message}}</p>
        @enderror
    </div>

    <!-- Image Upload -->
    <div class="wg-box">
            <fieldset>
                <div class="body-title">Upload image <span class="tf-color-1">*</span></div>
                <div class="upload-image flex-grow">
                    <div id="upload-file" class="item up-load">
                        <label class="uploadfile" for="myFile">
                            <span class="icon"><i class="icon-upload-cloud"></i></span>
                            <span class="body-text">Drop your images here or <span class="tf-color">click to browse</span></span>
                            <input type="file" id="myFile" name="image" accept="image/*"  onchange="previewMainImage(event)">
                        </label>
                        @error('images')
                            <p>{{ $message}}</p>
                        @enderror
                    </div>
                    <!-- Preview for main image -->
                    <div id="main-image-preview" class="preview-container mt-10" style="display: none;">
                        <img id="main-image" src="{{ old('image', $products->image ? asset('uploads/products/' . $products->image) : '') }}" alt="Main image preview" style="max-width: 200px; max-height: 200px;">
                    </div>
                </div>
            </fieldset>
    
            <fieldset>
                <div class="body-title mb-10">Upload Gallery Images</div>
                <div class="upload-image mb-16">
                    <div id="galUpload" class="item up-load">
                        <label class="uploadfile" for="gFile">
                            <span class="icon"><i class="icon-upload-cloud"></i></span>
                            <span class="text-tiny">Drop your images here or <span class="tf-color">click to browse</span></span>
                            <input type="file" id="gFile" name="images[]" accept="image/*" multiple onchange="previewGalleryImages(event)">
                        </label>
                        @error('images')
                            <p>{{ $message}}</p>
                        @enderror
                    </div>
                    <!-- Preview for gallery images -->
                    <div id="gallery-image-preview" class="preview-container mt-10">
                        <!-- Gallery previews will be shown here -->
                    </div>
                </div>
            </fieldset>

        <!-- Price Fields -->
        <div class="cols gap22">
            <fieldset class="name">
                <div class="body-title mb-10">Regular Price <span class="tf-color-1">*</span></div>
                <input type="text" name="regular_price" value="{{ old('regular_price', $products->regular_price) }}" placeholder="Enter regular price" required>
        @error('regular_price')
        <p style="color: red;">{{ $message}}</p>
        @enderror
            </fieldset>

            <fieldset class="name">
                <div class="body-title mb-10">Sale Price</div>
                <input type="text" name="sale_price" value="{{ old('sale_price', $products->sale_price) }}" placeholder="Enter sale price">
            </fieldset>
            @error('sale_price')
            <p style="color: red;">{{ $message}}</p>
                
            @enderror
        </div>

        <!-- Discount Percent -->
        <fieldset class="name">
            <div class="body-title mb-10">Discount (%)</div>
            <input type="number" name="discount_percent" value="{{ old('discount_percent', $products->discount_percent) }}" placeholder="Enter discount percent (optional)" min="0" max="100">
            @error('discount_percent')
            <p style="color: red;">{{ $message}}</p>
                
            @enderror
        </fieldset>

        <!-- Quantity -->
        <fieldset class="name">
            <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span></div>
            <input type="number" name="quantity" value="{{ old('quantity', $products->quantity) }}" placeholder="Enter quantity" required>
            @error('quantity')
            <p style="color: red;">{{ $message}}</p>
                
            @enderror
        </fieldset>

        <!-- Stock & Featured -->
        <div class="cols gap22">
            <fieldset class="name">
                <div class="body-title mb-10">Stock</div>
                <div class="select">
                    <select name="stock_status">
                        <option value="instock" {{ old('stock_status', $products->stock_status) == 'instock' ? 'selected' : '' }}>In Stock</option>
                        <option value="outofstock" {{ old('stock_status', $products->stock_status) == 'outofstock' ? 'selected' : '' }}>Out of Stock</option>
                    </select>
                </div>
            </fieldset>
            <fieldset class="name">
                <div class="body-title mb-10">Featured</div>
                <div class="select">
                    <select name="featured">
                        <option value="0" {{ old('featured', $products->featured) == 0 ? 'selected' : '' }}>No</option>
                        <option value="1" {{ old('featured', $products->featured) == 1 ? 'selected' : '' }}>Yes</option>
                    </select>
                </div>
            </fieldset>
        </div>

        <!-- Submit Button -->
        <div class="cols gap10">
            <button class="tf-button w-full" type="submit">Update Product</button>
        </div>
    </div>
</form>

        <!-- /form-add-product -->
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Main image preview function
    function previewMainImage(event) {
        const mainImagePreview = document.getElementById('main-image-preview');
        const mainImage = document.getElementById('main-image');

        const file = event.target.files[0]; // Get the file
        if (file) {
            const reader = new FileReader();

            // Set up the reader to display the image when it's loaded
            reader.onload = function (e) {
                mainImage.src = e.target.result; // Set the image source to the file data
                mainImagePreview.style.display = 'block'; // Show the preview container
            };

            reader.readAsDataURL(file); // Read the file as a data URL
        }
    }

    // Gallery image preview function
    function previewGalleryImages(event) {
        const galleryPreviewContainer = document.getElementById('gallery-image-preview');
        galleryPreviewContainer.innerHTML = ''; // Clear any existing previews

        const files = event.target.files; // Get all selected files
        if (files.length > 0) {
            // Loop through each file and create an image preview
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                
                reader.onload = function (e) {
                    const img = document.createElement('img'); // Create an img element for each file
                    img.src = e.target.result; // Set the image source to the file data
                    img.style.maxWidth = '100px'; // Limit size of preview
                    img.style.marginRight = '10px'; // Add spacing between images
                    galleryPreviewContainer.appendChild(img); // Add the image to the preview container
                };

                reader.readAsDataURL(file); // Read the file as a data URL
            });
        }
    }
</script>
@endpush
