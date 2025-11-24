<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $title = "All settings";
        $description = "List of settings";
        return view('admin.setting.index', compact('title', 'description'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "All settings";
        $description = "List of settings";
        return view('admin.setting.create', compact('title', 'description'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // validation rules
            'key'=>'required|string|max:255|unique:settings,key',
            'value'=>'required|string|max:255',
        ]);
           $result=Setting::create($validated);
           if($result){
           return response()->json(['message'=>'setting is created successfully'],201);
           }
           else{
             return response()->json(['message'=>'setting creation failed'],500);
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
        $title = "All settings";
        $description = "List of settings";
           $Setting=Setting::where('id',$id)->firstorFail();
         if($Setting){
        return view('admin.setting.edit', compact('title', 'description','Setting'));
        }
        else{
            return response()->json(['message'=>'setting not found'],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            // validation rules
            'key'=>'nullable|string|max:255|unique:settings,key,'.$id,
            'value'=>'nullable|string|max:255',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Setting=Setting::where('id',$id)->firstorFail();
        if($Setting){
            $Setting->delete();
            return response()->json(['message'=>'setting deleted successfully']);
        }
        else{
            return response()->json(['message'=>'setting not found'],404);
        }
    }
}

