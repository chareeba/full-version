<?php

namespace App\Http\Controllers;
use App\models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
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
             'user_id'=>'required|exists:users,id',
            'product_id'=>'required|exists:products,id',
            'rating'=>'required|integer|min:1|max:5',
            'comment'=>'nullable|string|max:1000',
            'status'=>'required|boolean',
           ]);
        $result=Review::create($validated);
           if($result){
           return response()->json(['message'=>'review is created successfully'],201);
           }
           else{
             return response()->json(['message'=>'review creation failed'],500);
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
         $Review=Review::where('id',$id)->firstorFail();
         if($Review){
            return response()->json($Review);
        }
        else{
            return response()->json(['message'=>'Review not found'],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $validated = $request->validate([
             'user_id'=>'nullable|exists:users,id',
            'product_id'=>'nullable|exists:products,id',
            'rating'=>'nullable|integer|min:1|max:5',
            'comment'=>'nullable|string|max:1000',
            'status'=>'boolean',
           ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $result=Review::where('id', $id)->firstorFail();
        if($result){
            $result->delete();
            return response()->json(['message'=>'review is deleted successfully'],201);
        }
        else{
            return response()->json(['message'=>'review not found'],404);
        }
    }
}
