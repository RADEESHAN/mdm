<?php

namespace App\Http\Controllers;

use App\Models\MasterCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $categories = MasterCategory::latest()->paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:50|unique:master_categories,code',
            'name' => 'required|string|max:100',
        ]);

        MasterCategory::create([
            'code' => $request->code,
            'name' => $request->name,
            'status' => 'Active',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(MasterCategory $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, MasterCategory $category)
    {
        $request->validate([
            'code' => 'required|string|max:50|unique:master_categories,code,' . $category->id,
            'name' => 'required|string|max:100',
            'status' => 'required|in:Active,Inactive',
        ]);

        $category->update([
            'code' => $request->code,
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(MasterCategory $category)
    {
        // Check if category has related items before deletion
        if($category->items()->count() > 0) {
            return redirect()->route('categories.index')
                ->with('error', 'Cannot delete this category as it has associated items.');
        }
        
        $category->delete();
        
        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}