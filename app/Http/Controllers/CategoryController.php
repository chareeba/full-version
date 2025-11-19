<?php

namespace App\Http\Controllers;
use App\models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            // validation rules
            'name'=>'required|string|max:255|min:5',
            'slug'=>'required|string|max:255|min:5|unique:categories,slug',
            'description'=>'nullable|string',
            'status'=>'required|boolean',
            'image'=>'nullable|image|max:2048',
         ]);
              $result=Category::create($validated);
              if($result){
              return response()->json(['message'=>'category is created successfully'],201);
              }
              else{
                 return response()->json(['message'=>'category creation failed'],500);
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
           $Category=Category::where('slug',$slug)->firstorFail();
         if($Category){
            return response()->json($Category);
        }
        else{
            return response()->json(['message'=>'Category not found'],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
         $validated = $request->validate([
            // validation rules
            'name'=>'nullable|string|max:255|min:5',
            'slug'=>'nullable|string|max:255|min:5|unique:categories,slug',
            'description'=>'nullable|string',
            'status'=>'boolean',
            'image'=>'nullable|image|max:2048',
         ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
            $Category=Category::where('slug',$slug)->firstorFail();
            if($Category){
                $Category->delete();
                return response()->json(['message'=>'Category deleted successfully'],200);
            }
            else{
                return response()->json(['message'=>'Category not found'],404);
            }
    }
}
