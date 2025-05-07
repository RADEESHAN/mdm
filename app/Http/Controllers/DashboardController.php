<?php

namespace App\Http\Controllers;

use App\Models\MasterItem;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with items list
     * Includes search and filtering capabilities
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');
        
        // Build query based on user role
        $itemsQuery = auth()->user()->is_admin
            ? MasterItem::with(['brand', 'category', 'user'])
            : auth()->user()->items()->with(['brand', 'category']);
        
        // Apply search filter if provided
        if ($search) {
            $itemsQuery->where(function($query) use ($search) {
                $query->where('code', 'like', "%{$search}%")
                      ->orWhere('name', 'like', "%{$search}%");
            });
        }
        
        // Apply status filter if provided
        if ($status) {
            $itemsQuery->where('status', $status);
        }
        
        // Get paginated results
        $items = $itemsQuery->latest()->paginate(5);
        
        return view('dashboard', compact('items', 'search', 'status'));
    }
}