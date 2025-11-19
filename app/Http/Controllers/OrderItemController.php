<?php

namespace App\Http\Controllers;
use App\models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
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
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'variant_id' => 'nullable|exists:variants,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'subtotal' => 'required|numeric|min:0',
        ]);

        $result = OrderItem::create($validated);
        if ($result) {
            return response()->json(['message' => 'Order item created successfully'], 201);
        } else {
            return response()->json(['message' => 'Order item creation failed'], 500);
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
         $OrderItem=OrderItem::where('id',$id)->firstorFail();
         if($OrderItem){
            return response()->json($OrderItem);
        }
        else{
            return response()->json(['message'=>'orderitem not found'],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'order_id' => 'nullable|exists:orders,id',
            'product_id' => 'nullable|exists:products,id',
            'variant_id' => 'nullable|exists:variants,id',
            'quantity' => 'nullable|integer|min:1',
            'price' => 'nullable|numeric|min:0',
            'subtotal' => 'nullable|numeric|min:0',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $OrderItem=OrderItem::where('id',$id)->firstorFail();
            if($OrderItem){
                $OrderItem->delete();
                return response()->json(['message'=>'orderitem deleted successfully'],201);
            }
            else{
                return response()->json(['message'=>'orderitem not found'],404);
            }
    }
}
