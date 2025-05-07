<?php

namespace App\Http\Controllers;

use App\Models\MasterItem;
use App\Models\MasterBrand;
use App\Models\MasterCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the items with search and filter.
     */
    public function index(Request $request)
    {
        $query = MasterItem::with(['brand', 'category']);

        // Search functionality
        if ($request->has('search') && $request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('code', 'like', '%' . $request->search . '%');
            });
        }

        // Status filter
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        // Brand filter
        if ($request->has('brand_id') && $request->brand_id) {
            $query->where('brand_id', $request->brand_id);
        }

        // Category filter
        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        $items = $query->latest()->paginate(10);
        $brands = MasterBrand::where('status', 'Active')->get();
        $categories = MasterCategory::where('status', 'Active')->get();

        return view('items.index', compact('items', 'brands', 'categories'));
    }

    /**
     * Show the form for creating a new item.
     */
    public function create()
    {
        $brands = MasterBrand::where('status', 'Active')->get();
        $categories = MasterCategory::where('status', 'Active')->get();

        return view('items.create', compact('brands', 'categories'));
    }

    /**
     * Store a newly created item in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|exists:master_brands,id',
            'category_id' => 'required|exists:master_categories,id',
            'code' => 'required|string|max:50|unique:master_items,code',
            'name' => 'required|string|max:100',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'code' => $request->code,
            'name' => $request->name,
            'status' => 'Active',
            'user_id' => Auth::id(),
        ];

        // Handle attachment upload
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('attachments', $filename, 'public');
            $data['attachment'] = $path;
        }

        MasterItem::create($data);

        return redirect()->route('items.index')
            ->with('success', 'Item created successfully.');
    }

    /**
     * Show the form for editing the specified item.
     */
    public function edit(MasterItem $item)
    {
        $brands = MasterBrand::where('status', 'Active')->get();
        $categories = MasterCategory::where('status', 'Active')->get();

        return view('items.edit', compact('item', 'brands', 'categories'));
    }

    /**
     * Update the specified item in storage.
     */
    public function update(Request $request, MasterItem $item)
    {
        $request->validate([
            'brand_id' => 'required|exists:master_brands,id',
            'category_id' => 'required|exists:master_categories,id',
            'code' => 'required|string|max:50|unique:master_items,code,' . $item->id,
            'name' => 'required|string|max:100',
            'status' => 'required|in:Active,Inactive',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'code' => $request->code,
            'name' => $request->name,
            'status' => $request->status,
        ];

        // Handle attachment upload
        if ($request->hasFile('attachment')) {
            // Delete old file if exists
            if ($item->attachment) {
                Storage::disk('public')->delete($item->attachment);
            }
            
            $file = $request->file('attachment');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('attachments', $filename, 'public');
            $data['attachment'] = $path;
        }

        $item->update($data);

        return redirect()->route('items.index')
            ->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified item from storage.
     */
    public function destroy(MasterItem $item)
    {
        // Delete attachment if exists
        if ($item->attachment) {
            Storage::disk('public')->delete($item->attachment);
        }
        
        $item->delete();
        
        return redirect()->route('items.index')
            ->with('success', 'Item deleted successfully.');
    }

    /**
     * Export items to CSV file.
     */
    public function export(Request $request)
    {
        $query = MasterItem::with(['brand', 'category']);

        // Apply filters for export
        if ($request->has('search') && $request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('code', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        if ($request->has('brand_id') && $request->brand_id) {
            $query->where('brand_id', $request->brand_id);
        }

        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        $items = $query->get();

        // Create CSV file
        $filename = 'items_export_' . date('Y-m-d_H-i-s') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($items) {
            $file = fopen('php://output', 'w');
            
            // Add CSV headers
            fputcsv($file, ['Code', 'Name', 'Brand', 'Category', 'Status', 'Created At']);
            
            // Add data rows
            foreach ($items as $item) {
                fputcsv($file, [
                    $item->code,
                    $item->name,
                    $item->brand->name,
                    $item->category->name,
                    $item->status,
                    $item->created_at->format('Y-m-d H:i:s')
                ]);
            }
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}