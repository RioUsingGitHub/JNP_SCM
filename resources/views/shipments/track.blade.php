{{-- resources/views/shipments/track.blade.php --}}
@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<style>
    #map { 
        height: 400px; 
        width: 100%;
        margin-bottom: 20px;
        border-radius: 8px;
    }
    .location-timeline {
        border-left: 2px solid #3b82f6;
        margin-left: 20px;
        padding-left: 20px;
    }
    .location-point {
        position: relative;
        margin-bottom: 20px;
    }
    .location-point::before {
        content: '';
        width: 12px;
        height: 12px;
        background: #3b82f6;
        border-radius: 50%;
        position: absolute;
        left: -26px;
        top: 5px;
    }
</style>
@endsection

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Track Shipment</h1>

        <form action="{{ route('track') }}" method="GET" class="mb-8">
            <div class="flex gap-4">
                <input type="text" 
                       name="tracking_number" 
                       placeholder="Enter Tracking Number"
                       class="flex-1 border rounded px-4 py-2"
                       value="{{ request('tracking_number') }}">
                <button type="submit" 
                        class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded">
                    Track
                </button>
            </div>
        </form>

        @if($shipment)
            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4">Shipment Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-50 p-4 rounded-lg">
                    <div>
                        <h3 class="font-semibold text-gray-700">Sender Information</h3>
                        <p><span class="font-medium">Name:</span> {{ $shipment->sender_name }}</p>
                        <p><span class="font-medium">City:</span> {{ $shipment->sender_city }}</p>
                        <p><span class="font-medium">Address:</span> {{ $shipment->sender_address }}</p>
                        <p><span class="font-medium">Postal Code:</span> {{ $shipment->sender_postal_code }}</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-700">Recipient Information</h3>
                        <p><span class="font-medium">Name:</span> {{ $shipment->recipient_name }}</p>
                        <p><span class="font-medium">City:</span> {{ $shipment->recipient_city }}</p>
                        <p><span class="font-medium">Address:</span> {{ $shipment->recipient_address }}</p>
                        <p><span class="font-medium">Postal Code:</span> {{ $shipment->recipient_postal_code }}</p>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <h3 class="text-xl font-semibold mb-4">Shipment Location</h3>
                <div id="map"></div>
            </div>

            @if($shipment->locations->count() > 0)
                <div class="mb-8">
                    <h3 class="text-xl font-semibold mb-4">Tracking Timeline</h3>
                    <div class="location-timeline">
                        @foreach($shipment->locations->sortByDesc('created_at') as $location)
                            <div class="location-point">
                                <div class="font-semibold text-lg">{{ $location->status }}</div>
                                <div class="text-gray-600">{{ $location->location_name }}</div>
                                <div class="text-sm text-gray-500">
                                    {{ \Carbon\Carbon::parse($location->created_at)->format('M d, Y H:i') }}
                                </div>
                                @if($location->notes)
                                    <div class="text-sm text-gray-600 mt-1">{{ $location->notes }}</div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="mb-8">
                <h3 class="text-xl font-semibold mb-4">Shipment Items</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($shipment->items as $item)
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-semibold">{{ $item->name }}</h4>
                            <p>Quantity: {{ $item->quantity }}</p>
                            <p>Weight: {{ $item->weight }}kg</p>
                            <p>Dimensions: {{ $item->length }}x{{ $item->width }}x{{ $item->height }}cm</p>
                            @if($item->description)
                                <p class="text-sm text-gray-600 mt-2">{{ $item->description }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @elseif(request('tracking_number'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                Shipment not found
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
@if($shipment && $shipment->locations->count() > 0)
<script>
    // Initialize the map
    const map = L.map('map').setView(
        [
            {{ $shipment->locations->first()->latitude }},
            {{ $shipment->locations->first()->longitude }}
        ],
        13
    );

    // Add the OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Prepare the locations data
    const locations = @json($shipment->locations);
    const items = @json($shipment->items);
    const markers = [];
    const latlngs = [];

    // Add markers and create the path
    locations.forEach((location, index) => {
        const latlng = [location.latitude, location.longitude];
        latlngs.push(latlng);

        // Create items list HTML
        const itemsList = items.map(item => `
            <div class="mt-2">
                <strong>${item.name}</strong><br>
                Quantity: ${item.quantity}<br>
                Weight: ${item.weight}kg<br>
                Dimensions: ${item.length}x${item.width}x${item.height}cm
                ${item.description ? `<br>Description: ${item.description}` : ''}
            </div>
        `).join('');

        // Create and add marker
        const marker = L.marker(latlng)
            .bindPopup(`
                <div style="min-width: 200px">
                    <strong class="text-lg">${location.status}</strong><br>
                    <div class="text-sm">
                        ${location.location_name}<br>
                        ${new Date(location.created_at).toLocaleString()}<br>
                        ${location.notes || ''}
                    </div>
                    <div class="mt-3 pt-3 border-t">
                        <strong class="text-md">Shipment Items:</strong>
                        ${itemsList}
                    </div>
                </div>
            `, {
                maxWidth: 300
            })
            .addTo(map);

        markers.push(marker);
    });

    // Create a path between the markers if there are multiple locations
    if (latlngs.length > 1) {
        const polyline = L.polyline(latlngs, {
            color: 'blue',
            weight: 3,
            opacity: 0.7,
            dashArray: '10, 10'
        }).addTo(map);

        // Fit the map to show all markers
        map.fitBounds(polyline.getBounds());
    }
</script>
@endif
@endsection