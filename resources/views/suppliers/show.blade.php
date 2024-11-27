@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-5xl">
    <div class="mb-8 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800">Supplier Details</h1>
        <a href="{{ route('suppliers.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors duration-200">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Suppliers
        </a>
    </div>

    <div class="grid grid-cols-1 gap-6 mb-8">
        <!-- Supplier Information Card -->
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6">
            <div class="flex items-center mb-4">
                <svg class="w-6 h-6 text-blue-500 mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-800">Supplier Information</h3>
            </div>
            <div class="space-y-2 text-gray-600">
                <p class="hover:text-gray-800 transition-colors duration-200">
                    <span class="font-medium">Name:</span> {{ $supplier->name }}
                </p>
                <p class="hover:text-gray-800 transition-colors duration-200">
                    <span class="font-medium">Address:</span> {{ $supplier->address }}
                </p>
                <p class="hover:text-gray-800 transition-colors duration-200">
                    <span class="font-medium">City:</span> {{ $supplier->city }}
                </p>
                <p class="hover:text-gray-800 transition-colors duration-200">
                    <span class="font-medium">Phone:</span> {{ $supplier->phone }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection