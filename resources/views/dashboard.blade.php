@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Dashboard</h1>
    <div class="row">
        <!-- Statistics Cards -->
        <div class="col-md-3">
            <div class="card text-center shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Shipments</h5>
                    <h3>{{ $shipmentCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Inventory</h5>
                    <h3>{{ $inventoryCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow">
                <div class="card-body">
                    <h5 class="card-title">Suppliers</h5>
                    <h3>{{ $supplierCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow">
                <div class="card-body">
                    <h5 class="card-title">Dropped Shipments</h5>
                    <h3>{{ $droppedShipments }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Weight and New Items Stats -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Total Weight in Stock</h5>
                    <h3>{{ $totalWeightInStock }} kg</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Total Weight Out</h5>
                    <h3>{{ $totalWeightOut }} kg</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Shipment and Item Updates -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h5>New Shipments (Last 24h)</h5>
                    <h3>{{ $newShipments }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h5>New Items (Last 24h)</h5>
                    <h3>{{ $newItems }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Graph Section -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <h5>Shipment Status Breakdown</h5>
                    <canvas id="shipmentChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Pass PHP data to JavaScript using JSON
    const chartData = @json([
        'shipmentCount' => $shipmentCount,
        'droppedShipments' => $droppedShipments
    ]);

    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('shipmentChart').getContext('2d');
        const shipmentChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Pending', 'Pickup', 'Dropped', 'Blank'],
                datasets: [{
                    label: '# of Shipments',
                    data: [
                        chartData.shipmentCount,
                        0,
                        chartData.droppedShipments,
                        0
                    ],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(231, 233, 237, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(231, 233, 237, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endpush
@endsection