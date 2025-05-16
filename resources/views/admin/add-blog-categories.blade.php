@extends('layouts.panel')
@section('content')
                               <div class="main-content-inner">
                            <!-- main-content-wrap -->
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Blog Category infomation</h3>
                                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                                        <li>
                                            <a href="{{ route('dashboard')}}">
                                                <div class="text-tiny">Dashboard</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.all-blog-categories')}}">
                                                <div class="text-tiny">Blog Categories</div>
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icon-chevron-right"></i>
                                        </li>
                                        <li>
                                            <div class="text-tiny">New Blog Category</div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- new-category -->
                                <div class="wg-box">
                                    <form class="form-new-product form-style-1" action="{{ route('admin.blog-category.store')}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <fieldset class="name">
                                            <div class="body-title">Blog Category Name <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="flex-grow" type="text" placeholder="Category name" name="name"
                                                tabindex="0" value="{{ old('name') }}" aria-required="true" required="">
                                        </fieldset>
                                        <fieldset class="name">
                                            <div class="body-title">Blog Category Slug <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="flex-grow" type="text" placeholder="Category Slug" name="slug"
                                                tabindex="0" value="{{ old('slug') }}" aria-required="true" required="">
                                        </fieldset>
                                        <div class="bot">
                                            <div></div>
                                            <button class="tf-button w208" type="submit">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div> 
@endsection