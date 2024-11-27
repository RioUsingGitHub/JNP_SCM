@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-4xl font-bold text-gray-800 mb-8 border-b pb-4">Dashboard Overview</h1>

        <!-- Statistics Grid -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white shadow-lg rounded-xl p-6 transform transition hover:scale-105 hover:shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h5 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Total Shipments</h5>
                        <h3 class="text-3xl font-bold text-indigo-600">{{ $shipmentCount }}</h3>
                    </div>
                    <div class="bg-indigo-100 rounded-full p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-xl p-6 transform transition hover:scale-105 hover:shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h5 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Total Inventory</h5>
                        <h3 class="text-3xl font-bold text-green-600">{{ $inventoryCount }}</h3>
                    </div>
                    <div class="bg-green-100 rounded-full p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-xl p-6 transform transition hover:scale-105 hover:shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h5 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Suppliers</h5>
                        <h3 class="text-3xl font-bold text-purple-600">{{ $supplierCount }}</h3>
                    </div>
                    <div class="bg-purple-100 rounded-full p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-xl p-6 transform transition hover:scale-105 hover:shadow-xl">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h5 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Delivered Shipments</h5>
                        <h3 class="text-3xl font-bold text-red-600">{{ $deliveredShipments }}</h3>
                    </div>
                    <div class="bg-red-100 rounded-full p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Weight and New Items Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white shadow-lg rounded-xl p-6 transform transition hover:scale-105 hover:shadow-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <h5 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Total Weight in Stock</h5>
                        <h3 class="text-3xl font-bold text-blue-600">{{ $totalWeightInStock }} kg</h3>
                    </div>
                    <div class="bg-blue-100 rounded-full p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-xl p-6 transform transition hover:scale-105 hover:shadow-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <h5 class="text-sm font-medium text-gray-500 uppercase tracking-wide">Total Weight Out</h5>
                        <h3 class="text-3xl font-bold text-yellow-600">{{ $totalWeightOut }} kg</h3>
                    </div>
                    <div class="bg-yellow-100 rounded-full p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-2v8m0 0l3-3m-3 3L9 8m-5 5h14a2 2 0 002-2V6a2 2 0 00-2-2H4a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- New Shipments and Items -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white shadow-lg rounded-xl p-6 transform transition hover:scale-105 hover:shadow-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <h5 class="text-sm font-medium text-gray-500 uppercase tracking-wide">New Shipments (Last 24h)</h5>
                        <h3 class="text-3xl font-bold text-teal-600">{{ $newShipments }}</h3>
                    </div>
                    <div class="bg-teal-100 rounded-full p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-xl p-6 transform transition hover:scale-105 hover:shadow-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <h5 class="text-sm font-medium text-gray-500 uppercase tracking-wide">New Items (Last 24h)</h5>
                        <h3 class="text-3xl font-bold text-pink-600">{{ $newItems }}</h3>
                    </div>
                    <div class="bg-pink-100 rounded-full p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graph Section -->
        <div class="bg-white shadow-lg rounded-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h5 class="text-xl font-semibold text-gray-800">Shipment Status Breakdown</h5>
                <div class="flex space-x-2">
                    <span class="h-3 w-3 rounded-full bg-indigo-500"></span>
                    <span class="h-3 w-3 rounded-full bg-green-500"></span>
                    <span class="h-3 w-3 rounded-full bg-yellow-500"></span>
                    <span class="h-3 w-3 rounded-full bg-gray-500"></span>
                </div>
            </div>
            <canvas id="shipmentChart" class="w-full h-48"></canvas>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const chartData = @json([
        'deliveredShipments' => $deliveredShipments,
        'droppedShipments' => $droppedShipments
    ]);

    const chartData2 = @json([
        'pendingShipments' => $pendingShipments,
        'pickupShipments' => $pickupShipments
    ]);

    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('shipmentChart').getContext('2d');
        const shipmentChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Delivered Shipments', 'Dropped Shipments', 'Pending Shipments', 'Picked Shipments'],
                datasets: [{
                    label: 'Shipment Status',
                    data: [
                        chartData.deliveredShipments,
                        chartData.droppedShipments,
                        chartData2.pendingShipments,
                        chartData2.pickupShipments
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)', // Total Shipments - Blue
                        'rgba(255, 99, 132, 0.7)', // Dropped Shipments - Red
                        'rgba(255, 206, 86, 0.7)', // Pending Shipments - Yellow
                        'rgba(75, 192, 192, 0.7)' // Picked Shipments - Teal
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                aspectRatio: 2,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 20,
                            font: {
                                size: 12
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const value = context.parsed;
                                const percentage = ((value / total) * 100).toFixed(2);
                                return `${context.label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                },
                cutout: '50%'
            }
        });
    });
</script>
@endpush
@endsection