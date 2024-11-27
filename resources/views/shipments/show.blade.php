@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-5xl">
    <div class="mb-8 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800">Shipment Details</h1>
        <a href="{{ route('shipments.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors duration-200">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Shipments
        </a>
    </div>

    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <!-- Sender Information Card -->
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6">
            <div class="flex items-center mb-4">
                <!-- SVG Icon -->
                <svg class="w-6 h-6 text-blue-500 mr-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <!-- Text -->
                <h3 class="text-xl font-semibold text-gray-800 my-auto">Sender Information</h3>
            </div>
            <div class="space-y-2 text-gray-600">
                <p class="hover:text-gray-800 transition-colors duration-200">
                    <span class="font-medium">Name:</span> {{ $shipment->sender_name }}
                </p>
                <p class="hover:text-gray-800 transition-colors duration-200">
                    <span class="font-medium">City:</span> {{ $shipment->sender_city }}
                </p>
                <p class="hover:text-gray-800 transition-colors duration-200">
                    <span class="font-medium">Address:</span> {{ $shipment->sender_address }}
                </p>
                <p class="hover:text-gray-800 transition-colors duration-200">
                    <span class="font-medium">Postal Code:</span> {{ $shipment->sender_postal_code }}
                </p>
                <p class="hover:text-gray-800 transition-colors duration-200">
                    <span class="font-medium">Phone:</span> {{ $shipment->sender_phone }}
                </p>
            </div>
        </div>

        <!-- Recipient Information Card -->
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6">
            <div class="flex items-center mb-4">
                <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-800">Recipient Information</h3>
            </div>
            <div class="space-y-2 text-gray-600">
                <p class="hover:text-gray-800 transition-colors duration-200">
                    <span class="font-medium">Name:</span> {{ $shipment->recipient_name }}
                </p>
                <p class="hover:text-gray-800 transition-colors duration-200">
                    <span class="font-medium">City:</span> {{ $shipment->recipient_city }}
                </p>
                <p class="hover:text-gray-800 transition-colors duration-200">
                    <span class="font-medium">Address:</span> {{ $shipment->recipient_address }}
                </p>
                <p class="hover:text-gray-800 transition-colors duration-200">
                    <span class="font-medium">Postal Code:</span> {{ $shipment->recipient_postal_code }}
                </p>
                <p class="hover:text-gray-800 transition-colors duration-200">
                    <span class="font-medium">Phone:</span> {{ $shipment->recipient_phone }}
                </p>
            </div>
        </div>
    </div>

    <!-- Status Card -->
    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6 mb-8">
        <div class="flex items-center mb-4">
            <svg class="w-6 h-6 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            <h3 class="text-xl font-semibold text-gray-800">Status Information</h3>
        </div>
        <div class="grid md:grid-cols-2 gap-4">
            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-lg font-medium text-gray-700">Current Status</p>
                <p class="text-2xl font-bold {{ $shipment->status === 'delivered' ? 'text-green-600' : 'text-blue-600' }}">
                    {{ ucfirst($shipment->status) }}
                </p>
            </div>
            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-lg font-medium text-gray-700">Schedule Date</p>
                <p class="text-2xl font-bold text-gray-800">
                    {{ $shipment->schedule_date }}
                </p>
            </div>
        </div>
    </div>

    <!-- Items/Package Card -->
    <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6">
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-800">Items / Package</h3>
            </div>
            <a href="{{ route('shipments.additem', $shipment->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-black rounded-lg transition-colors duration-200">
                <svg class="w-4 h-2 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Items
            </a>
        </div>

        <div class="space-y-4">
            @foreach($shipment->items as $item)
            <div class="bg-gray-50 rounded-lg p-4 hover:bg-gray-100 transition-colors duration-200">
                <div class="flex justify-between items-center">
                    <div class="space-y-1">
                        <h4 class="font-medium text-gray-800">{{ $item->name }}</h4>
                        <div class="flex space-x-4 text-sm text-gray-600">
                            <p>Quantity: {{ $item->quantity }}</p>
                            <p>Weight: {{ $item->weight }}</p>
                            <p>Height: {{ $item->height }}</p>
                        </div>
                    </div>
                    <form action="{{ route('shipments.items.delete', ['shipment' => $shipment->id, 'item' => $item->id]) }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="inline-flex items-center px-3 py-1 bg-gray-200 hover:bg-gray-300 text-black rounded transition-colors duration-200">
                            <svg class="w-4 h-2 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Remove
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection