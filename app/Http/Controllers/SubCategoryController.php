<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{


    public function __construct()
    {
        $categories = Category::all();
        view()->share('categories', $categories);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SubCategory::orderBy('id')->get();
        return view('admin.subcategory.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        {
            return view('admin.subcategory.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|max:255',
            'category' => 'required|exists:categories,id',
        ]);
    
        $subCategory = new SubCategory();
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category;
        $subCategory->save();
    
    
        $data = SubCategory::orderBy('id')->get();
        return redirect()->route('admin.subcategory.index')->with('success', 'Subcategory created successfully.');    
        
    
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id = decrypt($id); // Decrypt the ID
        $data = SubCategory::findOrFail($id);
        return view('admin.subcategory.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $id = decrypt($id); // Decrypt the ID
        $subCategory = SubCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'category' => 'required|exists:categories,id',
        ]);

        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category;
        $subCategory->save();

        return redirect()->route('admin.subcategory.index')->with('success', 'Subcategory updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $id = decrypt($id); // Decrypt the ID
    $subcategory = SubCategory::findOrFail($id);
    $subcategory->delete();

    return response()->json(['success' => 'Subcategory deleted successfully']);
}

}
