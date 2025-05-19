@extends('layouts.panel')
@section('content')
                                <div class="main-content-inner">
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Blogs</h3>
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
                                            <div class="text-tiny">Blogs</div>
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
                                        <a class="tf-button style-1 w208" href="{{ route('admin.add-blogs')}}"><i
                                                class="icon-plus"></i>Add new</a>
                                    </div>
                                    <div class="wg-table table-all-user">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Slug</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ( $items as $item )
                                                <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td class="pname">
                                                    <div class="image">
                                                        <img src="{{ asset('uploads/blogs/' . $item->image) }}" alt="{{ $item->title }}" class="image" style="width: 50px; height: auto;">
                                                    </div>
                                                    <div class="name">
                                                        <a href="#" class="body-title-2">{{ Str::limit(strip_tags($item->title), 30, '...') }}</a>
                                                    </div>
                                                </td>
                                                <td>{{ Str::limit(strip_tags($item->description), 50, '...') }}</td>
                                                <td>{{ $item->slug}}</td>
                                                <td>{{ $item->blog_category->name ?? 'No Category' }}</td> <!-- Example created at date -->
                                                <td>
                                                    <div class="list-icon-function d-flex">
                                                        <a href="{{ route('admin.add-blogs.edit', $item->id )}}" title="Edit">
                                                            <div class="item edit">
                                                                <i class="icon-edit-3"></i>
                                                            </div>
                                                        </a>
                                                        <form action="{{ route('admin.add-blogs.delete', $item->id )}}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="item text-danger delete" title="Delete" style="background: none; border: none; padding: 0;">
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
                                        {{ $items->links() }}
                                    </div>
                                    </div>
                                    <div class="divider"></div>
                                    <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">

                                    </div>
                                </div>
                            </div>
                        </div>
@endsection