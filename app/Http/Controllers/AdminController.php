<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function categories(){
      $categories = Category::paginate(10);
    return view('admin.categories', compact('categories'));
   }

   public function add_categories(){

    return view('admin.add-categories');
   }

   public function products(){
      $products = Product::paginate(10);
    return view('admin.products', compact('products'));
   }

   public function add_products(){
      $categories = Category::all();
    return view('admin.add-products', compact('categories'));
   }
    public function orders(){
    return view('admin.orders');
   }
    public function order_tracking(){
    return view('admin.order-tracking');
   }
    public function order_details(){
    return view('admin.order-details');
   }
    public function blogs(){
   $items = Blog::with('blog_category')->latest()->paginate(10);

    return view('admin.blogs', compact('items'));
   }
    public function add_blogs(){
   $categories = BlogCategory::all();
    return view('admin.add-blogs', compact('categories'));
   }
    public function all_blog_categories(){
         $categories = BlogCategory::withCount('blogs')->paginate(10);
         return view('admin.blog-categories', compact('categories'));
   }
       public function add_blog_categories(){
    return view('admin.add-blog-categories');
   }
    public function slider(){
    return view('admin.slider');
   }
    public function add_sliders(){
    return view('admin.add-slider');
   }
    public function coupons(){
    return view('admin.coupons');
   }
    public function add_coupons(){
    return view('admin.add-coupons');
   }
    public function users(){
      $users = User::all();
    return view('admin.users', compact('users'));
   }
   public function settings(){
    return view('admin.settings');
   }
   // INBOX MESSAGES
   public function inbox(){
    $messages = ContactMessage::latest()->get();
    return view('admin.inbox', compact('messages'));
   }
   public function markAsRead($id){
        $message = ContactMessage::findOrFail($id);
        $message->is_read = true;
        $message->save();

    return redirect()->back();
   }
   public function message_show($id){
      $message = ContactMessage::findOrFail($id);

      return view('admin.inbox-view', compact('message'));
   }
   // INBOX MESSAGES
}
