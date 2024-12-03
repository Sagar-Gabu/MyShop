<?php

namespace App\Http\Controllers;
use App\Models\cart;
use Illuminate\Support\Facades\Auth;
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
    public function shop(Request $request)
    {
        $categorySlug = $request->query('category');
        $searchTerm = $request->query('search');

        $query = Product::query();


        if ($categorySlug) {
            $category = Category::where('slug', $categorySlug)->first();

            if ($category) {
                $query->where('category_id', $category->id);
            } else {

                $products = collect();
            }
        }
        if ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        $products = $query->get();
        $categories = Category::all();

        return view('site.shop', compact('products', 'categories'));
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
        $category = Category::with(['subCategories.products'])->findOrFail($id);

        // Get all products related to the category
        $products = $category->subCategories->flatMap(function ($subCategory) {
            return $subCategory->products;
        });

        // Redirect to the shop view and pass the filtered products
        return view('site.shop', compact('category', 'products'));
    }
    public function addcart(Request $request, $id = null)
{
    $product_id = $id;
    $user = Auth::user();
    $user_id = $user->id;

    // Get quantity from the form input, default to 1 if not provided
    $quantity = $request->input('quantity', 1);

    // Create a new Cart instance and save the data
    $data = new Cart();
    $data->user_id = $user_id;
    $data->product_id = $product_id;
    $data->quantity = $quantity;
    $data->save();

    return redirect()->back()->with('success', 'Product added to cart!');
}
public function showcart()
{
    $user = Auth::user(); // Get the logged-in user
    $cartItems = Cart::where('user_id', $user->id)->get(); // Get all cart items for the user

    // Pass the cart items to the view
    return view('cart', compact('cartItems'));
}

public function destroy($id)
{
    $user = Auth::user(); // Get the logged-in user
    $cartItem = Cart::where('user_id', $user->id)->where('id', $id)->first();

    if ($cartItem) {
        $cartItem->delete();
        return redirect()->route('site.cart')->with('success', 'Item removed from cart!');
    }

    return redirect()->route('site.cart')->with('error', 'Item not found in cart!');
}
public function update(Request $request, $id)
{
    $request->validate([
        'quantity' => 'required|integer|min:1', // Ensure valid quantity
    ]);

    // Get the cart item for the logged-in user
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('login')->with('error', 'Please log in to update your cart.');
    }

    $cartItem = Cart::where('id', $id)->where('user_id', $user->id)->first();

    if ($cartItem) {
        // Update the quantity
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return redirect()->route('site.cart')->with('success', 'Cart updated successfully!');
    }

    return redirect()->route('site.cart')->with('error', 'Cart item not found.');
}




}
