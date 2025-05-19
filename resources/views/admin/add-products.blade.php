@extends('layouts.panel')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Add Product</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="{{ route('dashboard') }}"><div class="text-tiny">Dashboard</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="{{ route('admin.products') }}"><div class="text-tiny">Products</div></a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><div class="text-tiny">Add product</div></li>
            </ul>
        </div>

        <!-- form-add-product -->
        <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data" action="{{ route('admin.products.store')}}">
            @csrf

            <div class="wg-box">
                <!-- Product Name -->
                <fieldset class="name">
                    <div class="body-title mb-10">Product name <span class="tf-color-1">*</span></div>
                    <input type="text" name="name" placeholder="Enter product name" required>
                </fieldset>

                <!-- Slug -->
                <fieldset class="name">
                    <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                    <input type="text" name="slug" placeholder="Enter product slug" required>
                </fieldset>

                <!-- Category -->
                <fieldset class="category">
                    <div class="body-title mb-10">Category <span class="tf-color-1">*</span></div>
                    <div class="select">
                        <select name="category_id" required>
                            <option value="">Choose category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </fieldset>

                <!-- Description -->
                <fieldset class="description">
                    <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
                    <textarea name="description" placeholder="Description" required></textarea>
                </fieldset>
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
                            <input type="file" id="myFile" name="image" accept="image/*" required onchange="previewMainImage(event)">
                        </label>
                    </div>
                    <!-- Preview for main image -->
                    <div id="main-image-preview" class="preview-container mt-10" style="display: none;">
                        <img id="main-image" src="" alt="Main image preview" style="max-width: 200px; max-height: 200px;">
                    </div>
                </div>
            </fieldset>

                <!-- Gallery Images -->
            <fieldset>
                <div class="body-title mb-10">Upload Gallery Images</div>
                <div class="upload-image mb-16">
                    <div id="galUpload" class="item up-load">
                        <label class="uploadfile" for="gFile">
                            <span class="icon"><i class="icon-upload-cloud"></i></span>
                            <span class="text-tiny">Drop your images here or <span class="tf-color">click to browse</span></span>
                            <input type="file" id="gFile" name="images[]" accept="image/*" multiple onchange="previewGalleryImages(event)">
                        </label>
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
                        <input type="text" name="regular_price" placeholder="Enter regular price" required>
                    </fieldset>

                    <fieldset class="name">
                        <div class="body-title mb-10">Sale Price</div>
                        <input type="text" name="sale_price" placeholder="Enter sale price">
                    </fieldset>
                </div>

                <!-- Discount Percent -->
                <fieldset class="name">
                    <div class="body-title mb-10">Discount (%)</div>
                    <input type="number" name="discount_percent" placeholder="Enter discount percent (optional)" min="0" max="100">
                </fieldset>

                <!-- Quantity -->
                <fieldset class="name">
                    <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span></div>
                    <input type="number" name="quantity" placeholder="Enter quantity" required>
                </fieldset>

                <!-- Stock & Featured -->
                <div class="cols gap22">
                    <fieldset class="name">
                        <div class="body-title mb-10">Stock</div>
                        <div class="select">
                            <select name="stock_status">
                                <option value="instock">In Stock</option>
                                <option value="outofstock">Out of Stock</option>
                            </select>
                        </div>
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">Featured</div>
                        <div class="select">
                            <select name="featured">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </fieldset>
                </div>

                <!-- Submit Button -->
                <div class="cols gap10">
                    <button class="tf-button w-full" type="submit">Add Product</button>
                </div>
            </div>
        </form>
        <!-- /form-add-product -->
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Preview for the main image
    function previewMainImage(event) {
        const previewContainer = document.getElementById('main-image-preview');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const img = document.getElementById('main-image');
            img.src = e.target.result;
            previewContainer.style.display = 'block';
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    // Preview for gallery images
    function previewGalleryImages(event) {
        const previewContainer = document.getElementById('gallery-image-preview');
        previewContainer.innerHTML = '';  // Clear previous previews

        const files = event.target.files;
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '100px';
                img.style.maxHeight = '100px';
                img.style.margin = '5px';
                previewContainer.appendChild(img);
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    }
</script>
@endpush
