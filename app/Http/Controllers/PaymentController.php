<?php

namespace App\Http\Controllers;
use App\models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
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
            'order_id' => 'required|exists:orders,id',
            'payment_method'=>'required|string|max:50',
            'transaction_id'=>'required|string|unique:payments,transaction_id',
            'amount'=>'required|numeric|min:0',
            'status'=>'required|boolean',
        ]);
           $result=Payment::create($validated);
           if($result){
           return response()->json(['message'=>'payment is recorded successfully'],201);
           }
           else{
             return response()->json(['message'=>'payment recording failed'],500);
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
          $Payment=Payment::where('id',$id)->firstorFail();
         if($Payment){
            return response()->json($Payment);
        }
        else{
            return response()->json(['message'=>'Payment not found'],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            // validation rules
            'order_id' => 'nullable|required|exists:orders,id',
            'payment_method'=>'nullable|required|string|max:50',
            'transaction_id'=>'nullable|required|string|unique:payments,transaction_id,'.$id,
            'amount'=>'nullable|required|numeric|min:0',
            'status'=>'boolean',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $Payment=Payment::where('id',$id)->firstorFail();
            if($Payment){
                $Payment->delete();
                return response()->json(['message'=>'Payment deleted successfully'],200);
            }
            else{
                return response()->json(['message'=>'Payment not found'],404);
            }
    }
}
