@extends('layouts.panel')
@section('content')
<style>
    .is-invalid {
        border-color: red !important;
    }
    .text-danger {
        color: red;
        font-size: 0.875rem;
        margin-top: 4px;
    }
</style>
                               <div class="main-content-inner">
                            <!-- main-content-wrap -->
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Add Blog</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="{{route('dashboard')}}">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <a href="{{route('admin.blogs')}}">
                                                <div class="text-tiny">Blogs</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">New Blogs</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- new-category -->
                                <div class="wg-box">
                                <form class="form-new-product form-style-1" method="POST" action="{{ route('admin.add-blogs.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Title -->
                                    <fieldset class="name">
                                        <div class="body-title">Title <span class="tf-color-1">*</span></div>
                                        <input class="flex-grow @error('title') is-invalid @enderror" type="text" placeholder="Enter title" name="title" value="{{ old('title') }}" required>
                                        @error('title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </fieldset>

                                    <!-- Slug -->
                                    <fieldset class="slug">
                                        <div class="body-title">Slug <span class="tf-color-1">*</span></div>
                                        <input class="flex-grow @error('slug') is-invalid @enderror" type="text" placeholder="Enter slug" name="slug" value="{{ old('slug') }}" required>
                                        @error('slug')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </fieldset>

                                    <!-- Description -->
                                    <fieldset class="description">
                                        <div class="body-title">Description <span class="tf-color-1">*</span></div>
                                        <textarea class="flex-grow @error('description') is-invalid @enderror" placeholder="Enter description" name="description" required>{{ old('description') }}</textarea>
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </fieldset>

                                    <!-- Upload Image -->
                                    <fieldset>
                                        @error('image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <div class="body-title">Upload images <span class="tf-color-1">*</span></div>
                                        <div class="upload-image flex-grow">
                                            <div class="item" id="imgpreview" style="display: none">
                                                <img id="previewImage" class="effect8" alt="Image preview">
                                            </div>
                                            <div id="upload-file" class="item up-load">
                                                <label class="uploadfile" for="myFile">
                                                    <span class="icon">
                                                        <i class="icon-upload-cloud"></i>
                                                    </span>
                                                    <span class="body-text">Drop your images here or select 
                                                        <span class="tf-color">click to browse</span>
                                                    </span>
                                                    <input type="file" id="myFile" name="image" accept="image/*" onchange="showPreview(event);">
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <!-- Choose Category -->
                                    <fieldset class="category">
                                        <div class="body-title">Choose category <span class="tf-color-1">*</span></div>
                                        <div class="select flex-grow">
                                            <select name="blog_category_id" class=" @error('blog_category_id') is-invalid @enderror" required>
                                                <option value="">Select category</option>
                                                @foreach ($categories as $cat)
                                                    <option value="{{ $cat->id }}" 
                                                        {{ (old('blog_category_id', $selectedCategoryId ?? '') == $cat->id) ? 'selected' : '' }}>
                                                        {{ $cat->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('blog_category_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </fieldset>

                                    <!-- Submit Button -->
                                    <div class="bot">
                                        <div></div>
                                        <button class="tf-button w208" type="submit">Save</button>
                                    </div>
                                </form>


                                </div>
                                <!-- /new-category -->
                            </div> 
@endsection

@push('scripts')
<script>
    // Image preview
    function showPreview(event) {
        const previewContainer = document.getElementById('imgpreview');
        const previewImage = document.getElementById('previewImage');

        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.style.display = 'block';
            };

            reader.readAsDataURL(file);
        } else {
            previewImage.src = '';
            previewContainer.style.display = 'none';
        }
    }
</script>
@endpush
