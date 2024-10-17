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
        view()->share('setting', $setting);
        $categories = Category::all();
        view()->share('categories', $categories);
        $products = Product::all();
        view()->share('products', $products);
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

    public function about()
    {   
        return view('site.about');
    }

    public function productDetail($category, $slug)
    {  
        $product = Product::where('slug', $slug)->firstOrFail();
        return view('site.productdetail', compact('product'));
    }
    

    public function categoryslug($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if (!$category) {
            abort(404);
        }
        return view('site.shop', compact('category'));
    }
    public function showProductsByCategory($id)
{
    $category = Category::with('products')->findOrFail($id);
    $products = $category->products;

    return view('product.category', compact('category', 'products'));
}

}
