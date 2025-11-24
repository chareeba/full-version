<?php

namespace App\Http\Controllers;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Subcategories";
        $description = "List of subcategories";
        return view('admin.shippingadress.index', compact('title', 'description'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $title = "Subcategories";
        $description = "List of subcategories";
        return view('admin.shippingadress.create', compact('title', 'description'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // validation rules
            'category_id' => 'required|exists:categories,id',
            'name'=>'required|string|max:255|min:5',
            'slug'=>'required|string|max:255|min:5|unique:sub_categories,slug',
            'description'=>'nullable|string',
            'status'=>'required|boolean',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
           $result=SubCategory::create($validated);
           if($result){
           return response()->json(['message'=>'subcategory is created successfully'],201);
           }
           else{
             return response()->json(['message'=>'subcategory creation failed'],500);
           }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
         $title = "Subcategories";
        $description = "List of subcategories";
         $SubCategory=SubCategory::where('slug',$slug)->firstorFail();
         if($SubCategory){
        return view('admin.shippingadress.edit', compact('title', 'description','SubCategory'));
        }
        else{
            return response()->json(['message'=>'subcategory not found'],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $validated = $request->validate([
            // validation rules
            'category_id' => 'nullable|exists:categories,id',
            'name'=>'nullable|string|max:255|min:5',
            'slug'=>'nullable|string|max:255|min:5|unique:sub_categories,slug,',
            'description'=>'nullable|string',
            'status'=>'boolean',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $SubCategory=SubCategory::findorFail($slug);
        if($SubCategory){
            $SubCategory->delete();
            return response()->json(['message'=>'subcategory deleted successfully'],200);
        }
        else{
            return response()->json(['message'=>'subcategory not found'],404);
        }
    }
}
