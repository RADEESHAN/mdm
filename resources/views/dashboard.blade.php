<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold mb-4">Welcome to MDM System</h2>
                    <p class="mb-4">Master Data Management System for efficient data handling.</p>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                        <div class="bg-blue-50 p-4 rounded-lg border border-blue-200">
                            <h3 class="text-lg font-medium text-blue-800">Brands</h3>
                            <p class="text-3xl font-bold">{{ \App\Models\MasterBrand::count() }}</p>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg border border-green-200">
                            <h3 class="text-lg font-medium text-green-800">Categories</h3>
                            <p class="text-3xl font-bold">{{ \App\Models\MasterCategory::count() }}</p>
                        </div>
                        <div class="bg-purple-50 p-4 rounded-lg border border-purple-200">
                            <h3 class="text-lg font-medium text-purple-800">Items</h3>
                            <p class="text-3xl font-bold">{{ \App\Models\MasterItem::count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Management Links -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold mb-4">Brand Management</h3>
                        <p class="text-gray-600 mb-4">Create and manage brand information.</p>
                        <a href="{{ route('brands.index') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                            Manage Brands
                        </a>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold mb-4">Category Management</h3>
                        <p class="text-gray-600 mb-4">Create and manage product categories.</p>
                        <a href="{{ route('categories.index') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                            Manage Categories
                        </a>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-semibold mb-4">Item Management</h3>
                        <p class="text-gray-600 mb-4">Create and manage inventory items.</p>
                        <a href="{{ route('items.index') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                            Manage Items
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Items Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Recent Items</h3>
                        <a href="{{ route('items.index') }}" class="text-indigo-600 hover:text-indigo-800">View All</a>
                    </div>
                    
                    <!-- Items Search Form -->
                    <form action="{{ route('dashboard') }}" method="GET" class="mb-4">
                        <div class="flex flex-col md:flex-row gap-4">
                            <div class="flex-grow">
                                <input type="text" name="search" value="{{ request('search') }}" 
                                    placeholder="Search items..." 
                                    class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <div class="w-full md:w-1/4">
                                <select name="status" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="">All Status</option>
                                    <option value="Active" {{ request('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Inactive" {{ request('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                                    Filter
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Items Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Code</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Brand</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($items ?? [] as $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->code }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->brand->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->category->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs font-semibold {{ $item->status == 'Active' ? 'text-green-800 bg-green-100' : 'text-red-800 bg-red-100' }} rounded-full">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('items.edit', $item) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No items found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if(!empty($items))
                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $items->links() }}
                    </div>
                    @endif

                    <!-- Export Button -->
                    <div class="mt-4">
                        <a href="{{ route('items.export') }}" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                            Export Items to CSV
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
