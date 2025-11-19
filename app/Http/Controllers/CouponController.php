<?php

namespace App\Http\Controllers;
use App\models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
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
            'code' => 'required|string|max:50|unique:coupons,code',
            'discount_type' => 'required|in:percentage,fixed',
            'discount_value' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'min_order_amount' => 'nullable|numeric|min:0',
            'max_uses' => 'nullable|integer|min:1',
            'status' => 'required|boolean',
        ]);

        $result = Coupon::create($validated);
        if ($result) {
            return response()->json(['message' => 'Coupon created successfully'], 201);
        } else {
            return response()->json(['message' => 'Coupon creation failed'], 500);
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
         $Coupon=Coupon::where('id',$id)->firstorFail();
         if($Coupon){
            return response()->json($Coupon);
        }
        else{
            return response()->json(['message'=>'coupon not found'],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'code' => 'nullable|required|string|max:50|unique:coupons,code,' . $id,
            'discount_type' => 'nullable|required|in:percentage,fixed',
            'discount_value' => 'nullable|required|numeric|min:0',
            'start_date' => 'nullable|required|date',
            'end_date' => 'nullable|required|date|after_or_equal:start_date',
            'min_order_amount' => 'nullable|numeric|min:0',
            'max_uses' => 'nullable|integer|min:1',
            'status' => 'boolean',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $Coupon=Coupon::where('id',$id)->firstorFail();
            if($Coupon){
                $Coupon->delete();
                return response()->json(['message'=>'coupon deleted successfully'],201);
            }
            else{
                return response()->json(['message'=>'coupon not found'],404);
            }
    }
}
