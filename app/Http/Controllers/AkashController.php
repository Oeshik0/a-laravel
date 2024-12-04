<?php

namespace App\Http\Controllers;

use App\Models\akash;
use Illuminate\Http\Request;
use App\Http\Controllers\AkashController;

class AkashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure picture is uploaded
        ]);




        $akash=new akash;
        $akash->name=$request->name;
        $akash->description=$request->description;
        $akash->picture=$request->picture;

        if ($request->hasFile('picture')) {
            $filePath = $request->file('picture')->store('uploads', 'public'); // Store file in storage
            $akash->picture = $filePath; // Save the file path in the database
        }

        $akash->save();
        return redirect()->back()->with('success','POST SUCCESS!');
    }

    /**
     * Display the specified resource.
     */
    public function show(akash $akash)
    {
        $akash = Akash::all(); // Fetch all records
    return view('table', compact('akash')); // Pass the data to the view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the record by ID or throw a 404 if not found
        $akash = Akash::findOrFail($id);
    
        // Return the edit view with the data
        return view('edit', compact('akash'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, akash $akash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $akash= Akash::findOrFail($id);
        $akash->delete();
        return redirect()->back();
    }
}
