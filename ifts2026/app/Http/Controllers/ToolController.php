<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tools = DB::table('tools')->get();
        return response()->json($tools);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'price' => 'required|numeric',
            'color' => 'nullable|string|max:30',
        ]);
        $response = DB::table('tools')->insert($validatedData);
        $tool = DB::table('tools')->where('id', DB::getPdo()->lastInsertId())->first();
        return response()->json($tool, 201);    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tool = DB::table('tools')->where('id', $id)->first();
        if ($tool) {
            return response()->json($tool);
        } else {
            return response()->json(['message' => 'Tool not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'price' => 'required|numeric',
            'color' => 'nullable|string|max:30',
        ]);
        $exist = DB::table('tools')->where('id', $id)->exists();
        if (!$exist) {
            return response()->json(['message' => 'Tool not found'], 404);
        }
        $updated = DB::table('tools')->where('id', $id)->update($validatedData);
        $tool = DB::table('tools')->where('id', $id)->first();
        return response()->json(['message' => 'Tool updated successfully', 'tool' => $tool]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = DB::table('tools')->where('id', $id)->delete();
        if ($deleted) {
            return response()->json(['message' => 'Tool deleted successfully']);
        } else {
            return response()->json(['message' => 'Tool not found'], 404);
        }   
    }
}
