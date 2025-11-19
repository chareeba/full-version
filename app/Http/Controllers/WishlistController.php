<?php

namespace App\Http\Controllers;
use App\models\Wishlist;
use Illuminate\Http\Request;

class WishListController extends Controller
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
            'user_id' => 'required|exists:users,id',
            'product_id'=>'required|exists:products,id',
        ]);
           $result=Wishlist::create($validated);
           if($result){
           return response()->json(['message'=>'wishlist item is created successfully'],201);
           }
           else{
             return response()->json(['message'=>'wishlist item creation failed'],500);
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
           $WishList=WishList::where('id',$id)->firstorFail();
         if($WishList){
            return response()->json($WishList);
        }
        else{
            return response()->json(['message'=>'WishList not found'],404);
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
            'product_id'=>'nullable|exists:products,id',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $WishList=WishList::findorFail($id);
        if($WishList){
            $WishList->delete();
            return response()->json(['message'=>'wishlist item deleted successfully'],200);
        }
        else{
            return response()->json(['message'=>'wishlist item not found'],404);
        }
    }
}
