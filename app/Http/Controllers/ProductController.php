<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $categories = Category::all();
        view()->share('categories', $categories);
    }

    // public function getsubcategory(Request $request)
    // {
    //     $subcategories = SubCategory::where('category_id',$request->category)->get();
    //     return view('product.subcategories',compact('subcategories'));
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
        ]);

        
        $destinationPath = 'images'; 
        $myimage = $request->image->getClientOriginalName(); 
        $request->image->move(public_path($destinationPath), $myimage); 

        
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id; 
        $product->sub_category_id = $request->sub_category_id;
        $product->image = $myimage;

        
        $product->save();

        
        return redirect()->route('admin.product.index')->with('success', 'Product created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function getSubcategory(Request $request)
    {
        $categoryId = $request->category_id;
        $subcategories = SubCategory::where('category_id', $categoryId)->get();

        return response()->json($subcategories);
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
