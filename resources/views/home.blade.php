<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'MDM System') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
            <!-- Navigation -->
            <nav class="bg-white shadow-md">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-14">
                        <div class="flex items-center">
                            <a href="/" class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                                <span class="ml-2 text-lg font-bold text-indigo-600">MDM System</span>
                            </a>
                        </div>
                        <div class="flex items-center">
                            @if (Route::has('login'))
                                <div class="flex space-x-3 items-center">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="flex items-center px-3 py-1.5 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                            </svg>
                                            Dashboard
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}" class="flex items-center px-3 py-1.5 bg-white border border-gray-300 rounded text-sm text-gray-700 hover:bg-gray-50 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                            </svg>
                                            Log in
                                        </a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="flex items-center px-3 py-1.5 bg-indigo-600 border border-transparent rounded text-sm text-white hover:bg-indigo-700 transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                                </svg>
                                                Register
                                            </a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Hero Section - Compact Version -->
            <div class="py-6">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-md rounded-lg">
                        <div class="md:flex">
                            <!-- Left side: Content -->
                            <div class="p-6 md:w-1/2">
                                <h1 class="text-3xl font-bold text-gray-900 sm:text-4xl">
                                    <span class="text-indigo-600">Master Data Management</span>
                                </h1>
                                <p class="mt-3 text-lg text-gray-500">
                                    A comprehensive solution for managing your organization's master data efficiently.
                                </p>
                                <div class="mt-6 flex flex-wrap gap-3">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded shadow-sm hover:bg-indigo-700 transition flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                            </svg>
                                            Go to Dashboard
                                        </a>
                                    @else
                                        
                                    @endauth
                                </div>
                            </div>
                            <!-- Right side: Image -->
                            <div class="md:w-1/2 bg-indigo-50 flex items-center justify-center p-6">
                                <img src="https://cdn-icons-png.flaticon.com/512/2382/2382533.png" alt="MDM System" class="h-48 w-auto object-contain">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Section - Improved Layout -->
            <div class="py-8 bg-white">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 sm:text-3xl">
                            Key Features
                        </h2>
                        <p class="mt-3 max-w-2xl mx-auto text-base text-gray-500">
                            Our MDM system provides comprehensive tools for data management.
                        </p>
                    </div>

                    <div class="grid gap-5 md:grid-cols-3">
                        <!-- Feature 1: Brand Management -->
                        <div class="bg-gray-50 p-5 rounded-md shadow-sm border border-gray-100 hover:shadow-md transition">
                            <div class="text-indigo-600 mb-3 inline-flex items-center justify-center bg-indigo-100 rounded-full w-10 h-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Brand Management</h3>
                            <p class="mt-2 text-sm text-gray-600">
                                Create, view, update, and delete brand information with ease.
                            </p>
                        </div>

                        <!-- Feature 2: Category Management -->
                        <div class="bg-gray-50 p-5 rounded-md shadow-sm border border-gray-100 hover:shadow-md transition">
                            <div class="text-indigo-600 mb-3 inline-flex items-center justify-center bg-indigo-100 rounded-full w-10 h-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Category Management</h3>
                            <p class="mt-2 text-sm text-gray-600">
                                Organize your data with customizable categories and hierarchies.
                            </p>
                        </div>

                        <!-- Feature 3: Item Management -->
                        <div class="bg-gray-50 p-5 rounded-md shadow-sm border border-gray-100 hover:shadow-md transition">
                            <div class="text-indigo-600 mb-3 inline-flex items-center justify-center bg-indigo-100 rounded-full w-10 h-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">Item Management</h3>
                            <p class="mt-2 text-sm text-gray-600">
                                Track all items with detailed information, attachments, and status updates.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Section - New Addition -->
            <div class="py-8">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="bg-white shadow-sm rounded-md p-6">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                            <div class="p-4">
                                <span class="block text-indigo-600 text-2xl font-bold">Brands</span>
                                <div class="mt-2 flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>
                                </div>
                                <span class="block text-gray-500 text-sm mt-2">Manage your brands</span>
                            </div>
                            <div class="p-4">
                                <span class="block text-indigo-600 text-2xl font-bold">Categories</span>
                                <div class="mt-2 flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                </div>
                                <span class="block text-gray-500 text-sm mt-2">Organize your data</span>
                            </div>
                            <div class="p-4">
                                <span class="block text-indigo-600 text-2xl font-bold">Items</span>
                                <div class="mt-2 flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                </div>
                                <span class="block text-gray-500 text-sm mt-2">Track your inventory</span>
                            </div>
                            <div class="p-4">
                                <span class="block text-indigo-600 text-2xl font-bold">Reports</span>
                                <div class="mt-2 flex justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <span class="block text-gray-500 text-sm mt-2">Generate insights</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action - Compact Version -->
            <div class="py-8">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="bg-indigo-700 rounded-md shadow-md overflow-hidden">
                        <div class="px-6 py-6 md:py-8 md:flex md:items-center md:justify-between">
                            <div>
                                <h2 class="text-xl font-bold text-white sm:text-2xl">
                                    Ready to get started?
                                </h2>
                                <p class="mt-2 text-sm text-indigo-200 md:max-w-md">
                                    Join our platform to streamline your data management processes.
                                </p>
                            </div>
                            <div class="mt-4 md:mt-0 flex flex-col space-y-2 md:space-y-0 md:space-x-2 md:flex-row">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-white text-indigo-700 text-sm font-medium rounded shadow-sm hover:bg-gray-100 transition flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>
                                        Go to Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="px-4 py-2 bg-white text-indigo-700 text-sm font-medium rounded shadow-sm hover:bg-gray-100 transition flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                        </svg>
                                        Sign In
                                    </a>
                                    <a href="{{ route('register') }}" class="px-4 py-2 bg-transparent border border-white text-white text-sm font-medium rounded shadow-sm hover:bg-white hover:bg-opacity-10 transition flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                        </svg>
                                        Register
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="bg-white py-6">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-500 text-sm">
                    <p>&copy; {{ date('Y') }} MDM System. All rights reserved.</p>
                </div>
            </footer>
        </div>
    </body>
</html>