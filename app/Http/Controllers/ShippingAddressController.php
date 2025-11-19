<?php

namespace App\Http\Controllers;
use App\models\ShippingAddress;
use Illuminate\Http\Request;

class ShippingAddressController extends Controller
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
            'user_id'=>'required|exists:users,id',
            'full_name'=>'required|string|max:255|min:5',
            'phone'=>'required|string|max:20|min:10',
            'email'=>'required|email|max:255',
            'address'=>'required|string|max:500',
            'city'=>'required|string|max:100',
            'state'=>'required|string|max:100',
            'postal_code'=>'required|string|max:20',
            'country'=>'required|string|max:100',
            'is_default'=>'required|boolean',
        ]);
           $result=ShippingAddress::create($validated);
           if($result){
           return response()->json(['message'=>'shipping address is created successfully'],201);
           }
           else{
             return response()->json(['message'=>'shipping address creation failed'],500);
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
         $ShippingAddress=ShippingAddress::where('id',$id)->firstorFail();
         if($ShippingAddress){
            return response()->json($ShippingAddress);
        }
        else{
            return response()->json(['message'=>'shippingAddress not found'],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            // validation rules
            'user_id'=>'nullable|exists:users,id',
            'full_name'=>'nullable|string|max:255|min:5',
            'phone'=>'nullable|string|max:20|min:10',
            'email'=>'nullable|email|max:255',
            'address'=>'nullable|string|max:500',
            'city'=>'nullable|string|max:100',
            'state'=>'nullable|string|max:100',
            'postal_code'=>'nullable|string|max:20',
            'country'=>'nullable|string|max:100',
            'is_default'=>'boolean',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ShippingAddress=ShippingAddress::where('id',$id)->firstorFail();
        if($ShippingAddress){
            $ShippingAddress->delete();
            return response()->json(['message'=>'shipping address deleted successfully']);
        }
        else{
            return response()->json(['message'=>'shipping address not found'],404);
        }
    }
}
