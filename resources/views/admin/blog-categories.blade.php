@extends('layouts.panel')
@section('content')
                                <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Blog Categories</h3>
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
                                            <div class="text-tiny">Blog Categories</div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="wg-box">
                                    <div class="flex items-center justify-between gap10 flex-wrap">
                                        <div class="wg-filter flex-grow">
                                            <form class="form-search">
                                                <fieldset class="name">
                                                    <input type="text" placeholder="Search here..." class="" name="name"
                                                        tabindex="2" value="" aria-required="true" required="">
                                                </fieldset>
                                                <div class="button-submit">
                                                    <button class="" type="submit"><i class="icon-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                        <a class="tf-button style-1 w208" href="{{ route('admin.add-blog-categories')}}"><i
                                                class="icon-plus"></i>Add new</a>
                                    </div>
                                    <div class="wg-table table-all-user">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Slug</th>
                                                    <th>Total Blogs</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ( $categories as $category )
                                                    <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="pname">
                                                        <div class="name">
                                                            <a href="#" class="body-title-2">{{ $category->name }}</a>
                                                        </div>
                                                    </td>
                                                    <td>{{ $category->slug}}</td>
                                                    <td><a href="#" target="_blank">{{ $category->blogs_count}}</a></td>
                                                    <td>
                                                        <div class="list-icon-function">
                                                            <a href="{{ route('admin.blog-category.edit', $category->id )}}">
                                                                <div class="item edit">
                                                                    <i class="icon-edit-3"></i>
                                                                </div>
                                                            </a>
                                                            <form action="{{ route('admin.blog-category.delete', $category->id )}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn item text-danger delete" style="border: none; background: none; padding: 0;">
                                                                    <i class="icon-trash-2"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        <div class="mt-4">
                                        {{ $categories->links() }}
                                        </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

                                    </div>
                                </div>
                            </div>
@endsection