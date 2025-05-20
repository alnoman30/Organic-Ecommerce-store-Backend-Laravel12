<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

    // Home pages
Route::get('/', [HomeController::class, 'index' ])->name('home');
Route::get('/create-account', [HomeController::class, 'registerPage' ])->name('registerPage');
Route::get('/login', [HomeController::class, 'loginPage' ])->name('login');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/blog', [HomeController::class, 'blogPage' ])->name('blog');
Route::get('/blog/{slug}', [HomeController::class, 'blogDetailsPage' ])->name('blog-details');
Route::get('/shop', [HomeController::class, 'shopPage' ])->name('shop');
Route::get('/about-us', [HomeController::class, 'aboutUsPage' ])->name('about-us');
Route::get('/contact-us', [HomeController::class, 'contactUsPage' ])->name('contact-us');
Route::post('/contact-submit', [ContactMessageController::class, 'messageSubmit' ])->name('messageSubmit');


// Authentication routes
Route::post('/user-create', [AuthController::class, 'register'])->name('user.register');
Route::post('/user-login', [AuthController::class, 'login'])->name('user.login');
Route::delete('/user-logout', [AuthController::class, 'logout'])->name('user.logout');


Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    // Categories
    Route::get('/categories', [AdminController::class, 'categories'])->name('categories');
    Route::get('/add-categories', [AdminController::class, 'add_categories'])->name('add-categories');
    Route::post('/add-categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/add-categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/add-categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');

    // Products
    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/add-products', [AdminController::class, 'add_products'])->name('add-products');
    Route::post('/add-products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/add-products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/add-products/update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/delete/{id}', [ProductController::class, 'destroy'])->name('products.delete');

    // Orders
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
    Route::get('/order-details', [AdminController::class, 'order_details'])->name('order-details');
    Route::get('/order-tracking', [AdminController::class, 'order_tracking'])->name('order-tracking');

    // Blog Categories
    Route::get('/blog-categories', [AdminController::class, 'all_blog_categories'])->name('all-blog-categories');
    Route::get('/add-blog-categories', [AdminController::class, 'add_blog_categories'])->name('add-blog-categories');
    Route::post('/blog-categories/store', [BlogCategoryController::class, 'store'])->name('blog-category.store');
    Route::get('/blog-categories/edit/{id}', [BlogCategoryController::class, 'edit'])->name('blog-category.edit');
    Route::put('/blog-categories/update/{id}', [BlogCategoryController::class, 'update'])->name('blog-category.update');
    Route::delete('/blog-categories/delete/{id}', [BlogCategoryController::class, 'destroy'])->name('blog-category.delete');

    // Blogs
    Route::get('/blogs', [AdminController::class, 'blogs'])->name('blogs');
    Route::get('/add-blogs', [AdminController::class, 'add_blogs'])->name('add-blogs');
    Route::post('/add-blogs/store', [BlogController::class, 'store'])->name('add-blogs.store');
    Route::get('/add-blogs/edit/{id}', [BlogController::class, 'edit'])->name('add-blogs.edit');
    Route::post('/add-blogs/update/{id}', [BlogController::class, 'update'])->name('add-blogs.update');
    Route::delete('/add-blogs/delete/{id}', [BlogController::class, 'destroy'])->name('add-blogs.delete');

    // Sliders
    Route::get('/sliders', [AdminController::class, 'slider'])->name('slider');
    Route::get('/add-sliders', [AdminController::class, 'add_sliders'])->name('add-sliders');

    // Coupons
    Route::get('/coupons', [AdminController::class, 'coupons'])->name('coupons');
    Route::get('/add-coupons', [AdminController::class, 'add_coupons'])->name('add-coupons');

    // Users and Settings
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');

    // Inbox messages
    Route::get('/messages', [AdminController::class, 'inbox'])->name('messages.index');
    Route::get('/messages/{id}', [AdminController::class, 'message_show'])->name('messages.show');
    Route::get('/admin/messages/read/{id}', [AdminController::class, 'markAsRead'])->name('inbox.read');

});
