<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;


use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct()
    {
        $setting = Setting::first();
        view()->share('setting',$setting);
        $categories = Category::all();
        view()->share('categories',$categories);
        $products = Product::all();
        view()->share('products',$products);
    }
    

    public function index()
    {
        return view('site.index');
    }
    public function shop()
    {
        return view('site.shop');
    }
    public function cart() 
    {
        return view('site.cart');
    }
    public function blog()
    {
        return view('site.blog');
    }
    public function blogdetail()
    {
        return view('site.blogdetail');
    }
    public function contact()
    {   
        return view('site.contact');
    }
    public function  about()
    {   
        return view('site.about');
    }
    
    

}

