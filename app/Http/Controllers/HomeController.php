<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function registerPage(){
        return view('pages.register');
    }

    public function loginPage(){
        return view('pages.login');
    }

    public function dashboard(){
        if(Auth::id()){

            $userRole = Auth::user()->role;
            if($userRole == UserRole::Admin){

                return view('admin.dashboard');
            }
            elseif($userRole == UserRole::User){
                return view('user.dashboard');
            }
            else
            return redirect()->route('home');
        }
    }


    public function index(){
        $items = Blog::with('blog_category')->latest()->take(3)->get();
        $categories = Category::all();
        $featuredProducts = Product::where('featured', true)->get();
        $justArrivedProducts = Product::where('created_at', '>=', Carbon::now()->subDays(30))->get();
        return view('pages.index', compact('items', 'categories', 'featuredProducts','justArrivedProducts'));
    }
    public function blogPage(){
        $items = Blog::with('blog_category')->latest()->paginate(6);;
        return view('pages.blog', compact('items'));
    }
    public function blogDetailsPage($slug){
        $items = Blog::where('slug', $slug)->firstOrFail();
        return view('pages.blog-details', compact('items'));
    }
    public function shopPage(){

        $products = Product::paginate(12);
        $categories = Category::all();
        return view('pages.shop', compact('products','categories'));
    }

    public function aboutUsPage(){
        return view('pages.about-us');
    }
    public function contactUsPage(){
        return view('pages.contact-us');
    }

    
}
