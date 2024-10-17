<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $categories = Category::all();
            return view('admin.category.index',compact('categories'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        {
            return view('admin.category.create');
        } 
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $request->validate([
                'name' => 'required|max:255|min:3',
            ]);
            $category = new Category();
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->save();
            return redirect()->route('admin.category.index');
        }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        {
            // $category = Category::where('id',$id)->first();
            return view('admin.category.edit',compact('category'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255|min:3',
        ]);
    
        
        $category->name = $request->name;
        $category->save();
    
        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        {
            $id = $category->id;
           Category::where('id',$id)->delete();
           $category->delete();
           return redirect()->back();
       }
    }
}
