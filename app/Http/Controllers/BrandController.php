<?php

namespace App\Http\Controllers;

use App\Models\MasterBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the brands.
     */
    public function index()
    {
        $brands = MasterBrand::latest()->paginate(10);
        return view('brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new brand.
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created brand in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:50|unique:master_brands,code',
            'name' => 'required|string|max:100',
        ]);

        MasterBrand::create([
            'code' => $request->code,
            'name' => $request->name,
            'status' => 'Active',
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('brands.index')
            ->with('success', 'Brand created successfully.');
    }

    /**
     * Show the form for editing the specified brand.
     */
    public function edit(MasterBrand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    /**
     * Update the specified brand in storage.
     */
    public function update(Request $request, MasterBrand $brand)
    {
        $request->validate([
            'code' => 'required|string|max:50|unique:master_brands,code,' . $brand->id,
            'name' => 'required|string|max:100',
            'status' => 'required|in:Active,Inactive',
        ]);

        $brand->update([
            'code' => $request->code,
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()->route('brands.index')
            ->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified brand from storage.
     */
    public function destroy(MasterBrand $brand)
    {
        // Check if brand has related items before deletion
        if($brand->items()->count() > 0) {
            return redirect()->route('brands.index')
                ->with('error', 'Cannot delete this brand as it has associated items.');
        }
        
        $brand->delete();
        
        return redirect()->route('brands.index')
            ->with('success', 'Brand deleted successfully.');
    }
}