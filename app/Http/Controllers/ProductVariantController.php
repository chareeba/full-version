<?php

namespace App\Http\Controllers;
use App\models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
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
            'product_id' => 'required|exists:products,id',
            'attribute' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'price_adjustment' => 'nullable|numeric',
            'stock' => 'required|integer|min:0',
        ]);
           $result=ProductVariant::create($validated);
           if($result){
           return response()->json(['message'=>'product variant is created successfully'],201);
           }
           else{
             return response()->json(['message'=>'product variant creation failed'],500);
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
        $ProductVariant=ProductVariant::where('id',$id)->firstorFail();
         if($ProductVariant){
            return response()->json($ProductVariant);
        }
        else{
            return response()->json(['message'=>'ProductVariant not found'],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            // validation rules
            'product_id' => 'nullable|exists:products,id',
            'attribute' => 'nullable|string|max:255',
            'value' => 'nullable|string|max:255',
            'price_adjustment' => 'nullable|numeric',
            'stock' => 'nullable|integer|min:0',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ProductVariant=ProductVariant::where('id',$id)->firstorFail();
        if($ProductVariant){
            $ProductVariant->delete();
            return response()->json(['message'=>'ProductVariant deleted successfully'],200);
        }
        else{
            return response()->json(['message'=>'ProductVariant not found'],404);
        }
    }
}
