<?php

namespace App\Http\Controllers;
use App\models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
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
            'user_id' => 'nullable|exists:users,id',
            'session_id'=>'nullable|string|max:255',
            'total'=>'required|numeric|min:0|max:100000',
        ]);
           $result=Cart::create($validated);
           if($result){
           return response()->json(['message'=>'cart is created successfully'],201);
           }
           else{
             return response()->json(['message'=>'cart creation failed'],500);
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
        $Cart=Cart::where('id',$id)->firstorFail();
         if($Cart){
            return response()->json($Cart);
        }
        else{
            return response()->json(['message'=>'cart not found'],404);
        }



    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validated = $request->validate([
            // validation rules
            'user_id' => 'nullable|exists:users,id',
            'session_id'=>'nullable|string|max:255',
            'total'=>'nullable|numeric|min:0|max:100000',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Cart=Cart::where('id',$id)->firstorFail();
        if($Cart){
            $Cart->delete();
            return response()->json(['message'=>'cart deleted successfully'],200);
        }
        else{
            return response()->json(['message'=>'cart not found'],404);
        }
    }
}
