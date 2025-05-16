<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

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
        return view('pages.index', compact('items', 'categories'));
    }
    public function blogPage(){
        $items = Blog::with('blog_category')->latest()->paginate(6);;
        return view('pages.blog', compact('items'));
    }
    public function blogDetailsPage($slug){
        $items = Blog::where('slug', $slug)->firstOrFail();
        return view('pages.blog-details', compact('items'));
    }

    public function registerPage(){
        return view('pages.register');
    }

    public function loginPage(){
        return view('pages.login');
    }
    
}
