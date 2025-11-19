<?php

namespace App\Http\Controllers;
use App\models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
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
            'user_id' => 'required|exists:users,id',
            'order_number' => 'required|string|unique:orders,order_number',
            'total_amount' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'shipping_cost' => 'required|numeric|min:0',
            'payment_status' => 'required|in:pending,paid,failed',
            'order_status' => 'required|in:pending,processing,completed,cancelled',
            'shipping_address_id' => 'required|exists:addresses,id',
            'payment_method' => 'required|in:cash_on_delivery,stripe,paypal',
        ]);

        $result = Order::create($validated);
        if ($result) {
            return response()->json(['message' => 'Order created successfully'], 201);
        } else {
            return response()->json(['message' => 'Order creation failed'], 500);
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
         $Order=Order::where('id',$id)->firstorFail();
         if($Order){
            return response()->json($Order);
        }
        else{
            return response()->json(['message'=>'order not found'],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'order_number' => 'nullable|string|unique:orders,order_number,' . $id,
            'total_amount' => 'nullable|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'shipping_cost' => 'nullable|numeric|min:0',
            'payment_status' => 'nullable|in:pending,paid,failed',
            'order_status' => 'nullable|in:pending,processing,completed,cancelled',
            'shipping_address_id' => 'nullable|exists:addresses,id',
            'payment_method' => 'nullable|in:cash_on_delivery,stripe,paypal',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $Order=Order::where('id',$id)->firstorFail();
            if($Order){
                $Order->delete();
                return response()->json(['message'=>'order deleted successfully'],201);
            }
            else{
                return response()->json(['message'=>'order not found'],404);
            }
    }
}
