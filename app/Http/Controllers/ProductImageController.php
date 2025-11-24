<?php

namespace App\Http\Controllers;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $title = "All Productimages";
        $description = "List of productimages";
        return view('admin.productimage.index', compact('title', 'description'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $title = "All Productimages";
        $description = "List of productimages";
        return view('admin.productimage.create', compact('title', 'description'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'image_path' => 'required|string|max:255',
            'alt_text' => 'nullable|string|max:255',
         ]);
              $result=ProductImage::create($validated);
              if($result){
                return response()->json(['message'=>'Product image is created successfully'],201);
                }
                else{
                    return response()->json(['message'=>'Product image creation failed'],500);
                }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $title = "All Productimages";
        $description = "List of productimages";
           $ProductImage=ProductImage::where('id',$id)->firstorFail();
         if($ProductImage){
        return view('admin.productimage.edit', compact('title', 'description','ProductTimage'));
        }
        else{
            return response()->json(['message'=>'ProductImage not found'],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $validated = $request->validate([
                'product_id' => 'nullable|exists:products,id',
                'image_path' => 'nullable|string|max:255',
                'alt_text' => 'nullable|string|max:255',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ProductImage=ProductImage::where('id',$id)->firstorFail();
        if($ProductImage){
            $ProductImage->delete();
            return response()->json(['message'=>'Product image deleted successfully'],200);
        }
        else{
            return response()->json(['message'=>'Product image not found'],404);
        }
    }
}
