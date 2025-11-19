<?php

namespace App\Http\Controllers;
use App\models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
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
            'cart_id' => 'required|exists:carts,id',
            'product_id'=>'required|exists:products,id',
            'variant_id'=>'nullable|exists:variants,id',
            'quantity'=>'required|integer|min:1|max:100',
            'price'=>'required|numeric|min:0|max:100000',
            'subtotal'=>'required|numeric|min:0|max:100000',
        ]);
           $result=CartItem::create($validated);
           if($result){
           return response()->json(['message'=>'cart item is created successfully'],201);
           }
           else{
             return response()->json(['message'=>'cart item creation failed'],500);
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
         $CartItem=CartItem::where('id',$id)->firstorFail();
         if($CartItem){
            return response()->json($CartItem);
        }
        else{
            return response()->json(['message'=>'CartItem not found'],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $validated = $request->validate([
                // validation rules
                'cart_id' => 'nullable|exists:carts,id',
                'product_id'=>'nullable|exists:products,id',
                'variant_id'=>'nullable|exists:variants,id',
                'quantity'=>'nullable|integer|min:1|max:100',
                'price'=>'nullable|numeric|min:0|max:100000',
                'subtotal'=>'nullable|numeric|min:0|max:100000',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $CartItem=CartItem::where('id',$id)->firstorFail();
        if($CartItem){
            $CartItem->delete();
            return response()->json(['message'=>'cart item deleted successfully'],200);
        }
        else{
            return response()->json(['message'=>'cart item not found'],404);
        }
    }
}
